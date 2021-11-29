<template>
<div class="createVacancy">
  <navbar-web />
  <div class = "pt-4">
    <div class="container pb-5 pl-5 pr-5">
        <h1 class="text-center pt-4 pb-5">
        Create Vacancy
        </h1>
        <div class="col-lg-12">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputEmail4">Post Date</label>
                    <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputPassword4">Deadline</label>
                    <input type="password" class="form-control" id="inputPassword4">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Vacancy Title</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Job Function</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Job Description</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Number of Workforce Needed</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Budget</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Specifications / Requirements</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="space"></div>
                <button type="submit" class="btn btn-primary center-btn">Submit</button>
            </form>


            <!-- <form @submit.stop.prevent="register()">
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
            </form> -->
            
        </div>
    </div>
  </div>  
</div>  
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'

export default {
  name: 'CreateVacancy',
  components:{
    NavbarWeb
  }
}
</script>

<style scoped>
.space{
    height: 30px;
}

.list-group{
    width: 100%;
}

.center-btn{
    display: block;
    margin-left: auto;
    margin-right: auto;
    max-width: fit-content;
}
</style>