/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex'

Vue.use(Vuex)

import store from "./store/store"

import VueGoodTablePlugin from 'vue-good-table';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);

import swal from 'sweetalert2'
window.swal = swal;

Vue.use(VueGoodTablePlugin);

window.axios = require('axios')

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

let token = document.head.querySelector('meta[name="csrf-token"]')

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}

import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueMeta from 'vue-meta'
import Element from 'element-ui'
import Vuetify from 'vuetify';
import * as VueGoogleMaps from 'vue2-google-maps';

import Overdrive from 'vue-overdrive'
Vue.use(Overdrive)

import VueAnimate from 'vue-animate-scroll'

Vue.use(VueAnimate)

Vue.use(VueGoogleMaps, {
  load: {
    key: ''
  }
})

Vue.use(Vuetify);

import _ from 'lodash'
import 'vuetify/dist/vuetify.min.css'

Vue.use(VueAxios, axios)
Vue.use(Element)

Vue.component('invoice-status-code-component', require('./components/InvoiceStatusCode.vue').default);
Vue.component('order-item-status-codes-component', require('./components/OrderItemsStatusCode.vue').default);
Vue.component('order-status-codes-component', require('./components/OrderStatusCodes').default);
Vue.component('product-types-component', require('./components/ProductType').default);
Vue.component('users-component', require('./components/UsersComponent.vue').default);
Vue.component('products-component', require('./components/ProductComponent.vue').default);
Vue.component('invoices-component', require('./components/Invoice.vue').default);
Vue.component('cart-items', require('./components/CartItem').default);
Vue.component('user-payment-methods', require('./components/PaymentMethod').default);
Vue.component('order-review', require('./components/OrderReview').default);
Vue.component('payment-methods-component', require('./components/PaymentMethodComponent.vue').default);
Vue.component('shipment-status-component', require('./components/ShipmentStatus').default);
Vue.component('order-component', require('./components/OrderComponent').default);
Vue.component('shipment-component', require('./components/ShipmentComponent').default);
Vue.component('cart-component', require('./components/CartComponent').default);
Vue.component('navbar-component', require('./components/Navbar').default);
Vue.component('new-sidebar-component', require('./components/Sidebar').default);
Vue.component('login-form-component', require('./components/LoginFormComponent').default);
Vue.component('register-form-component', require('./components/RegisterComponent').default);
Vue.component('footer-component', require('./components/FooterComponent').default);
Vue.component('dashboard-chart-component', require('./components/DashboardChart').default);
Vue.component('reports-component', require('./components/ReportsComponent').default);
Vue.component('products-table-component', require('./components/ProductsDisplay').default);
Vue.component('map-component', require('./components/MapComponent').default);
Vue.component('info-component', require('./components/InfoComponent').default);
Vue.component('stripe-checkout-component', require('./components/StripeCheckoutComponent').default);
Vue.component('roles-component', require('./components/RoleComponent').default);
Vue.component('statuses-component', require('./components/StatusesComponent').default);
Vue.component('single-product-component', require('./components/SingleProduct').default);
Vue.component('autocomplete', require('./components/Autocomplete').default);
Vue.component('vue-loader', require('./components/LoaderComponent').default);
Vue.component('general-component', require('./components/GeneralComponent').default);
Vue.component('scroll-link', require('./components/ScrollLink').default);
Vue.component('conditional-visibility', require('./components/ConditionalVisibility').default);
Vue.component('landing-page', require('./components/Carousel').default);
Vue.component('home-page', require('./components/HomePage').default);
Vue.component('about', require('./components/About').default);
Vue.component('product-modal', require('./components/ProductModal').default);

const app = new Vue({
    el: '#app',
    store,
    vuetify: new Vuetify(),
});

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.toast = toast;

