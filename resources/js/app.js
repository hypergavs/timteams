/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter);
import Vuetify from 'vuetify';
Vue.use(Vuetify);




import {store} from './store.js';

import {routes} from './routes.js';


const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history' // short for `routes: routes`
  })


import swal from 'sweetalert2';

window.swal = swal;
const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});

window.toast = toast;


import App from './components/App.vue'
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    router,
    el: '#app',
    store,
    render: h => h(App),
    vuetify: new Vuetify(),
});
