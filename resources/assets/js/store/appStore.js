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
		}
	},
	mutations: {
		toggleSideNav(state) {
			state.navigation.sideNavIn = !state.navigation.sideNavIn;
		}
	},
	actions: {}
}