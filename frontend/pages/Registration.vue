<template>
<div class="home">
  <div class = "space"></div>
  <div class = "pt-5">
    <div class="container regist pb-5 pl-5 pr-5">
        <h1 class="text-center pt-4 pb-5">
        Registration
        </h1>
        <div class="col-lg-12">
            <form @submit.stop.prevent="register()">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputEmail4">Email</label>
                        <input type="email" class="form-control"
                            v-model="model.email"
                            :rules="emailRules"
                            id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="Username">Username</label>
                        <input type="text" class="form-control" v-model="model.username" id="Username" placeholder="Username">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="name">Full name</label>
                        <input type="text" class="form-control" v-model="model.name" id="name" placeholder="Full Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" v-model="model.password" id="inputPassword4" placeholder="Password">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword">Password Confirmation</label>
                        <input type="password" class="form-control" v-model="model.password_confirmation" id="inputPassword" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" v-model="model.address" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Address 2</label>
                    <input type="text" class="form-control" id="inputAddress2" v-model="model.address2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" v-model="model.city" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select v-model="model.state" id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                        <option>Bali</option>
                        <option>Banten</option>
                    </select>
                    </div>
                    <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" v-model="model.zip" id="inputZip">
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                  <NuxtLink to="/" type="button" class="btn btn-danger btn-register mr-3">Back</NuxtLink>
                  <button type="submit" class="btn btn-primary btn-register">Register</button>
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
import RegisService from '../store/services/register/register'
import Toast from '../store/features/notificationToast/toast'

export default {
  name: 'Home',
  components:{
    NavbarWeb,
    CategoryType
  },
  data: () => ({
    model: {
        email: '',
        password: '',
        username: '',
        name: '',
        address: '',
        address2: '',
        city: '',
        zip: '',
        state: '',
        password_confirmation: ''
    },
    emailRules: []
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
    async register() {
        let res = await RegisService.Register(
            this.model.email,
            this.model.password,
            this.model.username,
            this.model.name,
            this.model.address,
            this.model.city,
            this.model.zip,
            this.model.state,
            this.model.password_confirmation
        );
        if (res.status == 201) {
            Toast.showToast("Registration", "Registration Success!", "danger");
            this.$router.push({ path: "/Login" });
        } else {
            Toast.showToast("Registration", "Invalid Data!", "danger");
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
