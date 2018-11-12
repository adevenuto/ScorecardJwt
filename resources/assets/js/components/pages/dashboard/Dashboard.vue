<template>
	<div>
		<h1 style="text-transform: capitalize;">{{currentUser.name}}'s Dashboard</h1>
		<div>
			<div v-for="course in currentUserCourses" :key="course.id">
				<h3 style="margin: 0;">{{course.name}}</h3>
				<i>{{course.holes}}</i><br>
				<i>{{course.email}}</i>
				<hr>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'Dashboard',
		computed: {
			currentUser() {
				return this.$store.getters.currentUser;
			},
			currentUserCourses() {
				return this.$store.getters.currentUserCourses;
			}
		},
		created: function() {
			let currentUser = this.currentUser;
			if(currentUser) this.$store.dispatch('fetchUserCourses', currentUser);
		}, 
		methods: {
			
		}
	}
</script>

<style scoped>
	
</style>