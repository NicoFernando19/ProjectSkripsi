<template>
<div class="home">
  <navbar-web />
  <category-type />
  <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#F06292" size="50" />  
  <div>
    <h2 class="text-center pt-5 pb-5">
      Category Name
    </h2>
    <div class="container-fluid d-flex align-content-between flex-wrap justify-content-center pt-5 pad">
      <CompanyCard  v-for="company in companies" 
                    v-bind:key="company.id" 
                    :company="company" />
    </div>
  </div>  
</div>
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'
import CategoryType from '@/components/CategoryType.vue'
import CompanyCard from '@/components/Card/CompanyCard.vue'
import Toast from '../../store/features/notificationToast/toast'
import CompanyServices from '../../store/services/companyServices/company'
import VueElementLoading from "vue-element-loading"

export default {
  name: 'home',
  middleware: ['auth', 'businessowner'],
  components:{
    NavbarWeb,
    CategoryType,
    CompanyCard,
    VueElementLoading
  },
  data(){
    return{
      blockLoader: false,
      companies: []
    };
  },
  async mounted() {
    await this.getCompanies();
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
    async getCompanies() {
      this.showLoader(true);
      let res = await CompanyServices.listCompany();
      if (res.status == 200){
        Toast.showToast("Load Data","Load Data Successfully", "success");
        this.companies = res.data.data
      }
      else 
      {
        Toast.showToast("Load Data","Failed on server", "danger");
      }
      this.showLoader(false);
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
    padding: 20px 180px 0px 180px;
}
</style>