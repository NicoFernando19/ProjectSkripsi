<template>
  <div>
    <p>Test Skripsi</p>
  </div>
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'

export default {
  name: 'Index',
  layout: 'main',
  middleware: ['auth', 'login'],
  components:{
    NavbarWeb
  },  
}
</script>
