<template>
<div class="home">
  <navbar-web />
  <div>
    <h2 class="text-center pt-5 pb-5">
      Company Detail
    </h2>
    <div class="container d-flex justify-content-between pt-5 detail-content">
      <div class="detail-left container">
          <div class="row">
              <div class="col-lg-12">
                  <img class="detail-img" src="" />
              </div>
          </div>
      </div>
      <div class="detail-right container">
          <div class="row">
              <ul class="list-group pb-2">
                    <li class="list-group-item">Company Name: PT XYZ</li>
                    <li class="list-group-item">Function: IT</li>
                    <li class="list-group-item">Workforce: 285</li>
                    <li class="list-group-item">Budget: >Rp 200.000.000</li>
                    <li class="list-group-item">Phone: 021-88822233</li>
                    <li class="list-group-item">Email: xyz@example.com</li>
              </ul>
          </div>
      </div>
    </div>
  </div>  
<div class="spacing"></div>
<div style="max-width: fit-content;" class="pl-5">
<h3>Employees</h3>
</div>
<div class="container-fluid d-flex align-content-between flex-wrap justify-content-center pt-2 pad">
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Detail</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Detail</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Detail</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Detail</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Detail</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary center-btn">Detail</a>
        </div>
      </div>
</div>

  <div class="spacing"></div>
  <h2 class="text-center pt-5 pb-5">
      Previous Works
  </h2>
  <div class="container-xl pb-5 prev-work">
    <ul class="list-group pb-2">
        <li class="list-group-item">(Feb 2020 - Apr 2021) proyek website LMS PT ABC </li>
        <li class="list-group-item">(Feb 2020 - Apr 2021) proyek website LMS PT ABC </li>
        <li class="list-group-item">(Feb 2020 - Apr 2021) proyek website LMS PT ABC </li>
        <li class="list-group-item">(Feb 2020 - Apr 2021) proyek website LMS PT ABC </li>
        <li class="list-group-item">(Feb 2020 - Apr 2021) proyek website LMS PT ABC </li>
    </ul>
  </div>
</div>
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'
import CategoryType from '@/components/CategoryType.vue'

export default {
  name: 'CompanyDetail',
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
    width: 100%;
}

.spacing{
  height: 70px;
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
