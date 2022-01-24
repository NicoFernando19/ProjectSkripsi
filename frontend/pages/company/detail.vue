<template>
<div class="home">
  <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#253354" size="50" />  
  <div>
    <div class="container d-flex flex-column justify-content-between pt-5 detail-content">
      <div class="detail-left container">
          <div class="row">
              <div class="col-lg-12">
                  <img class="detail-img" :src="imgUrl" width="80%"/>
              </div>
          </div>
      </div>
      <div class="detail-right container">
        <button class="mt-2 btn btn-primary center-btn" @click="CreateContract(model.id)" v-show="model.roles == 'Vendor'">Create Contract</button>
      </div>
      <div class="detail-right container">
          <h2 class="text-left pt-5 pb-3">
            Company Detail
          </h2>
          <div class="row">
            <div class="col-6" style="border-right: 2px solid gray"> 
              <div class="row">
                <div class="col-6"><strong>Company Name</strong></div>
                <div class="col-6">{{ CompanyName }}</div>
              </div>
              <div class="row">
                <div class="col-6"><strong>Role</strong></div>
                <div class="col-6">{{ model.roles == 'Vendor' ? 'Outsource Provider' : model.roles }}</div>
              </div>
              <div class="row">
                <div class="col-6"><strong>Date of Establishment</strong></div>
                <div class="col-6">{{ model.TanggalBerdiri }}</div>
              </div>
              <div class="row">
                <div class="col-6"><strong>Field of Business</strong></div>
                <div class="col-6">{{ model.BidangUsaha }}</div>
              </div>
              <div class="row">
                <div class="col-6"><strong>Phone</strong></div>
                <div class="col-6">{{ model.phoneNumber }}</div>
              </div>
              <div class="row">
                <div class="col-6"><strong>Email</strong></div>
                <div class="col-6"><a :href="mailtoMail" class="text-decoration-none">{{ model.email }}</a></div>
              </div>
            </div>
            <div class="col-6">
              <div class="row">
                <div class="col-6"><strong>Industry</strong></div>
                <div class="col-6">{{ model.Industri }}</div>
              </div>
              <div class="row">
                <div class="col-6"><strong>Sub Industry</strong></div>
                <div class="col-6">{{ model.SubIndustri }}</div>
              </div>
              <div class="row">
                <div class="col-6"><strong>Address</strong></div>
                <div class="col-6">{{ model.address }}</div>
              </div>
              <div class="row">
                <div class="col-6"><strong>Country</strong></div>
                <div class="col-6">{{ model.country }}</div>
              </div>
              <div class="row">
                <div class="col-6"><strong>About</strong></div>
                <div class="col-6">{{ model.about }}</div>
              </div>
              <div class="row">
                <div class="col-6"><strong>Website</strong></div>
                <div class="col-6"><a :href="model.WebsiteUrl" class="text-decoration-none">{{ model.WebsiteUrl }}</a></div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>  
  <div class="container-xl pb-5 prev-work" v-show="model.roles == 'Vendor'">
    <h2 class="text-left pt-5 pb-3">
      Previous Works
    </h2>
    <list-history
      :histories="histories" 
    />
  </div>
  <div class="container-xl pb-5" v-show="this.$route.query['vacancyid']">
    <h2 class="text-left pt-5 pb-3">
      Document
    </h2>
    <div class="row">
      <div class="col-md-6">
        <embed :src="JoinedCompany.document.pathUrl" width="100%" height="800px" />
      </div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-6">
            <strong>
              Document
            </strong>
          </div>
          <div class="col-md-6">
            {{ JoinedCompany.document.name }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <strong>
              Cost Estimation
            </strong>
          </div>
          <div class="col-md-6">
            {{ JoinedCompany.price }}
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <strong>
              Offering
            </strong>
          </div>
          <div class="col-md-6">
            {{ JoinedCompany.specification }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import CompanyServices from '../../store/services/companyServices/company'
import VacancyServices from '../../store/services/vacancyServices/vacancy'
import Toast from '../../store/features/notificationToast/toast'
import VueElementLoading from "vue-element-loading"
import config from '../../static/config';
import ListHistory from '../../components/ListHistory/ListHistory.vue';
import Moment from "moment"

export default {
  name: 'detail',
  layout: 'main',
  middleware: 'auth',
  components:{
    VueElementLoading,
    ListHistory
  },
  data() {
    return {
      blockLoader: false,
      StorageUrl: config.StorageUrl,
      imgUrl: '',
      CompanyName: '',
      model: {
        id: '',
        name: '',
        username: '', 
        email: '', 
        DoB: '',
        roles: '',
        phoneNumber: '',
        TanggalBerdiri: '',
        WebsiteUrl: '',
        BidangUsaha: '',
        Industri: '',
        SubIndustri: '', 
        about: '',
        address: '',
        company_type_id: '',
        address2: '',
        country: '',
        city: '',
        state: '',
        zip: '',
        imgName: ''
      },
      histories: [],
      mailtoMail: '',
      JoinedCompany: {
        id: '',
        company_id: '',
        price: '',
        specification: '',
        document: {
          name: '',
          pathUrl: '',
        }
      }
    }
  },
  async mounted() {
      await this.getData();
      if (this.$route.query['vacancyid']) {
        await this.GetJoinedData();
      }
  },
  methods: {
    showLoader(val) {
      if (!val) {
        setTimeout(() => {
          this.blockLoader = false;
        }, 500);
      } else {
        this.blockLoader = val;
      }
    },
    async GetJoinedData() {
      this.showLoader(true)
      this.JoinedCompany.id = this.$route.query['vacancyid'];
      this.JoinedCompany.company_id = this.$route.query['id'];
      let result = await VacancyServices.GetJoinedById(this.JoinedCompany)
      console.log(result)
      if (result.status == 200) {
        result.data.company_interest.forEach(data => {
          this.JoinedCompany.price = data.price;
          this.JoinedCompany.specification = data.specification
          this.JoinedCompany.document.name = data.document.documentType
          this.JoinedCompany.document.pathUrl = data.document.pathUrl
        });
      } else {
        Toast.showToast("Load Data","Failed to load data from server", "danger");
      }
      this.showLoader(false)
    },
    async getData() {
      this.showLoader(true)
      this.model.id = this.$route.query['id'];
      let result = await CompanyServices.GetCompanyById(this.model)

      if (result.status == 200) {
        this.loadData(result);
        this.imgUrl = `${this.StorageUrl}/${this.model.imgName}`;
        this.CompanyName = result.data.companyName
        Toast.showToast("Load Data","Load Data Successfully", "success");
      }else{
        Toast.showToast("Load Data","Failed to load data from server", "danger");
      }
      this.showLoader(false)
    },
    loadData(result) {
      this.model.name = result.data.name;
      this.model.username = result.data.username;
      this.model.email = result.data.email;
      this.mailtoMail = `mailto:${this.model.email}`;
      this.model.DoB = result.data.DoB;
      this.model.roles = result.data.roleName;
      this.model.phoneNumber = result.data.phoneNumber;
      this.model.TanggalBerdiri = Moment(String(result.data.TanggalBerdiri)).format('D MMMM YYYY');
      this.model.WebsiteUrl = result.data.WebsiteUrl;
      this.model.BidangUsaha = result.data.BidangUsaha;
      this.model.Industri = result.data.Industri;
      this.model.SubIndustri = result.data.SubIndustri;
      this.model.about = result.data.about;
      this.model.address = result.data.address;
      this.model.company_type_id = result.data.company_type_id;
      this.model.address2 = result.data.address2;
      this.model.country = result.data.country;
      this.model.city = result.data.city;
      this.model.state = result.data.state;
      this.model.zip = result.data.zip;
      this.model.imgName = result.data.imgName;
      this.histories = result.data.work_history;
    },
    CreateContract(compid) {
        this.$router.push({
            path: `/contract/create?vendorid=${compid}`
        })
    }
  }
}
</script>

<style scoped>
.detail-img{
    width: 90%;
    height: 450px;
    display: block;
    margin-right: auto;
    margin-left: auto;
}

.list-group{
    width: 100%;
}

.spacing{
  height: 70px;
}

.center-btn{
    display: block;
    margin-left: auto;
    margin-right: auto;
    border-radius: 20px;
    max-width: fit-content;
}

/* .prev-work{
  max-width: fit-content;
} */
</style>
