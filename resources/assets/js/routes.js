import Landing from './components/Landing.vue';
import Login from './components/auth/Login.vue';
import Register from './components/auth/Register.vue';
import ResetPasswordRequest from './components/auth/ResetPasswordRequest.vue';
import ResetPassword from './components/auth/ResetPassword.vue';
import RegistrationSuccess from './components/pages/registrationSuccess/RegistrationSuccess.vue';
import Dashboard from './components/pages/dashboard/Dashboard.vue';
import Courses from './components/pages/courses/CoursesAll.vue';
import NotFound from './components/pages/notFound/NotFound.vue';

export const routes = [
	{
		path: '/',
		component: Landing
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
		path: '/user/password/reset/request',
		component: ResetPasswordRequest
	},
	{
		path: '/user/password/reset',
		component: ResetPassword
	},
	{
		path: '/registration/success',
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
	},
	{
		path: '*',
		component: NotFound
	}
]