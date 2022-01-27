/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
// console.log(User.name())
import Vue from "vue";
import VueProgressBar from "vue-progressbar";
import App from "./components/AppHome1";
const options = {
    color: "rgb(34, 153, 221)",
    failedColor: "#874b4b",
    thickness: "5px",
    transition: {
        speed: "0.2s",
        opacity: "0.6s",
        termination: 300
    },
    autoRevert: true,
    location: "top",
    inverse: false
};
import Vuetify from "vuetify";

import vueTopprogress from "vue-top-progress";

import VueCroppie from "vue-croppie";
import AOS from "aos";
import "aos/dist/aos.css"; // You can also use <link> for styles
// ..
window.EventBus = new Vue();
Vue.use(vueTopprogress);
Vue.use(VueCroppie);
AOS.init();
import User from "./Helpers/User";
window.User = User;
console.log(User.loggedin());
Vue.use(Vuetify);
import VueSimplemde from "vue-simplemde";

Vue.use(VueSimplemde);
// index.js or main.js

window.Vue = require("vue");

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component(
    "example-component",
    require("./components/AppHome1.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import router from "./router/router";
Vue.use(VueProgressBar, options);
const app = new Vue({
    el: "#app",
    router
});
