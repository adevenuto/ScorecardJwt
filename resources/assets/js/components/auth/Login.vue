<template>
	<div class="col-sm-6 col-sm-offset-3 pt-3">
		<form @submit.prevent="authenticate">
			<transition name="fade">
				<div v-if="emailNotVerified" class="validate-email-message">
					<div id="activation-email" v-if="verificationEmailSent">
						<i class="fa fa-check"></i>
						Activation Email Sent, Check Your Inbox
					</div>
					<p>We've sent an activation link to your inbox. Please, use that to activate your account. Or, <a href="#" @click="sendVerificationEmail">resend link</a>
					</p>
					<hr>
				</div>
			</transition>
			<div class="form-head">
        <h3>Login</h3>
				<div class="loader" v-if="waiting"></div>
      </div>
			<div class="form-group">
				<input type="email" v-model="form.email" class="form-control" placeholder="Email Address" required>
			</div>
			<div class="form-group">
				<input type="password" v-model="form.password" class="form-control" placeholder="Password" required>
			</div>
			<button class="btn btn-block">Login</button>
			<template v-if="authError">
				<p class="errors">{{authError}}</p>
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
				waiting: false,
				emailNotVerified: false,
				verificationEmailSent: false
			}
		},
		watch: {
      'form.email': function() {
        this.$store.commit('loginFailed', '');
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
				this.$data.waiting = true;
				return axios.post('/api/auth/login', credentials)
					.then( payload => {
						let error = payload.data.error;
						if(!error) {
							this.$data.waiting = false;
							this.$data.emailNotVerified = false;
							this.$store.commit('loginSuccess', payload);
							this.$router.push({path: '/dashboard'});
						} else {
							this.$data.waiting = false;
							let emailNotVerified = error.emailNotVerified;
							let authError = error.authError;
							if(emailNotVerified) { 
								this.$data.emailNotVerified = true;
							}
							if(authError) {
								this.$data.emailNotVerified = false; 
								this.$store.commit('loginFailed', authError);
							}
						}
					})
					.catch( err => {
						console.log(err);
						this.$data.waiting = false;
					})
			},
			sendVerificationEmail() {
				const that = this;
				let payload = this.$data.form;
				return axios.post('/api/auth/user/send/activation/email', payload)
					.then( payload => {
						this.$data.verificationEmailSent = true;
						// this.$data.emailNotVerified = false;
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
	#activation-email {
		border: 1px solid #3b8d3a;
    display: inline-block;
    color: #fff;
    padding: 0 20px;
    margin-bottom: 10px;
    border-radius: 4px;
    background: #3b8d3a;
	}
	.validate-email-message {
		font-size: 14px;
    margin-bottom: 15px;
    color: #d21717;
	}
	.validate-email-message a {
		color: #168ee4;
    text-decoration: underline;
	}
	.validate-email-message a:hover {
		color: #0072ff;
	}
	.errors {
		color: #d21717;
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
.fade-enter-active, .fade-leave-active {
	transition-property: opacity;
	transition-duration: .20s;
}
.fade-enter-active {
	transition-delay: .20s;
}
.fade-enter, .fade-leave-active {
	opacity: 0
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