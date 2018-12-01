<template>
	<div class="container">
		<div class="col-sm-12 col-lg-6 mx-auto pt-3">
			<form class="form-global" @submit.prevent="authenticate">
				<transition name="fade">
					<div v-if="emailNotVerified" class="validate-email-message">
						<div class="status-message" v-if="verificationEmailSent">
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
				<div class="reset-password-link">
					<span>Forget your Password? </span> <router-link to="/user/password/reset/request">Password reset</router-link>
				</div>
				<button class="btn btn-block">Login</button>
				<template v-if="authError">
					<p class="errors">{{authError}}</p>
				</template>
			</form>
		</div>
	</div>
</template>

<script>
  export default {
    name: "Login",
    data() {
      return {
        form: {
          name: "",
          email: "",
          password: ""
        },
        waiting: false,
        emailNotVerified: false,
        verificationEmailSent: false
      };
    },
    watch: {
      "form.email": function() {
        this.$store.commit("loginFailed", "");
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
        return axios
          .post("/api/auth/login", credentials)
          .then(payload => {
            let error = payload.data.error;
            if (!error) {
              this.$data.waiting = false;
              this.$data.emailNotVerified = false;
              this.$store.commit("loginSuccess", payload);
              this.$router.push({ path: "/dashboard" });
            } else {
              this.$data.waiting = false;
              let emailNotVerified = error.emailNotVerified;
              let authError = error.authError;
              if (emailNotVerified) {
                this.$data.emailNotVerified = true;
              }
              if (authError) {
                this.$data.emailNotVerified = false;
                this.$store.commit("loginFailed", authError);
              }
            }
          })
          .catch(err => {
            console.log(err);
            this.$data.waiting = false;
          });
      },
      sendVerificationEmail() {
        const that = this;
        let payload = this.$data.form;
        return axios
          .post("/api/auth/user/send/activation/email", payload)
          .then(payload => {
            this.$data.verificationEmailSent = true;
          })
          .catch(err => {
            console.log(err);
          });
      }
    }
  };
</script>

<style lang="scss" scoped>
  .validate-email-message {
    font-size: 14px;
    margin-bottom: 15px;
    color: #d21717;
    a {
      color: #2fa5ff;
      text-decoration: underline;
      &:hover {
        color: #006fd4;
      }
    }
  }
  .reset-password-link {
    margin-top: -10px;
    margin-bottom: 25px;
    a {
      color: #2fa5ff;
      text-decoration: underline;
      &:hover {
        color: #006fd4;
      }
    }
  } 
</style>