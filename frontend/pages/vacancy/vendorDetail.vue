<template>
<div class="vendorVacancyStatus">
  <div>
    <h2 class="text-center pt-5 pb-4">
        <b>VACANCY STATUS</b>
    </h2>
    <div class="container justify-content-between">
      <div class="container">
          <div class="row justify-content-center">
              <ul class="list-group pb-2">
                    <li class="list-group-item">Title: {{model.Title}}</li>
                    <li class="list-group-item">Job Function: {{model.jobType}}</li>
                    <li class="list-group-item">Workforce Needed: {{model.NumWorkforce}}</li>
                    <li class="list-group-item">Budget: {{model.Budget}}</li>
                    <li class="list-group-item">Specification: {{model.Requirement}}</li>
                    <li class="list-group-item" v-if="model.isActive" >Status: <b style="color: green">Open</b></li>
                    <li class="list-group-item" v-else>Status: <b style="color: red">Close</b></li>
              </ul>
          </div>
      </div>
    </div>
  </div>  
<div class="spacing"></div>
<div class="container-xl pb-5" v-show="model.status == 'Applied'">
    <h2 class="text-left pt-5 pb-3">
      Applied
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
<button 
  type="button" 
  :class="['btn', model.status == 'Applied' ? 'btn-success' : 'btn-primary', 'center-btn']" 
  @click="model.status == 'Applied' ? '' : toProposal()">{{ model.status == 'Applied' ? 'Applied' : 'Join Vacancy'}}
</button>
</div>
</template>

<script>
import VacancyServices from '../../store/services/vacancyServices/vacancy'
import Toast from '../../store/features/notificationToast/toast'
import Cookie from 'js-cookie'

export default {
  name: 'vendorDetail',
  layout: 'main',
  middleware: 'auth',
  data() {
    return {
      blockLoader: false,
      model: {
        id: '',
        PostDate: '',
        Deadline: '',
        Title: '',
        jobType: '',
        jobDesc: '',
        NumWorkforce: '',
        Budget: '',
        Requirement: '',
        isActive:'',
        status: '',
        company_transaction: []
      },
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
    if (this.model.status == 'Applied') {
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
      this.JoinedCompany.id = this.$route.query['id'];
      this.JoinedCompany.company_id = Cookie.get('authUserId');
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
      let result = await VacancyServices.GetVacancyById(this.model);

      this.loadData(result.data);

      if (result.status == 200) {
        Toast.showToast("Load Data","Load Data Successfully", "success");
      }else{
        Toast.showToast("Load Data","Failed to load data from server", "danger");
      }
      this.showLoader(false)
    },
    loadData(data) {
      this.model.PostDate = data.PostDate;
      this.model.Deadline = data.Deadline;
      this.model.Title = data.Title;
      this.model.jobType = data.jobType;
      this.model.jobDesc = data.jobDesc;
      this.model.NumWorkforce = data.NumWorkforce;
      this.model.Budget = data.Budget;
      this.model.Requirement = data.Requirement;
      this.model.isActive = data.isActive;
      this.model.status = data.status;
      this.model.company_transaction = data.company_transaction;
    },
    toProposal(){
      let companyId = Cookie.get("authUserId");
      this.$router.push({ path: `/join/vacancy?vacancyId=${this.model.id}&companyId=${companyId}` })
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
    width: fit-content;
}

.spacing{
  height: 50px;
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
