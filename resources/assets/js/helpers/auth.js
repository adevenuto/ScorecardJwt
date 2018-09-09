export function login() {
	return axios.post('/api/auth/login', credentials)
			.then((response) => {
				console.log(response.data);
			})
			.then((err) =>{
				console.log(err);
			})
}

export function getLocalUser() {
	const user = LocalStorage.getItem('user');
	if (!user) {
		return null;
	}
	return JSON.parse(user);
}