<template>
	<div class="col-sm-6 col-sm-offset-3 pt-3">
		<form action="">
			<div class="form-group">
				<!-- <label for="inputName">Name</label> -->
		        <input type="text" class="form-control" id="inputName" placeholder="Name" required>
      		</div>
      		<div class="form-group">
      			<!-- <label for="inputEmail">Email address</label> -->
		        <input type="email" class="form-control" id="inputEmail" placeholder="Email Address" required>
      		</div>
      		<div class="form-group">
      			<!-- <label for="inputPassword">Password</label> -->
		        <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
      		</div>
      		
	        <button class="btn btn-block">Login</button>
      		
		</form>
	</div>
</template>

<script>
	export default {
		name: 'Login'
	}
</script>

<style scoped>
	form {
		background: #757575;
		border-radius: 5px;
		padding: 20px;
		margin: 30px 0;
		box-shadow: 0px 0px 2px 0px #999;
	}
	form label {
		color: #ececec;
	}
	form input {
		height: 40px;
		font-size: 1.2rem;
		border-color: #3c3d41;
		color: #3c3d41;
		background-color: #fff;
	}
	form button {
		font-weight: bold;
		font-size: 1.3rem;
		background: #3e8c41;
		border: 1px solid #fff;
		color: #fff;
	}
	form button:hover {
		background: #00ce07;
		color: #fff;
	}
	::-webkit-input-placeholder { /* Chrome */
	  color: #9e9e9e;
	}
	:-ms-input-placeholder { /* IE 10+ */
	  color: #9e9e9e;
	}
	::-moz-placeholder { /* Firefox 19+ */
	  color: #9e9e9e;
	  opacity: 1;
	}
	:-moz-placeholder { /* Firefox 4 - 18 */
	  color: #9e9e9e;
	  opacity: 1;
	}
</style>