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
    background-color: #253354 !important;
    border-color: #253354 !important;
}

.page-item.active .page-link{
  background-color: #253354 !important;
  border-color: #253354 !important;
}

.btn-secondary {
  background-color: #6B737D !important;
  border-color: #6B737D !important;
}

.bg-secondary {
  background-color: #6B737D !important;
  border-color: #6B737D !important;
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
</style>
