<template>
<div class="createVacancy">
  <div class = "pt-4">
    <div class="container pb-5 pl-5 pr-5">
        <h1 class="text-center pt-4 pb-5">
        Create Vacancy
        </h1>
        <div class="col-lg-12">
            <form @submit.stop.prevent="vacancy()">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="PostDate">Post Date</label>
                    <input type="date" v-model="model.PostDate" class="form-control" id="PostDate" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="Deadline">Deadline</label>
                    <input type="date" v-model="model.Deadline" class="form-control" id="Deadline" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Title">Vacancy Title</label>
                    <input type="text" v-model="model.Title" class="form-control" id="Title" placeholder="Title" required>
                </div>
                <div class="form-group">
                    <label for="jobType">Job Function</label>
                    <input type="text" v-model="model.jobType" class="form-control" id="jobType" placeholder="IT, CS, or Accounting" required>
                </div>
                <div class="form-group">
                    <label for="jobDesc">Job Description</label>
                    <input type="text" v-model="model.jobDesc" class="form-control" id="jobDesc" placeholder="Job description" required>
                </div>
                <div class="form-group">
                    <label for="NumWorkfore">Number of Workforce Needed</label>
                    <input type="number" v-model="model.NumWorkforce" class="form-control" id="NumWorkfore" placeholder="Number of Workforce" min="1" required>
                </div>
                <div class="form-group">
                    <label for="Budget">Budget</label>
                    <b-input-group prepend="Rp." class="mb-2 mr-sm-2 mb-sm-0">
                        <input type="number" v-model="model.Budget" class="form-control" id="Budget" placeholder="5000000" min="1" required>
                    </b-input-group>
                </div>
                <div class="form-group">
                    <label for="Requirement">Specifications / Requirements</label>
                    <textarea v-model="model.Requirement" class="form-control" id="Requirement" rows="3"></textarea>
                </div>
                <div class="space"></div>
                <button type="submit" id="submitBtn" class="btn btn-primary center-btn">Submit</button>
            </form>
           
        </div>
    </div>
  </div>  
</div>  
</template>

<script>
import VacancyService from '../../store/services/vacancyServices/vacancy'
import Toast from '../../store/features/notificationToast/toast'

export default {
  name: 'create',
  layout: 'main',
  middleware: 'auth',
  data: () => ({
    model: {
        PostDate: '',
        Deadline: '',
        Title: '',
        jobType: '',
        jobDesc: '',
        NumWorkforce: '',
        Budget: '',
        Requirement: '',
        isActive: 1
    }
  }),
  methods: {
    async vacancy() {
        document.getElementById("submitBtn").disable = true;
        let res = await VacancyService.CreateVacancy(
            this.model.PostDate,
            this.model.Deadline,
            this.model.Title,
            this.model.jobType,
            this.model.jobDesc,
            this.model.NumWorkforce,
            this.model.Budget,
            this.model.Requirement,
            this.model.isActive
        );
        console.log(res)
        if (res.status == 201) {
            Toast.showToast("Add Vacancy", "Add Vacancy Success!", "success");
            this.$router.push({ path: "/company/Home" });
        } else {
            Toast.showToast("Add Vacancy", "Invalid Data!", "danger");
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