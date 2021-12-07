<template>
<div class="home">
  <navbar-web />
  <div class = "space"></div>
  <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#F06292" size="50" />
  <div class = "pt-5">
    <div class="container regist pt-3 pb-5 pl-5 pr-5">
        <h1 class="text-center pt-4 pb-5">
        Login
        </h1>
        <div class="col-lg-12">
            <form @submit.stop.prevent="login()">
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" :class="{ 'form-control': true , 'is-invalid': invalid , 'is-valid': valid}"
                        v-model="model.email" 
                        v-on:keyup="onKeyEnter"
                        :rules="emailRules" 
                        id="inputEmail4" 
                        placeholder="Email">
                    <div class="invalid-feedback" v-for="error in emailRules" :key="error">
                      {{ error }}
                    </div>
                </div>
                <div class="form-group pb-3">
                    <div class="d-flex">
                      <label for="inputPassword4">Password</label>
                      <span class="ml-2 text-muted">
                        <p><small>Forgot Password ? <NuxtLink to="/reset-password" class="text-decoration-none">Reset Password!</NuxtLink></small></p>
                      </span>
                    </div>
                    <input type="password" class="form-control" v-model="model.password" id="inputPassword4" placeholder="Password">
                    <div class="d-flex justify-content-end">
                      <span class="text-muted">
                        <p><small>Don't have account ? <NuxtLink to="/Registration" class="text-decoration-none">Register Now!</NuxtLink></small></p>
                      </span>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                  <NuxtLink to="/" type="button" class="btn btn-danger btn-register mr-3">Back</NuxtLink>
                  <button type="submit" class="btn btn-primary btn-register">Login</button>
                </div>
            </form>
        </div>
    </div>
  </div>  
</div>
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'
import CategoryType from '@/components/CategoryType.vue'
import Cookie from 'js-cookie'
import LoginService from '../store/services/login/login'
import Toast from '../store/features/notificationToast/toast'
import VueElementLoading from "vue-element-loading"

export default {
  name: 'Login',
  components:{
    NavbarWeb,
    CategoryType,
    VueElementLoading
  },
  data: () => ({
    blockLoader: false,
    valid: false,
    invalid: false,
    model: {
        email: "",
        password: ""
    },
    emailRules: [],
    state: {
      userId: "",
      name: "",
      role: "",
      token: "",
      sessionid: ""
    }
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
    async login() {
        this.showLoader(true);
        var res = await LoginService.Login(
            this.model.email,
            this.model.password
        );
        console.log(res);
        if (res.status == 200) {
            this.state.userId = res.data.user.id;
            this.state.token = res.data.token;
            this.state.name = res.data.user.name;
            Cookie.set("authToken", this.state.token);
            Cookie.set("authUserId", this.state.userId);
            Cookie.set("authName", this.state.name);
            Cookie.set("authCompanyName", res.data.user.companyName);
            Cookie.set("authUserName", res.data.user.username);
            Cookie.set("authRole", res.data.user.companyRoles);
            Toast.showToast("Login Verification","Login Success", "success");
            if (res.data.user.companyRoles == "Business Owner") {
              this.$router.push({ path: "company/Home" });
            }else{
              this.$router.push({ path: "company/vendorIndex" });
            }
        } else {
            Toast.showToast("Login Verification", "Invalid credential", "danger");
        }
        this.showLoader(false);
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
