import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);
import message from './modules/message';
import checkLogin from './modules/checkLogin';

export default new Vuex.Store({
    modules: {
      message,
      checkLogin
    } 
})