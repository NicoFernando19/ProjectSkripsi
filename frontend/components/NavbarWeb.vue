<template>
<div>
  <b-navbar toggleable="lg" type="dark" variant="primary">
    <b-navbar-brand href="/Home">NavBar</b-navbar-brand>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      <b-navbar-nav class="mr-auto">
        <b-nav-item href="/Home">Home</b-nav-item>
        <b-nav-item href="#">Link</b-nav-item>
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

        <b-nav-item-dropdown :class="auth ? 'd-block' : 'd-none'" right>
          <!-- Using 'button-content' slot -->
          <template #button-content>
            {{ model.email }}
          </template>
          <b-dropdown-item href="#">Profile</b-dropdown-item>
          <b-dropdown-item href="#" @click="LogOut()">Sign Out</b-dropdown-item>
        </b-nav-item-dropdown>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</div>
</template>

<script>
import Cookie from 'js-cookie'

export default {
  name: 'Navbar',
  async created() {
    await this.getAuth();
  },
  data: () => ({
    auth: false,
    model: {
      email: ""
    }
  }),
  methods: {
    async getAuth() {
      if (Cookie.get("authToken") != null) {
        this.model.email = Cookie.get("authName");
        this.auth = true;
      } else {
        this.auth = false;
      }
    },
    async LogOut() {
      Cookie.remove("authToken");
      Cookie.remove("authUserId");
      Cookie.remove("authName");
      Cookie.remove("authUserName");
      this.auth = false;
      this.$router.push({ path: "/Login" });
    }
  }
}
</script>

<style scoped>
a{
    color: white;
}
</style>