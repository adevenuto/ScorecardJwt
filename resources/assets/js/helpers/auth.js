import {store} from '../app';

export function IsLoggedIn() {
	const loggedIn = localStorage.getItem('logged_in');
	if (!loggedIn) {
		return false;
	}
	return true;
}
export function invalidateAndLogout() {
	axios.get('/api/user/token/exp')
	.then( res => {
		if (res.data.error) {
			// token expired? -> logout             
			store.commit('logOut');
		} else if (res.data.success) {
			// token not expired?, invalidate -> logout
			axios.post('/api/auth/logout')
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
export function checkTokenGetUser() {
	const token = localStorage.getItem('token')
	if (token) {
		axios.get('/api/user/token/exp')
		.then( res => {
			if (res.status === 200) {
				axios.get('/api/user')
				.then( payload => {
					store.commit("setUser", payload);
				})
				.catch( err => {
					console.log(err);
				}) 
			}
		})
		.catch( err => {
			// if token has expired -> logout
			return store.commit('logOut');
		})
	}
}
