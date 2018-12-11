<template>
	<div class="container">
		<div class="col-sm-12 col-lg-6 mx-auto pt-3">
			<form class="form-global" @submit.prevent="registerUser">
				<div class="form-head">
					<div class="header-main">
						Register
						<div class="loader" v-if="waiting"></div>
					</div>
				</div>
				<div class="form-group">
					<label>Name</label>
					<input type="text" v-model="form.name" class="form-control">
				</div>
				<div class="form-group">
					<label>Email address<span>*</span></label>
					<input type="email" v-model="form.email" class="form-control" required>
					<transition name="fade">
						<div v-if="emailError" class="errors">{{emailError}}</div>
					</transition>
				</div>
				<div class="form-group">
					<label>Password<span>*</span></label>
					<input type="password" v-model="form.password" class="form-control" required>
					<transition name="fade">
						<div v-if="passwordError" class="errors">{{passwordError}}</div>
					</transition>
				</div>
				<hr>
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
        emailError: null,
        passwordError: null,
        waiting: false
			}
    },
    watch: {
      'form.email': function() {
        this.$data.emailError = null;
			},
			'form.password': function() {
        this.$data.passwordError = null;
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
							this.$store.commit('notificationMessage', {
                  title: 'Registration success!',
                  subtitle: 'Please check your inbox',
                  linkto: null
              });
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