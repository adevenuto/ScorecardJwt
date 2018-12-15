<template>
  <div class="container">
    <div class="col-sm-12 col-lg-6 mx-auto pt-3">
      <form class="form-global" @submit.prevent="sendPasswordResetEmail">
        <transition name="fade">
          <div class="status-message" v-if="resetPasswordEmailSent">
            <i class="fa fa-check"></i>
            Password reset link sent to inbox
          </div>
        </transition>
        <div class="form-head">
          <div class="header-main">
            Reset your password
					  <div class="loader" v-if="waiting"></div>
          </div>
          <div class="header-sub">
            Enter your email address and an email will be sent to your inbox.
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
        <button class="btn btn-block">Send Reset Link</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "ResetPasswordRequest",
  data() {
    return {
      form: {
        email: ""
      },
      waiting: false,
      emailError: null,
      resetPasswordEmailSent: false
    };
  },
  watch: {
    "form.email": function() {
      if (this.emailError) this.emailError = null;
    }
  },
  methods: {
    sendPasswordResetEmail: function() {
      let credentials = {
        email: this.$data.form.email
      };
      this.waiting = true;
      axios.post(`/api/auth/user/password/reset/request`, credentials)
        .then(payload => {
          this.$data.waiting = false;
          let errors = payload.data.error;
          if (!errors) {
            this.waiting = false;
            this.$store.commit('notificationMessage', {
                type: 'success',
                title: 'Password reset link sent to mailbox',
                subtitle: null,
                linkto: null
            });
          } else {
            let emailError = errors.email;
            if (emailError) this.emailError = emailError[0];
          }
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>

<style scoped>
    @media only screen and (max-width: 340px) {
      form.form-global .header-main {
        font-size: 1.3rem;
      }
    }
</style>