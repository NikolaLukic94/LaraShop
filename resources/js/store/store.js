import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);
Vue.config.debug = true;

import indexStatusCodes from './indexStatusCodes';
import orderItemsStatusCodes from './orderItemsStatusCodes';
import orderStatusCodes from './orderStatusCodes';
import productTypes from './productTypes';

const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
  modules: {
    indexStatusCodes,
    orderItemsStatusCodes,
    orderStatusCodes,
    productTypes
  },
  strict:debug

});