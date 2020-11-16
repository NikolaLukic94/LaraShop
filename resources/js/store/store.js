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
import cartItem from './CartItem';
import userAddress from './userAddress';
import orderReview from './orderReview';
import order from './order';
import shipmentStatus from './shipmentStatus';
import shipment from './shipment';
import payment from './payment';
import aStore from './aStore';
import role from './role';

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
    cartItem,
    userAddress,
    orderReview,
    order,
    shipmentStatus,
    shipment,
    payment,
    aStore,
    role
  },
  strict:debug

});