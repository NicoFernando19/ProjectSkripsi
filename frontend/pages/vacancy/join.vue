<template>
<div class="createVacancy">
  <navbar-web />
  <div class = "pt-4">
    <div class="container pb-5 pl-5 pr-5">
        <h1 class="text-center pt-4 pb-5">
        Join Vacancy
        </h1>
        <div class="col-lg-12">
            <form>
                <div class="form-group">
                    <label for="companyName">Company Name</label>
                    <input type="text" v-model="model.companyName" class="form-control" id="companyName" placeholder="">
                </div>
                <div class="form-group">
                    <label for="companyType">Company Type</label>
                    <input type="text" v-model="model.companyType" class="form-control" id="companyType" placeholder="">
                </div>
                <div class="form-group">
                    <label for="jobDesc">Job Description</label>
                    <input type="text" v-model="model.jobDesc" class="form-control" id="jobDesc" placeholder="">
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
                    <label for="specification">Specifications / Requirements</label>
                    <textarea class="form-control" v-model="model.specification" id="specification" rows="6"></textarea>
                </div>
            </form>
            
            <div class="space"></div>
            <div class="space"></div>
            <!-- <div class="d-flex" style="max-width: fit-content;">
                <h3>Documents</h3>
                <span class="ml-4"><a href="#" class="btn btn-primary">Upload</a></span>
            </div>

            <div class="container-fluid d-flex align-content-between flex-wrap justify-content-center pt-2 mb-2">
                <div class="card p-4 m-3" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">Document 1</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card p-4 m-3" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">Proposal</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card p-4 m-3" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">Document 2</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div> -->
            
            <div class="space"></div>
            <a @click="next()" class="btn btn-success center-btn">Next</a>

        </div>
    </div>
  </div>  
</div>  
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'
import VacancyService from '../../store/services/vacancyServices/vacancy'
import Toast from '../../store/features/notificationToast/toast'

export default {
  name: 'join',
  components:{
    NavbarWeb
  },
  data: () => ({
    model: {
        companyName: '',
        companyType: '',
        jobDesc: '',
        NumOfWorkforce: '',
        price: '',
        specification: ''
    }
  }),
  methods: {
    async next() {
        var idx = this.$route.query['id'];
        let res = await VacancyService.joinVacancy(this.model, idx);
        if (res.status == 201) {
            Toast.showToast("Join Vacancy", "Form Completed!", "success");
            this.$router.push({ path: "/company/Home" });
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