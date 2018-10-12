import Landing from './components/Landing.vue';
import Login from './components/auth/Login.vue';
import Dashboard from './components/dashboard/Dashboard.vue';

export const routes = [
	{
		path: '/',
		component: Landing,
		meta: {requiresAuth: true}
	},
	{
		path: '/login',
		component: Login
	},
	{
		path: '/dashboard',
		component: Dashboard,
		meta: {requiresAuth: true}
	}
]