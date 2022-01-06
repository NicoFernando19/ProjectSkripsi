<template>
<div class="joinVacancy">
  <div class = "pt-4">
    <div class="container pb-5 pl-5 pr-5">
        <h1 class="text-center pt-4 pb-5">
        Join Vacancy
        </h1>
        <div class="col-lg-12">
            <form @submit.stop.prevent="next()">
                <div class="form-group">
                    <label for="companyName">Company Name</label>
                    <input type="text" v-model="model.companyName" class="form-control" id="companyName" placeholder="">
                </div>
                <div class="form-group">
                    <label for="NumOfWorkforce">Number of Available Workforces</label>
                    <input type="number" v-model="model.NumOfWorkforce" class="form-control" id="NumOfWorkforce" placeholder="">
                </div>
                <div class="form-group">
                    <label for="price">Estimated Service Price</label>
                    <input type="text" v-model="model.price" class="form-control" id="price" placeholder="Rp. ?">
                </div>
                <div class="form-group">
                    <label for="specification">Offers</label>
                    <textarea class="form-control" v-model="model.specification" id="specification" rows="6"></textarea>
                </div>
                <button type="submit" id="sumbitBtn" class="btn btn-primary center-btn">Next</button>
            </form>

        </div>
    </div>
  </div>  
</div>  
</template>

<script>
import VacancyService from '../../store/services/vacancyServices/vacancy'
import Toast from '../../store/features/notificationToast/toast'
import CompanyServices from '../../store/services/companyServices/company'

export default {
  name: 'vacancy',
  layout: 'main',
  middleware: 'auth',
  async mounted() {
    await this.getCompany();
  },
  data: () => ({
    model: {
        id: '',
        companyName: '',
        companyType: '',
        jobDesc: '',
        NumOfWorkforce: '',
        price: '',
        specification: ''
    }
  }),
  methods: {
    async getCompany() {
        this.model.id = this.$route.query['companyId'];
        let result = await CompanyServices.GetCompanyById(this.model)

        this.loadData(result);
        
    },
    loadData(result) {
        this.model.companyName = result.data.companyName;
    },
    async next() {
        document.getElementById("submitBtn").disable = true;
        var idx = this.$route.query['vacancyId'];
        let res = await VacancyService.joinVacancy(this.model, idx);
        if (res.status == 201) {
            Toast.showToast("Join Vacancy", "Form Completed!", "success");
            this.$router.push({ path: res.data.redirect });
        } else {
            Toast.showToast("Join Vacancy", "Invalid Data!", "danger");
        }
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
}
</style>