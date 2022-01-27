import Vue from "vue";
import VueRouter from "vue-router";
import ExampleComponent from "../components/ExampleComponent";
import AppLogin from "../components/AppLogin";
import AppHome from "../components/AppHome";
import AppSignup from "../components/AppSignup";
import AppAddQuestion from "../components/AppAddQuestion";
import Applogout from "../components/Aplogout";
import AppForum from "../components/AppForum";
import AppShowQuestion from "../components/Question/AppShowQuestion";
import AppChat from "../components/Chat/AppChat";
Vue.use(VueRouter);

// const Foo = { template: '<div>foo</div>' }
// const Bar = { template: '<div>bar</div>' }

// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
const routes = [
    { path: "/", component: AppHome },

    { path: "/signup", component: AppSignup },
    { path: "/AddQuestion", component: AppAddQuestion },
    { path: "/login", component: AppLogin },
    { path: "/logout", component: Applogout },
    { path: "/Forum", component: AppForum },
    { path: "/post/:slug", component: AppShowQuestion },
    { path: "/chat", component: AppChat }
    // { path: '/bar', component: Bar }
];

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    mode: "history",
    routes, // short for `routes: routes`
    meta: {
        progress: {
            func: [
                { call: "color", modifier: "temp", argument: "#ffb000" },
                { call: "fail", modifier: "temp", argument: "#6e0000" },
                { call: "location", modifier: "temp", argument: "top" },
                {
                    call: "transition",
                    modifier: "temp",
                    argument: {
                        speed: "1.5s",
                        opacity: "0.6s",
                        termination: 400
                    }
                }
            ]
        }
    }
});

export default router;
