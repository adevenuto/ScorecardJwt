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
router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
    const currentUser = store.state.currentUser;
	console.log(to.path)
    if (to.path === '/dashboard' && !currentUser) {
        next({path: '/login'});
    } else {
    	next();
    }
});
const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
    	AppMain
    }
});
