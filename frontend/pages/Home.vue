<template>
<div class="home">
  <navbar-web />
  <category-type />
  <div>
    <h2 class="text-center pt-5 pb-5">
      Category Name
    </h2>
    <div class="container-fluid d-flex align-content-between flex-wrap justify-content-center pt-5 pad">
      <div class="card p-4 m-3" style="width: 18rem;" v-for="itemCompanies in companies" v-bind:key="itemCompanies.id">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{ itemCompanies.name }}</h5>
          <p class="card-text">{{ itemCompanies.BidangUsaha }}</p>
          <p class="card-text">{{ itemCompanies.address }}</p>
          <p class="card-text">{{ itemCompanies.phoneNumber }}</p>
          <a href="#" class="btn btn-primary center-btn">Go somewhere</a>
        </div>
      </div>


      <!-- <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Go somewhere</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Go somewhere</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Go somewhere</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Go somewhere</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Go somewhere</a>
        </div>
      </div> -->


    </div>
  </div>  
</div>
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'
import CategoryType from '@/components/CategoryType.vue'
import axios from 'axios';


export default {
  name: 'Home',
  middleware: 'auth',
  components:{
    NavbarWeb,
    CategoryType
  },
  data(){
    return{
      companies: []
    };
  },
  mounted(){
    axios.get("localhost:8000/api/company/list")
    .then(res=>(this.companies = res.data))
    .catch(err => console.log(err))
  }
}
</script>

<style scoped>
.center-btn{
    display: block;
    margin-left: auto;
    margin-right: auto;
    max-width: fit-content;
}

.pad{
    padding: 20px 180px 0px 180px;
}
</style>