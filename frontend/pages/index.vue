<template>
  <div>
    <navbar-web />
    <p>Test Skripsi</p>
  </div>
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'

export default {
  name: 'Index',
  middleware: 'auth',
  components:{
    NavbarWeb
  },  
}
</script>
