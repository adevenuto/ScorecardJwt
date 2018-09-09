<template>
	<div class="col-6 jumbotron mx-auto">
		<form action="">
			<div class="form-label-group">
		        <input type="text" class="form-control" id="inputName" placeholder="Name" required>
		        <label for="inputName">Name</label>
      		</div>
      		<div class="form-label-group">
		        <input type="email" class="form-control" id="inputEmail" placeholder="Email Address" required>
		        <label for="inputEmail">Email address</label>
      		</div>
      		<div class="form-label-group">
		        <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
		        <label for="inputPassword">Password</label>
      		</div>
		</form>
	</div>
</template>

<script>
	export default {
		name: 'Login'
	}
</script>

<style scoped>
	
</style>