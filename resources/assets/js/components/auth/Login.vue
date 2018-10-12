<template>
	<div class="col-sm-6 col-sm-offset-3 pt-3">
		<form @submit.prevent="authenticate">
			<div class="form-group">
				<!-- <label for="inputName">Name</label> -->
		        <input type="text" v-model="form.name"class="form-control" id="inputName" placeholder="Name" required>
      		</div>
      		<div class="form-group">
      			<!-- <label for="inputEmail">Email address</label> -->
		        <input type="email" v-model="form.email"class="form-control" id="inputEmail" placeholder="Email Address" required>
      		</div>
      		<div class="form-group">
      			<!-- <label for="inputPassword">Password</label> -->
		        <input type="password" v-model="form.password"class="form-control" id="inputPassword" placeholder="Password" required>
      		</div>
      		
	        <button class="btn btn-block">Login</button>

      		<template v-if="authError">
      			<p class="auth-errors">{{authError}}</p>
      		</template>
		</form>
	</div>
</template>

<script>
	export default {
		name: 'Login',
		data() {
			return {
				form: {
					name: '',
					email: '',
					password: ''
				},
				err: 'Username or password are incorrect'
			}
		},
		computed: {
			authError() {
				return this.$store.getters.authError;
			}
		},
		methods: {
			authenticate() {
				let credentials = this.$data.form; 
				return axios.post('/api/auth/login', credentials)
					.then( payload => {
						this.$store.commit('loginSuccess', payload);
		 				this.$router.push({path: '/dashboard'});
					})
					.catch( err => {
						this.$store.commit('loginFailed', this.$data.err);
					})

			}
		}
	}
</script>

<style scoped>
	form {
		background: #757575;
		border-radius: 5px;
		padding: 20px;
		margin: 40px 0;
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
		transition: 100ms ease;
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
	.auth-errors {
	    color: #f00;
	    margin-top: 15px;
	    display: inline-block;
	    padding: 0 10px;
	    border-radius: 15px;
	    background: #fff;
	    border: 1px solid #f00;
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