
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
		auth_error: null
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
		}
	},
	mutations: {
		toggleSideNav(state) {
			state.navigation.sideNavIn = !state.navigation.sideNavIn;
		},
		loginSuccess(state, payload) {
			state.currentUser = Object.assign({}, payload.user, {token: payload.access_token});
			localStorage.setItem('user', JSON.stringify(state.currentUser));
			state.isLoggedIn = true;
			state.loading = false;
			state.auth_errors = null;
		},
		loginFailed(state, payload) {
			state.auth_errors = payload.err;
		},
		logOut() {
			localStorage.removeItem('user');
			state.isLoggedIn = false;
			state.currentUser = null;
		}
	},
	actions: {}
}