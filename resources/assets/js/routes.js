import Landing from './components/Landing.vue';
import Login from './components/auth/Login.vue';
export const routes = [
	{
		path: '/',
		component: Landing
	},
	{
		path: '/login',
		component: Login
	}
]