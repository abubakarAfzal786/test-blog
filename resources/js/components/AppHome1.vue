<template>
  <div id="app">
    <app-header></app-header>
    <vue-topprogress ref="topProgress"></vue-topprogress>
    <vue-progress-bar></vue-progress-bar>

    <router-view></router-view>
  </div>
</template>
<script>
import AppHeader from "../components/AppHeader";
import vueTopprogress from "vue-top-progress";

export default {
  mounted() {
    this.$refs.topProgress.start();

    // Use setTimeout for demo
    setTimeout(() => {
      this.$refs.topProgress.done();
    }, 2000);
  },
  components: {
    AppHeader: AppHeader,
  },
};
</script>
<style scoped>
</style>