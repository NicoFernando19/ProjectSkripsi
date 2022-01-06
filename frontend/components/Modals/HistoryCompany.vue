<template>
    <b-modal 
        size='xl' 
        ref="ModalCompany" 
        :id="id" 
        hide-footer
        @show="previewModal"
        >
          <template #modal-title>
              {{title}}
          </template>
          <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#253354" size="50" />
          <b-form @submit.stop.prevent="onSubmit()">
            <div class="row">
              <div class="col-12">
                
              </div>
            </div>
            

            <b-form-group class="d-flex justify-content-end">
              <b-button type="button" variant="light" @click="$bvModal.hide(id)">Cancel</b-button>
              <b-button type="submit" id="submitBtn" variant="primary">Submit</b-button>
            </b-form-group>
          </b-form>
    </b-modal>
</template>

<script>
import VueElementLoading from "vue-element-loading";
import Toast from '../../store/features/notificationToast/toast'

export default {
    name: "HistoryCompany",
    components: {
        VueElementLoading
    },
    props: {
        id: {type: String},
        title: { type: String },
        data: { type: Object }
    },
    data: () => {
        return {
            blockLoader: false,
            caption: "",
            alert: "",
            ErrorMessage: "",
            form: {

            }
        };
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
        previewModal(){
            this.showLoader(true)
            this.showLoader(false)
        },
        async onSubmit() {
            document.getElementById("submitBtn").disabled = true
            let res = await CompanyService.UpdateCompany(this.form)
            if (res.status == 200) {
                console.log(res)
            } else {
                Toast.showToast("Updated Data","Failed to update data", "danger");
            }
        }
    }
}
</script>