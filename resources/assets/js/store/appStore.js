export default {
	state: {
		navigation: {
			sideNavIn: false,
		},
		welcome: 'lets play some golf!!!'
	},
	getters: {
		sideNavStatus(state) {
			return state.navigation.sideNavIn;
		},
		welcome(state) {
			return state.welcome;
		}
	},
	mutations: {
		toggleSideNav(state) {
			state.navigation.sideNavIn = !state.navigation.sideNavIn;
		}
	},
	actions: {}
}