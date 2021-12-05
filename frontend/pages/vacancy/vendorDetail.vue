<template>
<div class="vendorVacancyStatus">
  <navbar-web />
  <div>
    <h2 class="text-center pt-5 pb-4">
        <b>VACANCY STATUS</b>
    </h2>
    <div class="container justify-content-between">
      <div class="container">
          <div class="row justify-content-center">
              <ul class="list-group pb-2">
                    <li class="list-group-item">Title: Software Engineering Project</li>
                    <li class="list-group-item">Job Function: IT</li>
                    <li class="list-group-item">Workforce Needed: 10</li>
                    <li class="list-group-item">Budget: 250.000.000</li>
                    <li class="list-group-item">Status: <b style="color: green">Open</b></li>
              </ul>
          </div>
      </div>
    </div>
  </div>  
<div class="spacing"></div>
<div class="spacing"></div>
<div style="max-width: fit-content;" class="pl-5">
<h3>Joined Companies</h3>
</div>
<div class="container-fluid d-flex align-content-between flex-wrap justify-content-center pt-2 pad">
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
</div>
<div class="spacing"></div>
<button type="submit" class="btn btn-primary center-btn">Join Vacancy</button>
</div>
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'
import CategoryType from '@/components/CategoryType.vue'

export default {
  name: 'vendorDetail',
  components:{
    NavbarWeb,
    CategoryType
  }
}
</script>

<style scoped>
.detail-img{
    width: 90%;
    height: 450px;
    display: block;
    margin-right: auto;
    margin-left: auto;
}

.list-group{
    width: fit-content;
}

.spacing{
  height: 50px;
}

.center-btn{
    display: block;
    margin-left: auto;
    margin-right: auto;
    max-width: fit-content;
}

/* .prev-work{
  max-width: fit-content;
} */
</style>
