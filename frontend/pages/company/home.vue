<template>
<div class="home">
  <div class="container">
  <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#253354" size="50" />  
    <h2 class="text-center pt-5 pb-5">
      Category Name
    </h2>
    <div class="container d-flex">
      <div class="form-group ml-3">
        <input placeholder="Search By Name" type="text" id="filter" class="form-control" v-model='data.name'>
      </div>
      <div class="form-group ml-3">
        <select v-model="data.company_type" id="companyType" class="form-control">
            <option value="0" selected>Choose Company Type...</option>
            <option value="Business Owner">Business Owner</option>
            <option value="Vendor">Outsourcing Provider</option>
        </select>
      </div>
      <div>
        <b-button class="search-button" variant="primary" @click="searchCompany()">Search</b-button>
        <b-button class="clear-button" variant="secondary" @click="clearFilter()">Reset</b-button>
      </div>
    </div>
    <div id="company-table" class="container d-flex align-content-center flex-wrap justify-content-center pt-3 pad">
      <CompanyCard  
        v-for="company in companies" 
        v-bind:key="company.id" 
        :company="company" 
      />
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
    VueElementLoading,
  },
  data(){
    return{
      blockLoader: false,
      data: {
        name: "",
        company_type: "Vendor"
      },
      companies: [],
      currentPage: 1,
      total: 0,
      perPage: 0
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
    async clearFilter(){
      this.data.name = ""
      await this.getCompanies();
    },
    async getCompanies() {
      this.showLoader(true);
      let res = await CompanyServices.listCompany(this.data, this.currentPage, this.data.company_type);
      if (res.status == 200){
        Toast.showToast("Load Data","Load Data Successfully", "success");
        this.companies = res.data.data.data;
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
    async searchCompany() {
      if (this.data.name != null || this.data.name != "" || this.data.name != undefined) {
        this.getCompanies();
      }
    },
    async handlePageChange(value) {
      this.currentPage = value;
      this.getCompanies();
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

.search-button { margin: 0 0 0 1rem; }
</style>