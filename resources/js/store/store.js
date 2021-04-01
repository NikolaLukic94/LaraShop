import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);
Vue.config.debug = true;

import statuses from './statuses'
import productTypes from './productTypes';
import paymentMethods from './paymentMethods';
import users from './users';
import products from './products';
import invoices from './invoices';
import cartItem from './CartItem';
import userAddress from './userAddress';
import orderReview from './orderReview';
import order from './order';
import shipment from './shipment';
import payment from './payment';
import aStore from './aStore';
import role from './role';

const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
    modules: {
        productTypes,
        paymentMethods,
        users,
        products,
        invoices,
        cartItem,
        userAddress,
        orderReview,
        order,
        shipment,
        payment,
        aStore,
        role,
        statuses
    },
    strict: debug

});
