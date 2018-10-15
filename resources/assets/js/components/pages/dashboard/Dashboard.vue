<template>
	<div>
		<h1 style="text-transform: capitalize;">{{currentUser.name}} Dashboard</h1>
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
			
		}, 
		methods: {
			
		}
	}
</script>

<style scoped>
	
</style>