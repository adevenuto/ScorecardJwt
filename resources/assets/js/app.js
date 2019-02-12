require('./bootstrap');
require('./main.js');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import VeeValidate from 'vee-validate';
import { routes } from './routes';
import StoreData from './store/appStore.js';
import axios from 'axios';
import AppMain from './components/AppMain.vue';

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.use(VeeValidate);

const store = new Vuex.Store(StoreData);
const router = new VueRouter({
	routes,
	mode: 'history'
});

router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
    const isLoggedIn = store.state.isLoggedIn;
    if (to.path === '/dashboard' && !isLoggedIn) {
        next({path: '/login'});
    } else if (to.path === '/login' && isLoggedIn) {
    	next('/');
    } else {
        next();
    }
});

// Intercept requests and attach Auth token to  header
axios.interceptors.request.use(function (config) {
    console.log('interceptor request')
    let token = localStorage.getItem('token'); 
    if (token) {
        config.headers['Authorization'] = `Bearer ${ token }`;
    } 
    return config;
}, function (error) {
    return Promise.reject(error);
});
// Intercept responses and update token in local storage
axios.interceptors.response.use(function (response) {
    console.log('interceptor response')
    if (response.headers.authorization) {
        const responseToken = response.headers.authorization;
        const newToken = responseToken.replace('Bearer ','');
        localStorage.setItem('token', newToken);
    }
    return response;
}, function (error) {
    return Promise.reject(error);
});

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
    	AppMain
    }
});

export {store, router};
