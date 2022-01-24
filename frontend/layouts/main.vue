<template>
    <div>
        <NavbarWeb ref="navbar" />
        <Nuxt />
        <Footer />
    </div>
</template>

<script>
import NavbarWeb from '@/components/NavbarWeb.vue'
import CategoryType from '@/components/CategoryType.vue'
import Footer from '@/components/Footer.vue'

export default {
  components:{
    NavbarWeb,
    CategoryType,
    Footer
  },  
}
</script>

<style>
.btn-primary {
    background-color: #27A599 !important;
    border-color: #27A599 !important;
}

.page-item.active .page-link{
  background-color: #27A599 !important;
  border-color: #27A599!important;
}

.btn-secondary {
  background-color: #C2C2C2 !important;
  border-color: #C2C2C2 !important;
}

.btn-third {
  background-color: #FF990A !important;
  border-color: #FF990A !important;
}

.bg-secondary {
  background-color: #C2C2C2 !important;
  border-color: #C2C2C2 !important;
}

.bg-third {
  background-color: #FF9F1C !important;
  border-color: #FF9F1C !important;
}

.btn-danger {
  background-color: #BD3A13 !important;
  border-color: #BD3A13 !important;
}

.bg-danger {
  background-color: #BD3A13 !important;
  border-color: #BD3A13 !important;
}

.btn-success {
  background-color: #3D7568 !important;
  border-color: #3D7568 !important;
}

.bg-success {
  background-color: #3D7568 !important;
  border-color: #3D7568 !important;
}

.border-third{
  border-block-color: #FF9F1C;
}
</style>
