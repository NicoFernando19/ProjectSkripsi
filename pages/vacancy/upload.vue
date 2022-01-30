<template>
<div class="uploadProposal">
  <div class = "space"></div>
    <div class="container pb-5 pl-5 pr-5">
        <h1 class="text-center pt-4 pb-5">
        Upload Proposal
        </h1>
        <div class="col-lg-12">
            <form @submit.stop.prevent="proposal()">
                <div class="form-group">
                    <label for="documentType">Document Type <span class="text-danger">*</span></label>
                    <input type="text" v-model="model.documentType" class="form-control" id="documentType" placeholder="">
                </div>
                <div class="form-group">
                    <label for="documentName">Document <span class="text-danger">*</span></label>
                    <input type="file" @change="onChange" class="form-control-file" id="documentName">
                </div>
                <div class="space"></div>
                <button type="submit" id="submitBtn" class="btn btn-primary center-btn">Submit</button>
            </form>
            
        </div>
    </div>
  </div> 
</template>

<script>
import DocumentService from '../../store/services/documentServices/document'
import Toast from '../../store/features/notificationToast/toast'

export default {
  name: 'create',
  middleware: 'auth',
  layout: 'main',
  data: () => ({
    model: {
        id: '',
        file: '',
        documentType: ''
    }
  }),
  methods: {
    onChange(e){
        this.model.file = e.target.files[0];
    },
    async proposal() {
        document.getElementById("submitBtn").disable = true;
        this.model.id = this.$route.query['id'];

        let res = await DocumentService.UploadFile(this.model);
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