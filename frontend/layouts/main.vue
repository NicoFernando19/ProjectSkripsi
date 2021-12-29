<template>
    <div>
        <navbar-web />
        <Nuxt />
    </div>
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'
import CategoryType from '@/components/CategoryType.vue'

export default {
  components:{
    NavbarWeb,
    CategoryType
  },  
}
</script>

<style>
.btn-primary {
    background-color: #253354 !important;
    border-color: #253354 !important;
}
</style>
