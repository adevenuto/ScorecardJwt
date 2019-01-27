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
          <div class="header-main">
            Login
					  <div class="loader" v-if="waiting"></div>
          </div>
          <div class="divider"></div>
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
				<div class="reset-password-link">
					<span>Forget your Password? </span> <router-link to="/user/password/reset/request">password reset</router-link>
				</div>
        <transition name="fade">
          <div v-if="authError" class="errors">{{authError}}</div>
        </transition>
				<button class="btn btn-block">Login</button>
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
        emailError: null,
        passwordError: null,
        emailNotVerified: false,
        authError: null,
        verificationEmailSent: false
      };
    },
    watch: {
      "form.email": function() {
        if (this.emailError) this.emailError = null;
        if (this.authError) this.authError = null;
      },
      "form.password": function() {
        if (this.passwordError) this.passwordError = null;
        if (this.authError) this.authError = null;
      }
    },
    methods: {
      authenticate() {
        let credentials = this.$data.form;
        this.$data.waiting = true;
        return axios
          .post("/api/auth/login", credentials)
          .then(payload => {
            this.$data.waiting = false;
            let errors = payload.data.error;
            if (!errors) {
              this.$data.waiting = false;
              this.$store.commit("loginSuccess", payload);
              this.$router.push({ path: "/dashboard" });
            
              this.$store.commit('notificationMessage', {
                  type: 'success',
                  title: 'Welcome back!',
                  subtitle: null,
                  linkto: null,
                  timeout: 4000
              });
            
            } else {
              let emailError = errors.email;
              let passwordError = errors.password;
              let emailNotVerified = errors.emailNotVerified;
              let authError = errors.authError;
              if (emailError) this.emailError = emailError[0];
              if (passwordError) this.passwordError = passwordError[0];
              if (emailNotVerified) this.emailNotVerified = emailNotVerified;
              if (authError) this.authError = authError; 
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
      margin-top: -8px;
      font-size: 0.9rem;
    a {
      color: #2fa5ff;
      text-decoration: underline;
      &:hover {
        color: #006fd4;
      }
    }
  } 
</style>