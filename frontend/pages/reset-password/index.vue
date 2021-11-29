<template>
    <div class="home">
    <div class = "space"></div>
        <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#F06292" size="50" />
        <div class = "pt-5">
            <div class="container regist pt-3 pb-5 pl-5 pr-5">
                <h1 class="text-center pt-4 pb-5">
                Reset Password
                </h1>
                <div class="col-lg-12">
                    <form @submit.stop.prevent="panelPassword ? reset() : sendEmail()" >
                        <div class="form-group">
                            <label for="inputEmail4">Email</label>
                            <input type="email" :class="{ 'form-control': true , 'is-invalid': invalid , 'is-valid': valid}" 
                                v-model="model.email" 
                                v-on:keyup="onKeyEnter"
                                id="inputEmail4" 
                                placeholder="Email" 
                                :readonly="panelPassword">
                            <div class="invalid-feedback" v-for="error in emailRules" :key="error">
                              {{ error }}
                            </div>
                        </div>
                        <div v-if="panelPassword">
                          <div class="form-group">
                              <label for="inputPassword4">Password</label>
                              <input type="password" 
                                      class="form-control" 
                                      v-model="model.password" 
                                      id="inputPassword4" 
                                      placeholder="Password">
                          </div>
                          <div class="form-group">
                              <label for="inputPassword">Password Confirmation</label>
                              <input type="password" 
                                      class="form-control" 
                                      v-model="model.password_confirmation" 
                                      id="inputPassword" 
                                      placeholder="Password">
                          </div>
                        </div>
                        
                        <div class="d-flex justify-content-center">
                            <NuxtLink to="/Login" type="button" class="btn btn-danger btn-register mr-3">Back</NuxtLink>
                            <button type="submit" class="btn btn-primary btn-register">{{ panelPassword ? "Reset Password" : "Send Link" }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
    </div>
</template>

<script>
import CategoryType from '@/components/CategoryType.vue'
import ResetPasswordService from '../../store/services/resetPassword/resetPassword'
import Toast from '../../store/features/notificationToast/toast'
import VueElementLoading from "vue-element-loading";

export default {
  name: 'Login',
  components:{
    CategoryType,
    VueElementLoading
  },
  data: () => ({
    blockLoader: false,
    panelPassword: false,
    valid: false,
    invalid: false,
    model: {
        email: "",
        password: "",
        password_confirmation: "",
        token: ""
    },
    emailRules: [],
  }),
  watch: {
    "model.email": function(mail) {
      if (mail !== "") {
        const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (pattern.test(mail) == false) {
          this.valid = false;
          this.invalid = true;
          this.emailRules = ["Invalid e-mail."];
        } else {
          this.emailRules = [];
          this.valid = true;
          this.invalid = false;
        }
      } else if (mail === "") {
        this.emailRules = ["E-mail is required"];
        this.valid = false;
        this.invalid = true;
      }
    }
  },
  async mounted() {
    await this.getQuery();
  },
  methods: {
    onKeyEnter: function(e) {
      if (e.keyCode === 13) {
        this.login();
      }
    },
    showLoader(val) {
      if (!val) {
        setTimeout(() => {
          this.blockLoader = false;
        }, 500);
      } else {
        this.blockLoader = val;
      }
    },
    async sendEmail() {
        this.showLoader(true);
        var res = await ResetPasswordService.SentEmailResetLink(
            this.model.email,
        );
        if (res.status == 200) {
            Toast.showToast("Sent Email","Password reset link has been sent to your email", "success");
        } else if (res.status == 422) {
            Toast.showToast("Sent Email", "Email field is required", "danger");
        } else {
            Toast.showToast("Sent Email", "There is some error in server", "danger");
        }
        this.showLoader(false);
    },
    async getQuery() {
      if (this.$route.query['email']) {
        this.model.email = this.$route.query['email'];
        this.model.token = this.$route.query['token'];
        this.panelPassword = true;
      }
    },
    async reset() {
      let res = await ResetPasswordService.resetPassword(
        this.model.email,
        this.model.password,
        this.model.password_confirmation,
        this.model.token
      );
      if (res.status == 200) {
            Toast.showToast("Password Confirmation","Password has been changed", "success");
        } else {
            Toast.showToast("Password Confirmation", "There is some error in server", "danger");
        }
    }
  }
}
</script>

<style scoped>
.regist{
    border: solid 1px #000;
    border-radius: 10px;
}

.space{
    padding-top: 50px;
}

.list-group{
    width: 100%;
}
</style>