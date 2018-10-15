<template>
	<div>
		<h1 style="text-transform: capitalize;">{{currentUser.name}}'s Dashboard</h1>
		
	</div>
</template>

<script>
	export default {
		name: 'Dashboard',
		computed: {
			currentUser() {
				return this.$store.getters.currentUser;
			}
		},
		mounted: function() {
			let currentUser = this.$store.getters.currentUser;
			this.fetchUserCourses(currentUser);
		}, 
		methods: {
			fetchUserCourses: function(currentUser) {
				return axios.get('/api/auth/user/courses', {
					params: {
						userId: currentUser.id
					}
				})
				.then( res => {
					console.log(res)
					// let courses = res.data.courses;
					// this.$store.commit('setCourses', courses);
				})
				.catch( err => {
					console.log(err)
				})
			}
		}
	}
</script>

<style scoped>
	
</style>