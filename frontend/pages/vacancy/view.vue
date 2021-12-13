<template>
    <div class="viewInvitation">
        <navbar-web />
        <h2 class="text-center pt-5 pb-5">
            View Vacancy
        </h2>
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
  data(){
    return{
      blockLoader: false,
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
    async getVacancy() {
      this.showLoader(true);
      let res = await VacancyServices.listVacancy();
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