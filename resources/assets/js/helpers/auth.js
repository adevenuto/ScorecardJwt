import {store} from '../app';

export function getLocalUser() {
	const user = localStorage.getItem('user');
	if (!user) {
		return null;
	}
	return JSON.parse(user);
}
export function updateJwtToken(res) {
	// Set new token in LocalStorage
	const resToken = res.headers.authorization;
	const newToken = resToken.replace('Bearer ','');
	const user = JSON.parse(localStorage.getItem('user'));
	user.token = newToken;
	localStorage.setItem('user', JSON.stringify(user));

	// console.log('Old: ' + oldToken)
	console.log('New: ' + newToken)
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
				store.commit('notificationMessage', {
					title: 'Come back soon!',
					subtitle: null,
					linkto: null,
					timeout: 4000
				});
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
	console.log(token);
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
