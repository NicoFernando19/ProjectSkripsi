<template>
<div class="home">
  <navbar-web />
  <div class = "space"></div>
  <div class = "pt-5">
    <div class="container regist pt-3 pb-5 pl-5 pr-5">
        <h1 class="text-center pt-4 pb-5">
        Login
        </h1>
        <div class="col-lg-12">
            <form @submit.stop.prevent="login()">
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" 
                        v-model="model.email" 
                        v-on:keyup="onKeyEnter"
                        :rules="emailRules" 
                        id="inputEmail4" 
                        placeholder="Email">
                </div>
                <div class="form-group pb-3">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" v-model="model.password" id="inputPassword4" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-register">Login</button>
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

export default {
  name: 'Login',
  components:{
    NavbarWeb,
    CategoryType
  },
  data: () => ({
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
      // e_Mail is the exact name used in v-model
      if (mail !== "") {
        const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (pattern.test(mail) == false) {
          this.valid = false;
          this.emailRules = ["Invalid e-mail."];
        } else {
          this.emailRules = [];
          this.valid = true;
        }
      } else if (mail === "") {
        this.emailRules = ["E-mail is required"];
        this.valid = false;
      }
      //alert(this.emailRules.state);
    }
  },
  methods: {
    onKeyEnter: function(e) {
      if (e.keyCode === 13) {
        this.login();
      }
    },
    async login() {
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
            Cookie.set("authUserName", res.data.user.username);
            Toast.showToast("Login Verification","Login Success", "success");
            this.$router.push({ path: "/Home" });
        } else {
            Toast.showToast("Login Verification", "Invalid credential", "danger");
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

.btn-register{
    display: block;
    margin: 20px auto 0;
}

.list-group{
    width: 100%;
}
</style>
