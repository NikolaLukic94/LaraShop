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
// import the styles
// import 'vue-good-table/dist/vue-good-table.css'

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
Vue.use(VueSweetalert2);

Vue.use(VueGoodTablePlugin);

import VueSidebarMenu from 'vue-sidebar-menu'
import 'vue-sidebar-menu/dist/vue-sidebar-menu.css'
Vue.use(VueSidebarMenu)

// const store = new Vuex.Store(
//    store
// )

window.axios = require('axios')

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

let token = document.head.querySelector('meta[name="csrf-token"]')

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueMeta from 'vue-meta'
import Element from 'element-ui'

Vue.use(VueAxios, axios)
Vue.use(Element)

Vue.component('invoice-status-code-component', require('./components/InvoiceStatusCodeComponent.vue').default);
Vue.component('order-item-status-codes-component', require('./components/OrderItemsStatusCodeComponent.vue').default);
Vue.component('order-status-codes-component', require('./components/OrderStatusCodesComponent').default);
Vue.component('product-types-component', require('./components/ProductTypeComponent').default);
Vue.component('payment-methods-component', require('./components/PaymentMethodComponent.vue').default);
Vue.component('users-component', require('./components/UsersComponent.vue').default);
Vue.component('products-component', require('./components/ProductComponent.vue').default);
Vue.component('invoices-component', require('./components/InvoiceComponent.vue').default);
Vue.component('sidebar-component', require('./components/SidebarComponent').default);
Vue.component('landing-products-page', require('./components/LandingProductsPage').default);
Vue.component('cart-items', require('./components/CartItem').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
});
