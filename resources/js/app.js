/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');



import store from "./store/store"
import Vuex from 'vuex'
import VueGoodTablePlugin from 'vue-good-table';
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueMeta from 'vue-meta'
import Element from 'element-ui'
import Vuetify from 'vuetify';
import * as VueGoogleMaps from 'vue2-google-maps';
import Overdrive from 'vue-overdrive'
import VueAnimate from 'vue-animate-scroll'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import swal from 'sweetalert2'

Vue.use(VueSweetalert2);
Vue.use(Vuex)
Vue.use(VueGoodTablePlugin);
Vue.use(Overdrive)
Vue.use(VueAnimate)

window.swal = swal;

window.axios = require('axios')

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

let token = document.head.querySelector('meta[name="csrf-token"]')

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}

window.axios.defaults.headers.common['Authorization'] = 'Bearer ' + document.head.querySelector('meta[name="auth-token"]').getAttribute('content');

console.log('qqq', document.head.querySelector('meta[name="auth-token"]').getAttribute('content'))

Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyC0vyc1yK4h7D1zoTL_EA40mh6rZUOW92g'
  }
})

Vue.use(Vuetify);

import _ from 'lodash'
import 'vuetify/dist/vuetify.min.css'

Vue.use(VueAxios, axios)
Vue.use(Element)

Vue.component('permissions-component', require('./components/PermissionsComponent.vue').default);
Vue.component('status-codes-component', require('./components/StatusCodesComponent.vue').default);
Vue.component('product-types-component', require('./components/ProductType').default);
Vue.component('users-component', require('./components/UsersComponent.vue').default);
Vue.component('products-component', require('./components/ProductComponent.vue').default);
Vue.component('invoices-component', require('./components/Invoice.vue').default);
Vue.component('user-payment-methods', require('./components/PaymentMethod').default);
Vue.component('payment-methods-component', require('./components/PaymentMethodComponent.vue').default);
Vue.component('order-component', require('./components/OrderComponent').default);
Vue.component('shipment-component', require('./components/ShipmentComponent').default);
Vue.component('dashboard-chart-component', require('./components/DashboardChart').default);
Vue.component('reports-component', require('./components/ReportsComponent').default);
Vue.component('roles-component', require('./components/RoleComponent').default);
Vue.component('statuses-component', require('./components/StatusesComponent').default);
Vue.component('single-product-component', require('./components/visuals/SingleProduct').default);

Vue.component('home-page', require('./components/HomePage').default);
Vue.component('login-form-component', require('./components/visuals/LoginFormComponent').default);
Vue.component('register-form-component', require('./components/visuals/RegisterComponent').default);

Vue.component('autocomplete', require('./components/Autocomplete').default);

Vue.component('navbar-component', require('./components/Navbar').default);
Vue.component('new-sidebar-component', require('./components/visuals/Sidebar').default);
Vue.component('products-table-component', require('./components/ProductsDisplay').default);

// Vue.component('user-payment-methods', require('./components/PaymentMethod').default);
// Vue.component('payment-methods-component', require('./components/PaymentMethodComponent.vue').default);
// Vue.component('statuses-component', require('./components/StatusesComponent').default);

import VueRouter from 'vue-router';
import routes from './routes';

Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    store,
    vuetify: new Vuetify(),
    router: new VueRouter(routes)
});

const toast = swal.mixin({
  toast: true,
  position: 'bottom-end',
  showConfirmButton: false,
  timer: 3000
});

window.toast = toast;



