export function login(credentials) {
	return axios.post('/api/auth/login', credentials)
			.then((res) => {
				return res.data;
			})
			.then((err) =>{
				return err;
			})
}

export function getLocalUser() {
	const user = localStorage.getItem('user');
	if (!user) {
		return null;
	}
	return JSON.parse(user);
}