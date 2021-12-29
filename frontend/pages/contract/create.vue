<template>
<div class="createContract">
  <div class = "space"></div>
    <div class="container pb-5 pl-5 pr-5">
        <h1 class="text-center pt-4 pb-5">
        Create Contract
        </h1>
        <div class="col-lg-12">
            <form @submit.stop.prevent="contract()">
                <div class="form-group">
                    <label for="businessName">Business Company</label>
                    <input type="text" v-model="model.businessName" class="form-control" id="businessName" placeholder="PT ABC">
                </div>
                <div class="form-group">
                    <label for="vendorName">Vendor Company</label>
                    <input type="text" v-model="model.vendorName" class="form-control" id="vendorName" placeholder="PT XYZ">
                </div>
                <div class="form-group">
                    <label for="workforce">Number of Workforce Needed</label>
                    <input type="number" v-model="model.workforce" class="form-control" id="workforce" placeholder="999">
                </div>
                <div class="form-group">
                    <label for="jobFunction">Job Function</label>
                    <input type="text" v-model="model.jobFunction" class="form-control" id="jobFunction" placeholder="IT/Digital Marketing/Research">
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
                <button type="submit" class="btn btn-primary center-btn">Submit</button>
            </form>

            <div class="space"></div>
            <div class="space"></div>
            <div class="d-flex" style="max-width: fit-content;">
                <h3>Documents</h3>
                <span class="ml-4"><a href="#" class="btn btn-primary">Upload</a></span>
            </div>

            <!-- <div class="container-fluid d-flex align-content-between flex-wrap justify-content-center pt-2 mb-2">
                <div class="card p-4 m-3" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">Document 1</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
                <div class="card p-4 m-3" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">Document 2</h5>
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
            
        </div>
    </div>
  </div> 
</template>

<script>
import ContractService from '../../store/services/contractServices/contract'
import Toast from '../../store/features/notificationToast/toast'

export default {
  name: 'create',
  middleware: 'auth',
  layout:'main',
  data: () => ({
    model: {
        businessName: '',
        vendorName: '',
        workforce: '',
        jobFunction: '',
        requirement: '',
        document: '',
        file: ''
    }
  }),
  methods: {
    onChange(e){
        this.model.file = e.target.files[0];
    },
    async contract() {
        let res = await ContractService.CreateContract(this.model);
        console.log(res)
        if (res.status == 201) {
            Toast.showToast("Create Contract", "Create Contract Success!", "success");
            this.$router.push({ path: "/company/Home" });
        } else {
            Toast.showToast("Create Contract", "Invalid Data!", "danger");
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