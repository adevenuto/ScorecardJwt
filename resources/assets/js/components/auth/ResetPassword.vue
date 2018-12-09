<template>
	<div class="container">
		<div class="col-sm-12 col-lg-6 mx-auto pt-3">
			<form class="form-global" @submit.prevent="resetUserPassword">
				<transition name="fade">
					<div class="status-message" v-if="passwordResetSuccess">
						<i class="fa fa-check"></i>
						Password Successfully Reset!
					</div>
				</transition>
				<div class="form-head">
					<div class="header-main">
						Reset your password
						<div class="loader" v-if="waiting"></div>
					</div>
				</div>
				<div class="form-group">
					<label for="">Email address<span>*</span></label>
					<input type="email" v-model="form.email" class="form-control" required>
					<template v-if="emailErrors">
							<div class="errors" v-for="error in emailErrors" :key="error">{{error}}</div>
					</template>
				</div>
				<div class="form-group">
					<label for="">New password<span>*</span></label>
					<input type="password" v-model="form.password" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="">Confirm new password<span>*</span></label>
					<input type="password" v-model="form.password_confirmation" class="form-control" required>
					<template v-if="passwordErrors">
						<div class="errors" v-for="error in passwordErrors" :key="error">{{error}}</div>
					</template>
				</div>
				<hr>
				<button class="btn btn-block">Reset Password</button>
			</form>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'ResetPassword',
		data() {
			return {
				form: {
					email: '',
					password: '',
					password_confirmation: ''
        },
				waiting: false,
				emailErrors: null,
				passwordErrors: null,
				passwordResetSuccess: false
			}
		},
		created: function() {
			// // Protect
			// let userUuid = window.location.search;
			// if (userUuid && userUuid.indexOf('?uuid=') !== -1) {
			// 	console.log(userUuid.split('=')[1])
			// }
		},
		watch: {
      		'form.email': function() {
				this.emailErrors = null;
			},
			'form.password': function() {
				this.passwordErrors = null;
			},
			'form.password_confirmation': function() {
				this.passwordErrors = null;
			}
    },
		methods: {
			resetUserPassword: function() {
				this.waiting = true;
				let credentials = {
					'email': this.$data.form.email,
					'password': this.$data.form.password,
					'password_confirmation': this.$data.form.password_confirmation
				};
				axios.post(`/api/auth/user/password/reset`, credentials)
				.then( payload => {
					this.waiting = false;
					let error = payload.data.error;
					if (!error) {
						this.passwordResetSuccess = true;
					} else {
						let emailErrors = error.email;
						let passwordErrors = error.password;
						if (emailErrors) this.emailErrors = emailErrors;
						if (passwordErrors) this.passwordErrors = passwordErrors;
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
	@media only screen and (max-width: 340px) {
      form.form-global .header-main {
        font-size: 1.3rem;
      }
    }
</style>