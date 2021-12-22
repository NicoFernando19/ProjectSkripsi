<template>
    <div class="viewInvitation">
        <navbar-web />
        <h2 class="text-center pt-5 pb-5">
            View Vacancy
        </h2>
        <b-collapse id="collapse-2">
          <div class="container d-flex justify-content-between">
            <div class="form-group">
              <label for="filter">Filter by Title:</label>
              <input type="text" id="filter" v-model="data.title" class="form-control">
            </div>
            <div class="form-group">
              <label for="filter2">Filter by Company Name:</label>
              <input type="text" id="filter2" v-model="data.company" class="form-control">
            </div>
            <div class="form-group d-flex align-items-center m-0">
              <button type="button" class="btn btn-warning" @click="clearFilter()">Clear Filter</button>
            </div>
          </div>
        </b-collapse>
        <div class="container d-flex justify-content-end">
          <b-button v-b-toggle.collapse-2 class="m-1" variant="primary">Filter</b-button>
        </div>
    <div class="container-fluid d-flex align-content-between flex-wrap justify-content-center pt-5 pad">
      <VacancyCard v-for="vacancy in vacancies" 
                    v-bind:key="vacancy.id" 
                    :vacancy="vacancy"/>
      
      <!-- <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Join Invitation</a>
        </div>
      </div> -->
    </div>
    <div class="div" v-if="roleCompany() == 'Business Owner'">
    </div>
    <div class="div" v-else>
        <div class="space"></div>
        <button type="submit" @click="toCreateVacancy()" class="btn btn-primary center-btn">Create Vacancy</button>
    </div>
    </div>
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'
import CategoryType from '@/components/CategoryType.vue'
import VacancyCard from '../../components/Card/VacancyCard.vue'
import VacancyServices from '../../store/services/vacancyServices/vacancy'
import Toast from '../../store/features/notificationToast/toast'

export default {
  name: 'view',
  components:{
    NavbarWeb,
    CategoryType,
    VacancyCard
  },
  watch: {
    "data.title": function (val) {
      this.getVacancyByFilter();
    },
    "data.company": function (val) {
      this.getVacancyByFilter();
    }
  },
  data(){
    return{
      blockLoader: false,
      data: {
        title: "",
        company: ""
      },
      vacancies: []
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
    clearFilter(){
      this.data.title = ""
      this.data.company = ""
    },
    async getVacancyByFilter() {
      this.showLoader(true);
      let res = await VacancyServices.listVacancy(this.data);
      if (res.status == 200){
        this.vacancies = res.data.data
      }
      else 
      {
        Toast.showToast("Load Data","Failed on server", "danger");
      }
      this.showLoader(false);
    },
    async getVacancy() {
      this.showLoader(true);
      let res = await VacancyServices.listVacancy(this.data);
      if (res.status == 200){
        Toast.showToast("Load Data","Load Data Successfully", "success");
        this.vacancies = res.data.data
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
            // console.log(role)
            return role
        } 
  }
}
</script>

<style scoped>
.center-btn{
    display: block;
    margin-left: auto;
    margin-right: auto;
    max-width: fit-content;
}

.pad{
    padding: 20px 120px 0px 120px;
}

.space{
  height: 50px;
}
</style>