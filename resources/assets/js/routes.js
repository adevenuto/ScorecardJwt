import Landing from './components/Landing.vue';
import Login from './components/auth/Login.vue';
import Register from './components/auth/Register.vue';
import RegistrationSuccess from './components/pages/registrationSuccess/RegistrationSuccess.vue';
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
		path: '/register/success',
		component: RegistrationSuccess
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