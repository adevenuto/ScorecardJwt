import Landing from './components/Landing.vue';
import Login from './components/auth/Login.vue';
export const routes = [
	{
		path: '/',
		component: Landing,
		meta: {
			requiresAuth: true
		}
	},
	{
		path: '/login',
		component: Login
	}
]