/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

import axios from "axios";
import VueAxios from "vue-axios";
import Router from "vue-router";

import App from "./App.vue";
import HomeComponent from "./components/views/Home.vue";

Vue.use(Router);
Vue.use(VueAxios, axios);

const routes = [
  {
    name: "home",
    path: "/",
    component: HomeComponent
  }
];

const router = new Router({ mode: "history", routes });
const app = new Vue(
  Vue.util.extend({
    router,
    render: h => h(App)
  })
).$mount("#app");
