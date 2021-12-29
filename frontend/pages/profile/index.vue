<template>
<div class="home">
  <navbar-web />
  <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#253354" size="50" />  
  <div>
    <div class="container my-5 detail-content">
      <div class="detail-left container">
          <div class="row">
              <div class="col-lg-12">
                  <img class="detail-img img-fluid" :src="imgUrl" />
              </div>
          </div>
      </div>
    </div>
    <div class="spacing"></div>
    <div style="max-width: fit-content;" class="d-flex pl-5">
        <h3>Detail Company</h3>
        <div class="pl-3">
            <b-button variant="light" @click="$bvModal.show('Edit')">
                <font-awesome-icon :icon="['fas', 'edit']" />
            </b-button>
        </div>
        <EditModal id="Edit" title="Edit Company" :data="model"/>
    </div>
    <div class="container mt-5">
        <div class="row">
            <ul class="list-group">
                <li class="list-group-item">Company Name: {{ CompanyName }}</li>
                <li class="list-group-item">Function: IT</li>
                <li class="list-group-item">Workforce: 285</li>
                <li class="list-group-item">Budget: >Rp 200.000.000</li>
                <li class="list-group-item">Phone: {{ model.phoneNumber }}</li>
                <li class="list-group-item">Email: {{ model.email }}</li>
            </ul>
        </div>
    </div>
  </div>  
<div class="spacing"></div>
<div style="max-width: fit-content;" class="pl-5">
<h3>Employees</h3>
</div>
<div class="container-fluid d-flex align-content-between flex-wrap justify-content-center pt-2 pad">
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Detail</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Detail</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Detail</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Detail</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Detail</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Detail</a>
        </div>
      </div>
</div>

  <div class="spacing"></div>
  <h2 class="text-center pt-5 pb-5">
      Previous Works
  </h2>
  <div class="container-xl pb-5 prev-work">
    <ul class="list-group pb-2">
        <li class="list-group-item">(Feb 2020 - Apr 2021) proyek website LMS PT ABC </li>
        <li class="list-group-item">(Feb 2020 - Apr 2021) proyek website LMS PT ABC </li>
        <li class="list-group-item">(Feb 2020 - Apr 2021) proyek website LMS PT ABC </li>
        <li class="list-group-item">(Feb 2020 - Apr 2021) proyek website LMS PT ABC </li>
        <li class="list-group-item">(Feb 2020 - Apr 2021) proyek website LMS PT ABC </li>
    </ul>
  </div>
</div>
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'
import CategoryType from '@/components/CategoryType.vue'
import CompanyServices from '../../store/services/companyServices/company'
import Toast from '../../store/features/notificationToast/toast'
import VueElementLoading from "vue-element-loading"
import config from '../../static/config';
import EditModal from '@/components/Modals/EditCompany.vue'

export default {
  name: 'detail',
  components:{
    NavbarWeb,
    CategoryType,
    VueElementLoading,
    EditModal
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
      }
    }
  },
  async mounted() {
      await this.getData();
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
    async getData() {
      this.showLoader(true)
      this.model.id = this.$route.query['id'];
      let result = await CompanyServices.GetCompanyById(this.model)

      this.loadData(result);
      this.imgUrl = `${this.StorageUrl}/${this.model.imgName}`;
      this.CompanyName = result.data.companyName

      if (result.status == 200) {
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
      this.model.DoB = result.data.DoB;
      this.model.roles = result.data.roles;
      this.model.phoneNumber = result.data.phoneNumber;
      this.model.TanggalBerdiri = result.data.TanggalBerdiri;
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
    max-width: fit-content;
}

/* .prev-work{
  max-width: fit-content;
} */
</style>
