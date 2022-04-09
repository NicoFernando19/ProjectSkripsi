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
              <div class="col-6">
                <b-form-group
                  id="input-group-1"
                  label="Email address:"
                  label-for="input-1"
                >
                  <b-form-input
                    id="input-1"
                    v-model="form.email"
                    type="email"
                    placeholder="Enter email"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-2" label="Company Name:" label-for="input-2">
                  <b-form-input
                    id="input-2"
                    v-model="form.name"
                    placeholder="Enter name"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-3" label="Company Phone:" label-for="input-3">
                  <b-form-input
                    id="input-3"
                    v-model="form.phoneNumber"
                    placeholder="Enter Phone"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-5" label="Company Address:" label-for="input-5">
                  <b-form-input
                    id="input-5"
                    v-model="form.address"
                    placeholder="Enter address"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-6" label="Company Second Address:" label-for="input-6">
                  <b-form-input
                    id="input-6"
                    v-model="form.address2"
                    placeholder="Enter Second Address"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-7" label="Company City:" label-for="input-7">
                  <b-form-input
                    id="input-7"
                    v-model="form.city"
                    placeholder="Enter a City"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-8" label="Company Zip:" label-for="input-8">
                  <b-form-input
                    id="input-8"
                    v-model="form.zip"
                    placeholder="Enter Zip"
                    required
                  ></b-form-input>
                </b-form-group>
              </div>
              <div class="col-6">
                <b-form-group id="input-group-9" label="Company State:" label-for="input-9">
                  <b-form-input
                    id="input-9"
                    v-model="form.state"
                    placeholder="Enter State"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-10" label="Company Link Website:" label-for="input-10">
                  <b-form-input
                    id="input-10"
                    v-model="form.WebsiteUrl"
                    placeholder="Enter Website"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-11" label="Company field of Business:" label-for="input-11">
                  <b-form-input
                    id="input-11"
                    v-model="form.BidangUsaha"
                    placeholder="Enter Business"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-12" label="Company Industry:" label-for="input-12">
                  <b-form-input
                    id="input-12"
                    v-model="form.Industri"
                    placeholder="Enter Industry"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-4" label="Company Sub Industry:" label-for="input-4">
                  <b-form-input
                    id="input-4"
                    v-model="form.SubIndustri"
                    placeholder="Enter Sub Industry"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-13" label="Company Bio:" label-for="input-13">
                  <b-form-input
                    id="input-13"
                    v-model="form.about"
                    placeholder="Enter Bio"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group id="input-group-14" label="Company Country" label-for="input-14">
                  <b-form-input
                    id="input-14"
                    v-model="form.country"
                    placeholder="Enter Country"
                    required
                  ></b-form-input>
                </b-form-group>
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
import CompanyService from "../../store/services/companyServices/company"
import Toast from '../../store/features/notificationToast/toast'

export default {
  name: "EditCompany",
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
          id: "",
          email: "",
          name: "",
          username: "",
          phoneNumber: "",
          username: '',
          address: '',
          address2: '',
          city: '',
          zip: '',
          state: '',
          WebsiteUrl: '',
          BidangUsaha: '', 
          Industri: '',
          SubIndustri: '',
          about: '', 
          country: ''
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
    handleToast(toastTitle, style, message) {
      this.$bvToast.toast(message, {
        title: toastTitle != "" ? toastTitle : "Confirmation",
        variant: style != "" ? style : "info",
        autoHideDelay: 5000,
        appendToast: false
      });
    },
    previewModal(){
        this.showLoader(true)
        this.form.id = this.data.id
        this.form.name = this.data.name
        this.form.username = this.data.username
        this.form.email = this.data.email
        this.form.phoneNumber = this.data.phoneNumber
        this.form.username = this.data.username
        this.form.address = this.data.address
        this.form.address2 = this.data.address2
        this.form.city = this.data.city
        this.form.zip = this.data.zip
        this.form.state = this.data.state
        this.form.WebsiteUrl = this.data.WebsiteUrl
        this.form.BidangUsaha = this.data.BidangUsaha
        this.form.Industri = this.data.Industri
        this.form.SubIndustri = this.data.SubIndustri
        this.form.about = this.data.about
        this.form.country = this.data.country
        this.showLoader(false)
    },
    async onSubmit() {
      this.showLoader(true)
      document.getElementById("submitBtn").disabled = true
      let res = await CompanyService.UpdateCompany(this.form)
      if (res.status == 200) {
        this.$bvModal.hide(this.id)
        if (this.$root.$children[1].$refs.navbar != undefined) {
            await this.$root.$children[1].$refs.navbar.getAuth();
        }
        Toast.showToast("Updated Data","Data updated successfully", "success");
        this.$parent.getData()
      } else {
        Toast.showToast("Updated Data","Failed to update data", "danger");
      }
      this.showLoader(false)
    }
  }
};
</script>