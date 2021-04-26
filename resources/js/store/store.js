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
import orderItem from './orderItem';
import userAddress from './userAddress';
import orderReview from './orderReview';
import order from './order';
import shipment from './shipment';
import payment from './payment';
import aStore from './aStore';
import role from './role';
import permission from './permission';

const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
    modules: {
        productTypes,
        paymentMethods,
        users,
        products,
        invoices,
        orderItem,
        userAddress,
        orderReview,
        order,
        shipment,
        payment,
        aStore,
        role,
        statuses,
        permission
    },
    strict: debug

});
