/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

import axios from "axios";
import VueAxios from "vue-axios";
import Vuex from 'vuex';
import Router from "vue-router";
import {BootstrapVue, IconsPlugin} from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import routes from './routes';
import App from "./App.vue";
import createStore from './store';

Vue.use(Router);
Vue.use(Vuex);
Vue.use(VueAxios, axios);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

const store = createStore();

const router = new Router({mode: "history", routes});
const app = new Vue(
  Vue.util.extend({
    router,
    store,
    render: h => h(App)
  })
).$mount("#app");
