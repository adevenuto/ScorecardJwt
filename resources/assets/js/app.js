require('./bootstrap');
require('./main.js');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import { routes } from './routes';
import StoreData from './store/appStore.js';

import AppMain from './components/AppMain.vue';



Vue.use(VueRouter);
Vue.use(Vuex);

const store = new Vuex.Store(StoreData);
const router = new VueRouter({
	routes,
	mode: 'history'
})

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
    	AppMain
    }
});
