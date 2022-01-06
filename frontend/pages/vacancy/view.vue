<template>
    <div class="viewInvitation ">
      <div class="container">
        <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#253354" size="50" /> 
        <h2 class="text-center pt-5 pb-5">
            View Vacancy
        </h2>
        
        <div class="container d-flex ml-3">
          <div class="form-group">
            <input placeholder="Search By Title" type="text" id="filter" class="form-control" v-model='data.title'>
          </div>
          <div class="form-group">
            <input placeholder="Search By Company Name" type="text" id="filter" class="form-control company-field" v-model='data.company'>
          </div>
          <div>
            <b-button class="search-button" variant="primary" @click="searchhVacancy()">Search</b-button>
            <b-button class="clear-button" variant="secondary" @click="clearFilter()">Reset</b-button>
          </div>
          <div class="div ml-auto mr-5" v-if="roleCompany() === Business">
            <button type="submit" @click="toCreateVacancy()" class="btn btn-primary center-btn">Create Vacancy</button>
          </div>
        </div>
        <div class="container d-flex align-content-between flex-wrap justify-content-center pt-5">
          <VacancyCard 
            v-for="vacancy in vacancies" 
            v-bind:key="vacancy.id" 
            :vacancy="vacancy"/>
        </div>
        <div class="container d-flex justify-content-center">
          <b-pagination
            v-model="currentPage"
            :per-page="perPage"
            :total-rows="total"
            aria-controls="company-table"
            @change="handlePageChange"
          ></b-pagination>
        </div>  
      </div>
    </div>
</template>

<script>
import VacancyCard from '../../components/Card/VacancyCard.vue'
import VacancyServices from '../../store/services/vacancyServices/vacancy'
import Toast from '../../store/features/notificationToast/toast'
import VueElementLoading from "vue-element-loading"

export default {
  layout: 'main',
  components:{
    VacancyCard,
    VueElementLoading
  },
  data(){
    return{
      blockLoader: false,
      Business: "Business Owner",
      data: {
        title: "",
        company: ""
      },
      vacancies: [],
      currentPage: 1,
      total: 0,
      perPage: 0
    };
  },
  async mounted() {
    await this.getVacancy();
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
    async clearFilter(){
      this.data.title = ""
      this.data.company = ""
      await this.getVacancy();
    },
    async getVacancy() {
      this.showLoader(true);
      let res = await VacancyServices.listVacancy(this.data, this.currentPage);
      if (res.status == 200){
        this.vacancies = res.data.data.data
        this.total = res.data.data.total;
        this.currentPage = res.data.data.current_page;
        this.perPage = res.data.data.per_page;
      }
      else 
      {
        Toast.showToast("Load Data","Failed on server", "danger");
      }
      this.showLoader(false);
    },
    toCreateVacancy(){
      this.$router.push({ path: "/vacancy/create" });
    },
    roleCompany() {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${'authRole'}=`);
            if (parts.length === 2){
                var role = parts.pop().split(';').shift()
            }
            role = role.replace("%20", " ");
            return role
    },
    async searchhVacancy() {
      await this.getVacancy();
    },
    async handlePageChange(value) {
      this.currentPage = value;
      this.getVacancy();
    }
  }
}
</script>

<style scoped>
.center-btn{
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.company-field { margin: 0 1rem; }

.search-button { margin: 0 0 0 2rem; }

.space{
  height: 50px;
}
</style>