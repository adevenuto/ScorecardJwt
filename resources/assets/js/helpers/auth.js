export function getLocalUser() {
	const user = localStorage.getItem('user');
	if (!user) {
		return null;
	}
	return JSON.parse(user);
}
export function invalidateToken(state, router) {
	const token = state.currentUser.token;
	axios.post(`/api/auth/logout?token=${token}`)
	.then( res => {
		localStorage.removeItem('user');
		state.isLoggedIn = false;
		state.currentUser = null;
		state.auth_error = null;
		router.push('/');
	})
	.catch( err => {
		console.log('hello');
	})
}
export function checkTokenExp(user, router, state) {
	const userParsed = JSON.parse(user);
	const token = userParsed.token;
	axios.get(`/api/auth/user/token/exp?token=${token}`)
	.then( res => {
		// user token invalid
		if (res.data.error) destroyUser(router, state);
	})
	.catch( err => {
		console.log(err);
	})
}
export function destroyUser(router, state) {
	localStorage.removeItem('user');
	state.isLoggedIn = false;
	state.currentUser = null;
	state.auth_error = null;
	router.push('/');
}