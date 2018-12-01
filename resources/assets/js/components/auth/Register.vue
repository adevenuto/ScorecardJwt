<template>
	<div class="container">
		<div class="col-sm-12 col-lg-6 mx-auto pt-3">
			<form class="form-global" @submit.prevent="registerUser">
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
              this.$router.push({path: '/registration/success'});
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
	
</style>