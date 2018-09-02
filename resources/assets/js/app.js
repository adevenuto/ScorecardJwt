require('./bootstrap');
require('./main.js');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import { routes } from './routes';
import AppMain from './components/AppMain.vue';



Vue.use(VueRouter);
Vue.use(Vuex);

const router = new VueRouter({
	routes,
	mode: 'history'
})

const app = new Vue({
    el: '#app',
    router,
    components: {
    	AppMain
    }
});
