import {store} from '../app';

export function getLocalUser() {
	const user = localStorage.getItem('user');
	if (!user) {
		return null;
	}
	return JSON.parse(user);
}
export function invalidateAndLogout(user) {
	const token = user.token;
	axios.get(`/api/auth/user/token/exp?token=${token}`)
	.then( res => {
		if (res.data.error) {
			// if token has expired -> logout
			store.commit('logOut');
		} else if (res.data.success) {
			// if token has not expired, invalidate -> logout
			axios.post(`/api/auth/logout?token=${token}`)
			.then( res => {
				store.commit('logOut');
			})
			.catch( err => {
				console.log(err);
			})
		}
	})
	.catch( err => {
		console.log(err);
	})
}
export function checkTokenOnRefresh(user) {
	const token = user.token;
	axios.get(`/api/auth/user/token/exp?token=${token}`)
	.then( res => {
		// if token has expired -> logout
		if (res.data.error) {
			store.commit('logOut');
		} 
	})
	.catch( err => {
		console.log(err);
	})
}
