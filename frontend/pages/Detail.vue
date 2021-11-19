<template>
<div class="home">
  <navbar-web />
  <div>
    <h2 class="text-center pt-5 pb-5">
      Person Name
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
                    <li class="list-group-item">Name: John Doe</li>
                    <li class="list-group-item">Job: Technical</li>
                    <li class="list-group-item">Gender: Male</li>
                    <li class="list-group-item">Age: 26</li>
                    <li class="list-group-item">Experience: 10+ years</li>
              </ul>
          </div>
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
  name: 'Detail',
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

/* .prev-work{
  max-width: fit-content;
} */
</style>
