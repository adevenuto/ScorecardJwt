<template>
	<div>
		<h1 style="text-transform: capitalize;">{{currentUser.name}}'s Dashboard</h1>
		<div>
			<div v-for="course in currentUserCourses" :key="course.id">
				{{course.course_name}}
				{{course.course_holes}}
				{{course.course_email}}
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
		mounted: function() {
			let currentUser = this.$store.getters.currentUser;
			this.$store.dispatch('fetchUserCourses', currentUser);
		}, 
		methods: {
			
		}
	}
</script>

<style scoped>
	
</style>