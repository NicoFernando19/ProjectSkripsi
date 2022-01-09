<template>
<div class="home">
  <div class = "space"></div>
  <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#253354" size="50" />
  <div class = "pt-5">
    <div class="container">
        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
        <div class="col-lg-12">
            <form @submit.stop.prevent="login()">
                <div class="form-group">
                    <label for="inputEmail4"></label>
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
                      <label for="inputPassword4"></label>
                    </div>
                    <input type="password" class="form-control" v-model="model.password" id="inputPassword4" placeholder="Password">
                    <span class="ml-2 text-muted">
                        <p><small>Forgot Password? <NuxtLink to="/reset-password" class="text-decoration-none">Reset Password!</NuxtLink></small></p>
                    </span>
                </div>
                <div class="input-group">
				          <button type="submit" id="submitBtn" class="btn">Login</button>
			          </div>
                <p class="login-register-text">Don't have an account? <NuxtLink to="/Registration">Register Here</NuxtLink></p>
            </form>
        </div>
    </div>
  </div>
</div>
</template>

<script>
import Cookie from 'js-cookie'
import LoginService from '../store/services/login/login'
import Toast from '../store/features/notificationToast/toast'
import VueElementLoading from "vue-element-loading"

export default {
  name: 'Login',
  middleware: 'login',
  components:{
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
        document.getElementById("submitBtn").disable = true;
        var res = await LoginService.Login(
            this.model.email,
            this.model.password
        );

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
.container {
    width: 400px;
    min-height: 400px;
    background: #FFF;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(244,231,228, 0.8);
    padding: 40px 30px;
}

.container .login-text {
    color: #253354;
    font-weight: 500;
    font-size: 1.1rem;
    text-align: center;
    margin-bottom: 20px;
    display: block;
    text-transform: capitalize;
}

.input-group .btn {
    margin-bottom: 10px;
    display: block;
    width: 100%;
    padding: 5px 20px;
    text-align: center;
    border: none;
    background: #253354;
    outline: none;
    border-radius: 30px;
    font-size: 1.2rem;
    color: #FFF;
    cursor: pointer;
}

.login-register-text {
    margin-top: 20px;
    color: #253354;
    font-weight: 600;
}

.login-register-text a {
    text-decoration: none;
    color: #C4C4C4;
}

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
