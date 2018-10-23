<template>
	<div class="col-sm-6 col-sm-offset-3 pt-3">
		<form @submit.prevent="registerUser">
      <div class="form-head">
        <h3>Register</h3><div class="loader" v-if="waiting"></div>
      </div>
			<div class="form-group">
		        <input type="text" v-model="form.name" class="form-control" placeholder="Name" required>
      		</div>
      		<div class="form-group">
		        <input type="email" v-model="form.email" class="form-control" placeholder="Email Address" required>
            <span class="errors" v-if="emailError">{{emailError}}</span>
      		</div>
      		<div class="form-group">
		        <input type="password" v-model="form.password" class="form-control" placeholder="Password" required>
						<span class="errors" v-if="passwordError">{{passwordError}}</span>
      		</div>

	        <button class="btn btn-block">Register Now</button>
		</form>
	</div>
</template>

<script>
	export default {
		name: 'Register',
		data() {
			return {
				form: {
					name: '',
					email: '',
          password: ''
				},
        emailError: '',
        passwordError: '',
        waiting: false
			}
    },
    watch: {
      'form.email': function() {
        this.$data.emailError = '';
			},
			'form.password': function() {
        this.$data.passwordError = '';
      }
    },
		methods: {
			registerUser() {
        let credentials = this.$data.form;
        this.$data.waiting = true; 
				return axios.post('/api/auth/register', credentials)
					.then( payload => {
						let error = payload.data.error;
            if (!error) {
              this.$data.waiting = false;
              this.$router.push({path: '/register/success'});
            } else {
							this.$data.waiting = false;
							let parsedError = JSON.parse(error);
							let emailError = parsedError.email;
							let passwordError = parsedError.password; 
							if (emailError) this.$data.emailError = parsedError.email[0];
              if (passwordError) this.$data.passwordError = parsedError.password[0];
            }
					})
					.catch( err => {
            console.log(err);
					})
			}
		}
	}
</script>

<style scoped>
	form {
		background: #d8e4d7;
		border-radius: 5px;
		padding: 20px;
		margin: 40px 0;
		box-shadow: 0px 0px 1px 1px #999;
	}
  form h3 {
		font-weight: bold;
		font-size: 1.3rem;
		margin: 0 0 20px 0;
		color: #3c3d41;
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
  .form-head {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    align-content: center;
  }
	.errors {
	    color: #f00;
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

/* For Spinner */
.loader {
    border: 3px solid #f3f3f3;
    border-radius: 50%;
    border-top: 3px solid #3b8d3a;
    width: 20px;
    height: 20px;
    animation: spin .50s linear infinite;
    position: relative;
    left: 6px;
    top: -3px;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>