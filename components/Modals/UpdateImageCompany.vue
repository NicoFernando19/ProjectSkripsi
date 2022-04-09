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
              <div class="col-12 text-center">
                <img class="detail-img" :src="imgUrl" width="80%" id="image" />
              </div>
              <div class="col-12 text-center my-3">
                <label class="btn btn-success">Change Photo
                    <input type="file" name="images" id="image" @change="loadImage" style="visibility:hidden; position: absolute;">
                </label>
              </div>
            </div>
            

            <b-form-group class="d-flex justify-content-end">
              <b-button type="button" variant="light" @click="$bvModal.hide(id)">Cancel</b-button>
              <b-button type="submit" id="submitBtn" variant="primary">Save</b-button>
            </b-form-group>
          </b-form>
    </b-modal>
</template>

<script>
import VueElementLoading from "vue-element-loading";
import Toast from '../../store/features/notificationToast/toast'
import CompanyService from '../../store/services/companyServices/company'
import Cookie from 'js-cookie'

export default {
    name: "HistoryCompany",
    components: {
        VueElementLoading
    },
    props: {
        id: {type: String},
        title: { type: String },
        imgUrl: { type: String },
        data: { type: Object }
    },
    data: () => {
        return {
            blockLoader: false,
            caption: "",
            alert: "",
            ErrorMessage: "",
            form: {
                id: '',
                file: ''
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
            this.showLoader(true)
            document.getElementById("submitBtn").disabled = true
            this.form.id = this.data.id
            let res = await CompanyService.UpdateCompanyImage(this.form)
            if (res.status == 200) {
                Cookie.remove("authimgName");
                Cookie.set("authimgName", res.data.imgName, { expires: 1 });
                this.$bvModal.hide(this.id)
                console.log(this.$root)
                if (this.$root.$children[2].$refs) {
                    await this.$root.$children[2].$refs.navbar.getAuth();
                }
                Toast.showToast("Updated Data","Image profile updated successfully", "success");
                this.$parent.getData()
            } else {
                Toast.showToast("Updated Data","Failed to update data", "danger");
            }
            this.showLoader(false)
        },
        loadImage(e) {
            this.form.file = e.target.files[0];
            document.getElementById("image").src = URL.createObjectURL(e.target.files[0]);
        }
    }
}
</script>