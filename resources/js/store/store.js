import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);
Vue.config.debug = true;

import indexStatusCodes from './indexStatusCodes';
import orderItemsStatusCodes from './orderItemsStatusCodes';
import orderStatusCodes from './orderStatusCodes';
import productTypes from './productTypes';
import paymentMethods from './paymentMethods';
import users from './users';
import products from './products';
import invoices from './invoices';
import landingProductsPage from './landingProductsPage';
import cartItem from './CartItem';
import userAddress from './userAddress';
import orderReview from './orderReview';
import order from './order';
import shipmentStatus from './shipmentStatus';
import user from './user';
import shipment from './shipment';

const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
  modules: {
    indexStatusCodes,
    orderItemsStatusCodes,
    orderStatusCodes,
    productTypes,
    paymentMethods,
    users,
    products,
    invoices,
    landingProductsPage,
    cartItem,
    userAddress,
    orderReview,
    order,
    shipmentStatus,
    user,
    shipment
  },
  strict:debug

});