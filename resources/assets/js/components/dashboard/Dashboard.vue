<template>
	<div>
		<h1 style="text-transform: capitalize;">{{currentUser.name}} Dashboard</h1>
		<div v-for="course in allCourses" :key="course.id">
			{{course.course_name}}
			{{course.course_holes}}
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
			allCourses() {
				console.log(this.$store.getters.getCourses)
				return this.$store.getters.getCourses;
			}
		},
		mounted: function() {
			this.fetchCourses();
		}, 
		methods: {
			fetchCourses: function() {
				return axios.get('/api/auth/courses')
				.then( res => {
					let courses = res.data.courses;
					this.$store.commit('setCourses', courses);
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