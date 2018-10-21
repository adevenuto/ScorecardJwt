<template>
<div>
	<div v-for="course in courses" :key="course.id">
		<h3 style="margin: 0;">{{course.name}}</h3>
		<i>{{course.holes}}</i><br>
		<i>{{course.email}}</i>
		<hr>
	</div>
</div>
</template>

<script>
  export default {
    name: 'courses',
		computed: {
			courses() {
				return this.$store.getters.getCourses;
			}
		},
		mounted: function() {
			this.fetchCourses();
		}, 
		methods: {
			fetchCourses: function() {
				return axios.get('/api/courses')
				.then( res => {
					let courses = res.data;
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