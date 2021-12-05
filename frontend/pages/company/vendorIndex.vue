<template>
<div class="homeVendor">
  <navbar-web />
  <div class="container">
      <div class="center">
        <h2 class="text-center">
            WELCOME PT XYZ
        </h2>
        <div class="space"></div>
        <a href="#" class="btn btn-success center-btn">View Vacancy</a> 
      </div>
  </div> 
</div>
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'
import CategoryType from '@/components/CategoryType.vue'
import axios from 'axios';

export default {
  name: 'vendorIndex',
  middleware: 'auth',
  components:{
    NavbarWeb,
    CategoryType
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

.space{
    height: 30px;
}

.container{
    height: 850px;
}

.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.title{
    display: block;
    margin:auto;
    height: fit-content;
    width: fit-content;
}
</style>