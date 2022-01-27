<template>
<div class="home">
  <div class = "space"></div>
  <vue-element-loading :active="blockLoader" spinner="bar-fade-scale" color="#253354" size="50" />
  <div class = "pt-5">
    <div class="container-fluid">
      <div class="container">
        <p class="reg-text" style="font-size: 2rem; font-weight: 800;">Registration</p>
        <div class="col-lg-12">
            <form @submit.stop.prevent="register()">
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="companyRole">Register as</label>
                  <select v-model="model.role_id" id="companyType" :class="{'form-control' : true, 'is-valid': TypeSelected, 'is-invalid': TypeUnselected}" required>
                      <option value="0" selected>Choose...</option>
                      <option value="2">Outsourcing Provider</option>
                      <option value="3">Business Owner</option>
                  </select>
                  <div class="invalid-feedback" v-for="error in companyRules" :key="error">
                    {{ error }}
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-row">
                      <div class="form-group col-md-12">
                          <label for="inputEmail4">Email</label>
                          <input type="email" :class="{ 'form-control': true , 'is-invalid': invalid , 'is-valid': valid}"
                              v-model="model.email"
                              :rules="emailRules"
                              id="inputEmail4" placeholder="Email">
                          <div class="invalid-feedback" v-for="error in emailRules" :key="error">
                            {{ error }}
                          </div>
                      </div>
                      <div class="form-group col-md-12">
                          <label for="name">Company Name</label>
                          <input type="text" class="form-control" v-model="model.name" id="name" placeholder="Company Name" required>
                      </div>
                      <div class="form-group col-md-12">
                          <label for="Industry">Industry</label>
                          <input type="text" class="form-control" v-model="model.Industri" id="Industry" placeholder="Industry" required>
                      </div>
                      <div class="form-group col-md-12">
                          <label for="inputPassword4">Password</label>
                          <input type="password" :class="{'form-control' : true, 'is-valid': isTrue, 'is-invalid': passwordInvalid}" v-model="model.password" id="inputPassword4" placeholder="Password" required>
                          <small id="passwordHelp" :class="['form-text', 'text-muted', isTrue ? 'd-none' : 'd-block']">Password should contain 
                            <span :class="has_minimum_lenth ? 'd-none' : ''">atleast 8 characters,</span> 
                            <span :class="has_lowercase ? 'd-none' : ''">one lowercase letter,</span>
                            <span :class="has_uppercase ? 'd-none' : ''">one uppercase letter,</span>
                            <span :class="has_number ? 'd-none' : ''">One number,</span>
                            <span :class="has_special ? 'd-none' : ''">and one special character.</span>
                          </small>
                          <div class="invalid-feedback" v-for="error in passwordRule" :key="error">
                            {{ error }}
                          </div>
                      </div>
                  </div>

                </div>
                <div class="col-6">
                  <div class="form-group">
                      <label for="inputPassword">Password Confirmation</label>
                      <input type="password" :class="{'form-control': true, 'is-valid': passwordMatch, 'is-invalid': passwordUnmatch}" 
                        v-model="model.password_confirmation" 
                        :rules="passwordRules" 
                        id="inputPassword" 
                        placeholder="Password">
                      <div class="invalid-feedback" v-for="err in passwordRules" :key="err">
                        {{ err }}
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="inputAddress">Address</label>
                      <input type="text" class="form-control" v-model="model.address" id="inputAddress" placeholder="1234 Main St">
                  </div>
                  <div class="form-group">
                      <label for="companyType">Company Type</label>
                      <select v-model="model.company_type_id" id="companyType" :class="{'form-control' : true, 'is-valid': CompanyTypeSelected, 'is-invalid': CompanyTypeUnselected}" required>
                          <option value="0" selected>Choose...</option>
                          <option v-for="type in companyTypes" :key="type.id" :value="type.id">
                            {{ type.type_name }}
                          </option>
                      </select>
                      <div class="invalid-feedback" v-for="error in companyTypeRules" :key="error">
                        {{ error }}
                      </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-6">
                      <label for="inputCity">City</label>
                      <input type="text" class="form-control" v-model="model.city" id="inputCity" required>
                      </div>
                      <div class="form-group col-md-4">
                      <label for="inputState">State</label>
                      <select v-model="model.state" id="inputState" class="form-control" required>
                          <option selected>Choose...</option>
                          <option>...</option>
                          <option>Bali</option>
                          <option>Banten</option>
                      </select>
                      </div>
                      <div class="form-group col-md-2">
                      <label for="inputZip">Zip</label>
                      <input type="text" class="form-control" v-model="model.zip" id="inputZip" required>
                      </div>
                  </div>

                </div>
              </div>
                <div class="input-group">
				          <button type="submit" id="submitBtn" class="btn btn-primary">Register</button>
			          </div>
                <p class="login-register-text d-flex justify-content-center">Already have an account? <NuxtLink to="/Login" class="pl-1">Login Here</NuxtLink></p>
            </form>
        </div>

      </div>
    </div>
  </div>
</div>
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'
import CategoryType from '@/components/CategoryType.vue'
import RegisService from '../store/services/register/register'
import CompanyTypeServices from '../store/services/companyServices/companyType'
import Toast from '../store/features/notificationToast/toast'
import VueElementLoading from "vue-element-loading";

export default {
  name: 'Home',
  middleware: 'login',
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
        email: '',
        password: '',
        Industri: '',
        name: '',
        address: '',
        company_type_id: 0,
        city: '',
        zip: '',
        state: '',
        password_confirmation: '',
        role_id: 0,
        imgName: 'company.png'
    },
    companyTypes: [],
    emailRules: [],
    isTrue: '',
    has_minimum_lenth: '',
    has_number: '',
    has_lowercase:'',
    has_uppercase: '',
    has_special:'',

    passwordMatch: false,
    passwordUnmatch: false,
    passwordRules: [],

    passwordInvalid: false,
    passwordRule: [],

    TypeSelected: false,
    TypeUnselected: false,
    companyRules: [],

    CompanyTypeSelected: false,
    CompanyTypeUnselected: false,
    companyTypeRules: [],
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
    },
    "model.password": function(password) {
      this.has_minimum_lenth = (password.length >= 8);
      this.has_number    = /\d/.test(password);
      this.has_lowercase = /[a-z]/.test(password);
      this.has_uppercase = /[A-Z]/.test(password);
      this.has_special   = /[!@#\$%\^\&*\)\(+=._-]/.test(password);
      if (this.has_number && this.has_lowercase && this.has_uppercase && this.has_special && this.has_minimum_lenth) {
        this.isTrue = true
        this.passwordRule = [];
        this.passwordInvalid = false;
      } else {
        this.isTrue = false
      }
      if (password != this.model.password_confirmation) {
        this.passwordRules = ["Password does not match!"]
        this.passwordMatch = false
        this.passwordUnmatch = true
      }
    },
    "model.password_confirmation": function(value) {
      const pattern = this.model.password;
      if (pattern != value) {
        this.passwordRules = ["Password does not match!"]
        this.passwordMatch = false
        this.passwordUnmatch = true
      } else {
        this.passwordMatch = true
        this.passwordUnmatch = false
      }
    },
    "model.role_id": function(value) {
      if (value == "0") {
        this.companyRules = ["Register as is required"]
        this.TypeUnselected = true
        this.TypeSelected = false
      } else {
        this.TypeUnselected = false
        this.TypeSelected = true
      }
    },
    "model.company_type_id": function(value) {
      if (value == "0") {
        this.companyTypeRules = ["Company Type is required"]
        this.CompanyTypeUnselected = true
        this.CompanyTypeSelected = false
      } else {
        this.CompanyTypeUnselected = false
        this.CompanyTypeSelected = true
      }
    }
  },
  async created(){
    await this.getCompanyType();
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
    async getCompanyType() {
      let res = await CompanyTypeServices.listCompanyType()
      if (res.status == 200) {
        this.companyTypes = res.data.data
      }else{
        Toast.showToast("Load Company Types", "There is some error in the server", "danger");
      }
    },
    async register() {
      this.showLoader(true);
      document.getElementById("submitBtn").disable = true;
        let res = await RegisService.Register(
            this.model.email,
            this.model.password,
            this.model.name,
            this.model.name,
            this.model.address,
            this.model.city,
            this.model.zip,
            this.model.state,
            this.model.password_confirmation,
            this.model.imgName, 
            this.model.Industri,
            this.model.role_id,
            this.model.company_type_id
        );
        if (res.status == 201) {
            Toast.showToast("Registration", "Registration Success!", "success");
            this.$router.push({ path: "/Login" });
        } else {
            console.log(res)
            if (res.data.errors.role_id) {
              this.companyRules = res.data.errors.role_id
              this.TypeUnselected = true
              this.TypeSelected = false
            }
            if (res.data.errors.company_type_id) {
              this.companyTypeRules = res.data.errors.company_type_id
              this.CompanyTypeUnselected = true
              this.CompanyTypeSelected = false
            }
            if (res.data.errors.email) {
              this.emailRules = res.data.errors.email;
              this.valid = false;
              this.invalid = true;
            }
            if (res.data.errors.password) {
              this.passwordRule = res.data.errors.password;
              this.isTrue = false;
              this.passwordInvalid = true;
            }
            Toast.showToast("Registration", "Invalid Data!", "danger");
        }
      this.showLoader(false)
    }
  }
}
</script>

<style scoped>
.container {
    min-height: 400px;
    background: #FFF;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(244,231,228, 0.8);
    padding: 0px 0px;
}

.container .reg-text {
    color: #253354;
    font-weight: 500;
    font-size: 1.1rem;
    text-align: center;
    margin-bottom: 20px;
    display: block;
    text-transform: capitalize;
}

.input-group .btn {
    margin-top: 20px;
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
