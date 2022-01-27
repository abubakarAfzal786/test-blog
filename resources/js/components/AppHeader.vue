<template>
  <v-toolbar>
    <v-toolbar-side-icon></v-toolbar-side-icon>
    <v-toolbar-title>Title</v-toolbar-title>
    <v-spacer></v-spacer>
    <div class="hidden-sm-and-down">
      <router-link to="/"><v-btn flat>Home</v-btn></router-link>

      <span v-for="item in items" :key="item.to">
        <router-link :to="item.to" v-if="item.show"
          ><v-btn flat>{{ item.name }}</v-btn></router-link
        >
      </span>
    </div>
  </v-toolbar>
</template>
<script>
export default {
  data() {
    return {
      items: [
        { to: "/Forum", name: "Forum", show: User.loggedin() },
        { to: "/AddQuestion", name: "Add Question", show: User.loggedin() },

        { to: "/logout", name: "Logout", show: User.loggedin() },
        { to: "/login", name: "Login", show: !User.loggedin() },
      ],
    };
  },
  created() {
    EventBus.$on("logout", () => {
      User.logout();
    });
  },
};
</script>
<style scoped>
</style>