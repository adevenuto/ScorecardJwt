
import {getLocalUser, updateJwtToken} from '../helpers/auth';
import {router} from '../app';

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
		courses: null,
		user: {
			courses: null
		},
		notificationMessage: {
			status: false,
			title: null,
			subtitle: null,
			linkto: null
		}

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
		},
		currentUserCourses(state) {
			return state.user.courses;
		},
		notificationMessage(state) {
			return state.notificationMessage;
		}
	},
	mutations: {
		toggleSideNav(state) {
			state.navigation.sideNavIn = !state.navigation.sideNavIn;
		},
		notificationMessage(state, payload) {
			state.notificationMessage.title = payload.title;
			state.notificationMessage.subtitle = payload.subtitle;
			state.notificationMessage.linkto = payload.linkto;
			state.notificationMessage.status = !state.notificationMessage.status;
		},
		notificationMessageClear(state) {
			state.notificationMessage.title = null;
			state.notificationMessage.subtitle = null;
			state.notificationMessage.linkto = null;
			state.notificationMessage.status = !state.notificationMessage.status;
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
		logOut(state) {
			localStorage.removeItem('user');
			state.isLoggedIn = false;
			state.currentUser = null;
			state.auth_error = null;
			router.push('/');
		},
		setCourses(state, courses) {
			state.courses = courses;
		}, 
		setUserCourses(state, courses) {
			state.user.courses = courses;
		}
	},
	actions: {
		fetchUserCourses: function(context) {
			axios.get('/api/user/courses', {
				headers: {
					'Authorization': `Bearer ${context.state.currentUser.token}`
				},
				params: {
					userId: context.getters.currentUser.id
				}
			}).then( res => {
				updateJwtToken(res);
				let courses = res.data;
				context.commit('setUserCourses', courses);
			}).catch( err => {
				console.log(err)
			})
		}
	}
}