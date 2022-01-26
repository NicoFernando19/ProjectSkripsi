<template>
<div class="home">
  <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#253354" size="50" />  
  <div>
    <h2 class="text-center pt-5 pb-4">
        <b>VACANCY STATUS</b>
    </h2>
    <div class="container justify-content-between detail-content">
      <div class="detail-right container">
          <div class="row justify-content-center">
              <ul class="list-group pb-2">
                    <li class="list-group-item">Title: {{model.Title}}</li>
                    <li class="list-group-item">Job Function: {{model.jobType}}</li>
                    <li class="list-group-item">Job Description: {{model.jobDesc}}</li>
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
<div class="spacing"></div>
<div style="max-width: fit-content;" class="pl-5">
<h3>Joined Companies</h3>
</div>
<div class="container-fluid d-flex align-content-between flex-wrap justify-content-center pt-2 pad">
  <VacancyCompanyCard  v-for="company in model.company_interest" 
                    v-bind:key="company.id" 
                    :company="company.company" :vacancyid="model.id" />
</div>
<div class="spacing"></div>
<button type="button" :class="[{ 'btn':true, 'center-btn':true}, model.isActive ? 'btn-danger' : 'btn-success']" @click.stop.prevent="UpdateStatus()">{{ model.isActive ? 'Close Vacancy' : 'Open Vacancy'}}</button>
</div>
</template>

<script>
import CategoryType from '@/components/CategoryType.vue'
import VacancyServices from '../../store/services/vacancyServices/vacancy'
import Toast from '../../store/features/notificationToast/toast'
import VueElementLoading from "vue-element-loading"
import VacancyCompanyCard from '@/components/Card/VacancyCompanyCard.vue'

export default {
  name: 'detail',
  layout: 'main',
  middleware: 'auth',
  components:{
    CategoryType,
    VueElementLoading,
    VacancyCompanyCard
  },
  data() {
    return {
      blockLoader: false,
      updateStatus: {
        id: '',
        isActive: ''
      },
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
        company_interest: []
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
      this.model.company_interest = data.company_interest;
    },
    async UpdateStatus() {
      this.showLoader(true)
      this.updateStatus.id = this.$route.query['id'];
      if (this.model.isActive) {
        this.updateStatus.isActive = 0;
      }else {
        this.updateStatus.isActive = 1;
      }

      let res = await VacancyServices.UpdateStatusVacancy(this.updateStatus);

      if(res.status == 200){
        Toast.showToast("Update Status","Update Status Successfully", "success");
        await this.getData();
      }else{
        Toast.showToast("Update Status","There is some error in the server", "danger");
      }

      this.showLoader(false)
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
