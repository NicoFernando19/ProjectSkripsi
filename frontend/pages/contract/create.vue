<template>
<div class="createContract">
  <div class = "space"></div>
    <div class="container pb-5 pl-5 pr-5">
        <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#253354" size="50" />
        <h1 class="text-center pt-4 pb-5">
        Create Contract
        </h1>
        <div class="col-lg-12">
            <form @submit.stop.prevent="contract()">
                <div class="form-group">
                    <label for="businessName">Business Company</label>
                    <input type="text" v-model="model.company.name" class="form-control" id="businessName" placeholder="Business Company Name" readonly>
                </div>
                <div class="form-group">
                    <label for="vendorName">Vendor Company</label>
                    <input type="text" v-model="model.vendor.name" class="form-control" id="vendorName" placeholder="Outsource Provide Name" readonly>
                </div>
                <div class="form-group">
                    <label for="jobFunction">Job Role</label>
                    <input type="text" v-model="model.jobFunction" class="form-control" id="jobFunction" placeholder="CS (Customer Service)/Digital Marketing" :readonly="vacancyParam">
                </div>
                <div class="form-group">
                    <label for="jobFunction">Job Description</label>
                    <input type="text" v-model="model.jobDesc" class="form-control" id="jobFunction" placeholder="Job Description" :readonly="vacancyParam">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="PostDate">Start Date Contract</label>
                    <input type="date" v-model="model.startDate" class="form-control" id="PostDate">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="Deadline">End Date Contract</label>
                    <input type="date" v-model="model.endDate" class="form-control" id="Deadline">
                    </div>
                </div>
                <div class="form-group">
                    <label for="workforce">Number of Workforce Needed</label>
                    <input type="number" v-model="model.workforce" class="form-control" id="workforce" placeholder="999">
                </div>
                <div class="form-group">
                    <label for="requirement">Specifications / Requirements</label>
                    <textarea class="form-control" v-model="model.requirement" id="requirement" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="document">Document</label>
                    <input type="file" @change="onChange" class="form-control-file" id="document">
                </div>
                <div class="space"></div>
                <button type="submit" id="submitBtn" class="btn btn-primary center-btn">Submit</button>
            </form>
            
        </div>
    </div>
  </div> 
</template>

<script>
import ContractService from '../../store/services/contractServices/contract'
import CompanyService from '../../store/services/companyServices/company'
import VacancyService from '../../store/services/vacancyServices/vacancy'
import Toast from '../../store/features/notificationToast/toast'
import VueElementLoading from "vue-element-loading"
import Cookie from 'js-cookie'

export default {
  name: 'create',
  middleware: 'auth',
  layout:'main',
  components: {
      VueElementLoading
  },
  data: () => ({
    blockLoader: false,
    model: {
        company: {
            id: '',
            name: ''
        },
        vendor: {
            id: '',
            name: ''
        },
        vacancy: {
            id: ''
        },
        workforce: '',
        jobFunction: '',
        jobDesc: '',
        startDate: '',
        endDate: '',
        requirement: '',
        document: '',
        file: ''
    },
    vacancyParam: false,
  }),
  async created() {
      await this.LoadData()
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
    onChange(e){
        this.model.file = e.target.files[0];
    },
    async contract() {
        document.getElementById("submitBtn").disable = true;
        let res = await ContractService.CreateContract(this.model);
        if (res.status == 201) {
            Toast.showToast("Create Contract", "Create Contract Success!", "success");
            this.$router.push({ path: "/company/Home" });
        } else {
            Toast.showToast("Create Contract", "Invalid Data!", "danger");
        }
    },
    async getVendorData() {
        this.model.vendor.id = this.$route.query['vendorid']
        let result = await CompanyService.GetCompanyById(this.model.vendor);
        if (result.status == 200) {
            this.model.vendor.name = result.data.companyName
        } else {
            Toast.showToast("Load Data", "There is some error in the server", "danger");
        }
    },
    async getAuthCompany() {
        this.model.company.name = Cookie.get('authCompanyName');
        this.model.company.id = Cookie.get('authUserId');
    },
    async getVacancy() {
        this.model.vacancy.id = this.$route.query['vacancyid']
        let result = await VacancyService.GetVacancyById(this.model.vacancy)
        if (result.status == 200) {
            this.model.jobFunction = result.data.jobType
        } else {
            Toast.showToast("Load Data", "There is some error in the server", "danger");
        }
    }, 
    async LoadData() {
        this.showLoader(true)
        await this.getAuthCompany()
        await this.getVendorData()
        if (this.$route.query['vacancyid'] != undefined || this.$route.query['vacancyid'] != null) {
            await this.getVacancy()
            this.vacancyParam = true;
        }
        this.showLoader(false)
    }
  }
}
</script>

<style scoped>
.space{
    height: 30px;
}

.list-group{
    width: 100%;
}

.center-btn{
    display: block;
    margin-left: auto;
    margin-right: auto;
    max-width: fit-content;
    border-radius: 20px;
}
</style>