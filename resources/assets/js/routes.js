import Landing from './components/Landing.vue';
import Login from './components/auth/Login.vue';
import Register from './components/auth/Register.vue';
import Dashboard from './components/pages/dashboard/Dashboard.vue';
import Courses from './components/pages/courses/CoursesAll.vue';

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
		path: '/register',
		component: Register
	},
	{
		path: '/dashboard',
		component: Dashboard,
		meta: {requiresAuth: true}
	},
	{
		path: '/courses',
		component: Courses
	}
]