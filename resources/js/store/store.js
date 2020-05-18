import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);
Vue.config.debug = true;

import indexStatusCodes from './indexStatusCodes';


const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
  modules: {
    indexStatusCodes,
  },
  strict:debug

});