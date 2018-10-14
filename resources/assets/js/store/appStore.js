
import {getLocalUser} from '../helpers/auth';

const user = getLocalUser();

export default {
	state: {
		navigation: {
			sideNavIn: false,
		},
		currentUser: user,
		isLoggedIn: !!user,
		loading: false,
		auth_error: null,
		courses: null
	},
	getters: {
		sideNavStatus(state) {
			return state.navigation.sideNavIn;
		},
		currentUser(state) {
			return state.currentUser;
		},
		isLoggiedIn(state) {
			return state.isLoggedIn;
		},
		isLoading(state) {
			return state.loading;
		},
		authError(state) {
			return state.auth_error;
		},
		getCourses(state) {
			return state.courses;
		}
	},
	mutations: {
		toggleSideNav(state) {
			state.navigation.sideNavIn = !state.navigation.sideNavIn;
		},
		loginSuccess(state, payload) {
			state.currentUser = Object.assign({}, payload.data.user, {token: payload.data.access_token});
			localStorage.setItem('user', JSON.stringify(state.currentUser));
			state.isLoggedIn = true;
			state.loading = false;
			state.auth_error = null;
		},
		loginFailed(state, err) {
			state.auth_error = err;
		},
		logOut(state, router) {
			localStorage.removeItem('user');
			state.isLoggedIn = false;
			state.currentUser = null;
			state.auth_error = null;
			router.push('/');
		},
		setCourses(state, courses) {
			state.courses = courses;
		}
	},
	actions: {}
}