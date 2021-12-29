<template>
<div>
  <b-navbar toggleable="lg" type="dark" variant="primary">
    <b-navbar-brand href="/company/home">NavBar</b-navbar-brand>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav class="mr-auto" v-if="roleCompany() == 'Vendor'">
        <b-nav-item><NuxtLink to="/company/vendorIndex" class="text-decoration-none">Vendor</NuxtLink></b-nav-item>
        <b-nav-item><NuxtLink to="/vacancy/view" class="text-decoration-none">Vacancy</NuxtLink></b-nav-item>
        <b-nav-item><NuxtLink to="/contract/approval" class="text-decoration-none">Contract</NuxtLink></b-nav-item>
      </b-navbar-nav>

      <b-navbar-nav class="mr-auto" v-else>
        <b-nav-item><NuxtLink to="/company/home" class="text-decoration-none">Home</NuxtLink></b-nav-item>
        <b-nav-item><NuxtLink to="/vacancy/view" class="text-decoration-none">Vacancy</NuxtLink></b-nav-item>
        <b-nav-item><NuxtLink to="/contract/create" class="text-decoration-none">Contract</NuxtLink></b-nav-item>
      </b-navbar-nav>

      <!-- center aligned nav items -->
      <b-navbar-nav class="m-auto">
        <b-nav-form>
          <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
          <b-button size="sm" class="my-2 my-sm-0" type="submit">Search</b-button>
        </b-nav-form>
      </b-navbar-nav>
      <b-navbar-nav class="ml-auto">
        <b-nav-item href="/Login" :class="auth ? 'd-none' : 'd-block'">Login</b-nav-item>
        <b-nav-item href="/Registration" :class="auth ? 'd-none' : 'd-block'" >Register</b-nav-item>

        <b-nav-item-dropdown :class="[auth ? 'd-block' : 'd-none']" right no-caret>
          <!-- Using 'button-content' slot -->
          <template #button-content>
            <font-awesome-icon :icon="['fas', 'bell']"/>
          </template>
          <b-dropdown-item v-for="notif in notification"  v-bind:key="notif.id">{{ notif.data }}</b-dropdown-item>
        </b-nav-item-dropdown>

        <b-nav-item-dropdown :class="auth ? 'd-block' : 'd-none'" right>
          <!-- Using 'button-content' slot -->
          <template #button-content>
            {{ model.email }}
          </template>
          <b-dropdown-item href="#" @click="toProfile()">Profile</b-dropdown-item>
          <b-dropdown-item href="#" @click="LogOut()">Sign Out</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</div>
</template>

<script>
import Cookie from 'js-cookie'
import NotificationServices from '../store/services/notificationServices/notification'

export default {
  name: 'Navbar',
  async created() {
    await this.getAuth();
  },
  data: () => ({
    auth: false,
    notification: [],
    model: {
      email: ""
    }
  }),
  methods: {
    async getAuth() {
      if (Cookie.get("authToken") != null) {
        this.model.email = Cookie.get("authName");
        this.auth = true;
        await this.getNotif();
      } else {
        this.auth = false;
      }
    },
    async LogOut() {
      Cookie.remove("authToken");
      Cookie.remove("authUserId");
      Cookie.remove("authName");
      Cookie.remove("authUserName");
      Cookie.remove("authCompanyName");
      Cookie.remove("authRole");
      this.auth = false;
      this.$router.push({ path: "/Login" });
    },
    async toProfile() {
      let userId = Cookie.get("authUserId");
      this.$router.push({ path: `/profile?id=${userId}` })
    },
    async getNotif() {
      let result = await NotificationServices.listNotification();
      if (result.status == 200) {
        if (result.data.data.length == 0) {
          this.notification = [
          {
            id: 1,
            data: 'There are no notifications to display'
          }]
        }else {
          this.notification = result.data.data;
        }
      } else {
        this.notification = [
          {
            id: 1,
            data: 'There are some error in the server'
          }]
      }
    }, 
    roleCompany() {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${'authRole'}=`);
        if (parts.length === 2){
            var role = parts.pop().split(';').shift()
        }
        return role
    }
  }
}
</script>

<style scoped>
a{
    color: white;
}
.navbar.navbar-dark.bg-primary{
    background-color: #253354!important;
}
</style>