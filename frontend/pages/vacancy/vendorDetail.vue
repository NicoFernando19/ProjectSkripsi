<template>
<div class="vendorVacancyStatus">
  <navbar-web />
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
                    <li class="list-group-item" v-if="model.isActive" >Status: <b style="color: green">Open</b></li>
                    <li class="list-group-item" v-else>Status: <b style="color: red">Close</b></li>
              </ul>
          </div>
      </div>
    </div>
  </div>  
<div class="spacing"></div>
<div class="spacing"></div>
<button type="submit" class="btn btn-primary center-btn" @click="toProposal()">Join Vacancy</button>
</div>
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'
import CategoryType from '@/components/CategoryType.vue'
import VacancyServices from '../../store/services/vacancyServices/vacancy'
import Toast from '../../store/features/notificationToast/toast'
import Cookie from 'js-cookie'

export default {
  name: 'vendorDetail',
  components:{
    NavbarWeb,
    CategoryType
  },
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
        company_transaction: []
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
