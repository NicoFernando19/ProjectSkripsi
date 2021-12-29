<template>
<div class="home">
  <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#253354" size="50" />  
  <div>
    <h2 class="text-center pt-5 pb-5">
      Category Name
    </h2>
    <b-collapse id="collapse-2">
      <div class="container d-flex">
        <div class="form-group">
          <label for="filter">Filter by Name:</label>
          <input type="text" id="filter" v-model="data.name" class="form-control">
        </div>
      </div>
    </b-collapse>
    <div class="container d-flex justify-content-end">
      <b-button v-b-toggle.collapse-2 class="m-1" variant="primary">Filter</b-button>
    </div>
    <div class="container-fluid d-flex align-content-between flex-wrap justify-content-center pt-5 pad">
      <CompanyCard  v-for="company in companies" 
                    v-bind:key="company.id" 
                    :company="company" />
    </div>
  </div>  
</div>
</template>

<script>
import CategoryType from '@/components/CategoryType.vue'
import CompanyCard from '@/components/Card/CompanyCard.vue'
import Toast from '../../store/features/notificationToast/toast'
import CompanyServices from '../../store/services/companyServices/company'
import VueElementLoading from "vue-element-loading"

export default {
  name: 'home',
  layout: 'main',
  middleware: ['auth', 'businessowner'],
  components:{
    CategoryType,
    CompanyCard,
    VueElementLoading
  },
  watch: {
    "data.name": function (val) {
      if (val != null || val != "" || val != undefined) {
        this.getCompanies();
      }
    }
  },
  data(){
    return{
      blockLoader: false,
      data: {
        name: ""
      },
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
      let res = await CompanyServices.listCompany(this.data);
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