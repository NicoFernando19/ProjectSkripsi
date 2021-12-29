<template>
<div class="homeVendor">
  <div class="container">
      <div class="center">
        <h2 class="text-center">
            WELCOME {{ companyName }}
        </h2>
        <div class="space"></div>
        <a href="/vacancy/view" class="btn btn-success center-btn">View Vacancy</a> 
      </div>
  </div> 
</div>
</template>

<script>
import Cookie from 'js-cookie'

export default {
  name: 'vendorIndex',
  middleware: ['auth', 'vendor'],
  layout: 'main',
  data() {
    return {
      companyName: ''
    }
  },
  async created() {
    await this.getAuth();
  },
  methods: {
    async getAuth() {
      if (Cookie.get("authToken") != null) {
        this.companyName = Cookie.get("authCompanyName");
      }
    },
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