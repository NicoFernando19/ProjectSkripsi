<template>
<div class="home">
  <navbar-web />
  <div class = "space"></div>
  <div class = "pt-5">
    <div class="container regist pt-3 pb-5 pl-5 pr-5">
        <h1 class="text-center pt-4 pb-5">
        Login
        </h1>
        <div class="col-lg-12">
            <form>
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group pb-3">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-register">Login</button>
            </form>
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
  components:{
    NavbarWeb,
    CategoryType
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

.btn-register{
    display: block;
    margin: 20px auto 0;
}

.list-group{
    width: 100%;
}
</style>
