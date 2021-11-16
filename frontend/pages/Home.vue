<template>
<div class="home">
  <navbar-web />
  <category-type />
  <div>
    <h2 class="text-center pt-5 pb-5">
      Category Name
    </h2>
    <div class="container d-flex align-content-between flex-wrap justify-content-between pt-5">
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
      <div class="card p-4 m-3" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>  
</div>
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'
import CategoryType from '@/components/CategoryType.vue'

export default {
  name: 'Home',
  middleware: 'auth',
  components:{
    NavbarWeb,
    CategoryType
  }
}
</script>
