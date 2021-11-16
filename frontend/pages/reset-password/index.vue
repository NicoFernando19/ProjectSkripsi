<template>
    <div class="home">
    <navbar-web />
    <div class = "space"></div>
        <div class = "pt-5">
            <div class="container regist pt-3 pb-5 pl-5 pr-5">
                <h1 class="text-center pt-4 pb-5">
                Reset Password
                </h1>
                <div class="col-lg-12">
                    <form @submit.stop.prevent="sendEmail()">
                        <div class="form-group">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" 
                                v-model="model.email" 
                                v-on:keyup="onKeyEnter"
                                :rules="emailRules" 
                                id="inputEmail4" 
                                placeholder="Email">
                        </div>
                        
                        <div class="d-flex justify-content-center">
                            <NuxtLink to="/Login" type="button" class="btn btn-danger btn-register mr-3">Back</NuxtLink>
                            <button type="submit" class="btn btn-primary btn-register">Send Reset Password</button>
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
import ResetPasswordService from '../../store/services/resetPassword/resetPassword'

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
  }),
  watch: {
    "model.email": function(mail) {
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
    }
  },
  methods: {
    onKeyEnter: function(e) {
      if (e.keyCode === 13) {
        this.login();
      }
    },
    async sendEmail() {
        var res = await ResetPasswordService.resetPassword(
            this.model.email,
        );
        if (res.status == 200) {
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

.list-group{
    width: 100%;
}
</style>