require("./bootstrap");

window.Vue = require("vue").default;

import Vue from "vue";
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import axios from 'axios';
import { routes } from "./routes";

Vue.use(VueRouter);
Vue.use(VueAxios, axios);


Vue.component(
    "employees-index",
    require("./components/employees/Index.vue").default
);

const router = new VueRouter({
    mode: "history",
    routes: routes
});

const app = new Vue({
    el: "#app",
    router: router
});
