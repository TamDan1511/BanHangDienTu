/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


window.Vue = require('vue').default;
require('./bootstrap');
import Dialog from 'vue-dialog-loading'
import App from './components/App.vue';
import router from './router.js';
import store from './store';


Vue.prototype.$ = $;
Vue.prototype._ = _;
Vue.use(Dialog);
import gsap from "gsap";
Vue.prototype.gsap = gsap;

const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});