import {router} from '../app';
import {IsLoggedIn} from '../helpers/auth';

const loginStatus = IsLoggedIn();

export default {
	state: {
		navigation: {
			sideNavIn: false,
		},
		currentUser: null,
		isLoggedIn: loginStatus,
		courses: null,
		user: {
			courses: null
		},
		notificationMessage: {
			status: false,
			type: null,
			title: null,
			subtitle: null,
			linkto: null
		}
	},
	getters: {
		sideNavStatus(state) {
			return state.navigation.sideNavIn;
		},
		loggedIn(state) {
			return state.isLoggedIn;
		},
		currentUser(state) {
			return state.currentUser;
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
			state.notificationMessage.type = payload.type;
			state.notificationMessage.title = payload.title;
			state.notificationMessage.subtitle = payload.subtitle;
			state.notificationMessage.linkto = payload.linkto;
			state.notificationMessage.status = true;
			if (payload.timeout) {
				setTimeout(() => {
					this.commit('notificationMessageClear');
				}, payload.timeout);
			}
		},
		notificationMessageClear(state) {
			state.notificationMessage.status = false;
			setTimeout(() => {
				state.notificationMessage.type = null;
				state.notificationMessage.title = null;
				state.notificationMessage.subtitle = null;
				state.notificationMessage.linkto = null;
			},300);
		},
		loginSuccess(state, payload) {
			localStorage.setItem('token', payload.data.access_token);
			localStorage.setItem('logged_in', true);
			state.currentUser = payload.data.user;
			state.isLoggedIn = true;
			
		},
		logOut(state) {
			localStorage.removeItem('token');
			localStorage.removeItem('logged_in');
			state.currentUser = null;
			state.isLoggedIn = false;
			router.push('/');
		},
		setUser(state, payload) {
			state.currentUser = payload.data.user;
			state.isLoggedIn = true;
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
			axios.get('/api/user/courses')
			.then( res => {
				let courses = res.data;
				context.commit('setUserCourses', courses);
			}).catch( err => {
				console.log(err)
			})
		}
	}
}