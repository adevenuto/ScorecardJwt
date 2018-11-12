<template>
	<div class="col-sm-6 col-sm-offset-3 pt-3">
		<form @submit.prevent="sendResetPasswordLink">
			<transition name="fade">
				<div class="password-reset-message">
					<!-- <div id="activation-email" v-if="verificationEmailSent">
						<i class="fa fa-check"></i>
						Activation Email Sent, Check Your Inbox
					</div>
					<p>We've sent an activation link to your inbox. Please, use that to activate your account. Or, <a href="#" @click="sendVerificationEmail">resend link</a>
					</p>
					<hr> -->
				</div>
			</transition>
			<div class="form-head">
					<div class="header">
						<h3>Reset Your Password</h3>
						<div class="loader" v-if="waiting"></div>
					</div>
          <small>Send an password reset link to your inbox</small>
      </div>
			<div class="form-group">
				<input type="email" v-model="form.email" class="form-control" placeholder="Email Address" required>
			</div>
			<button class="btn btn-block">Send Password Reset Link</button>
			<template v-if="emailNotFound">
				<p class="errors">{{authError}}</p>
			</template>
		</form>
	</div>
</template>

<script>
	export default {
		name: 'ResetPassword',
		data() {
			return {
				form: {
					email: ''
        },
        waiting: false,
        emailNotFound: false
			}
		},
		watch: {
      
    },
		methods: {
			sendResetPasswordLink: function() {
				let credentials = {
					'email': this.$data.form.email
				};
				axios.post(`/api/auth/user/password/reset`, credentials)
				.then( res => {
					
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
		padding: 20px;
		margin: 40px 0;
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
    margin-bottom: 15px;
	}
  .form-head .header {
		display: flex;
		flex-direction: row;
		justify-content: flex-start;
	}
  .header h3 {
    margin-bottom: 0;
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