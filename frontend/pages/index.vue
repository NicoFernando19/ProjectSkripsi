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
  middleware: function({ redirect }) {
      redirect('/Login');
  },
  components:{
    NavbarWeb
  },  
}
</script>
