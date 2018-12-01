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
					<h3>Reset your password</h3>
					<div class="loader" v-if="waiting"></div>
				</div>
        <div class="form-group">
          <input type="email" v-model="form.email" class="form-control" placeholder="Email Address" required>
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
      resetPasswordEmailSent: false
    };
  },
  methods: {
    sendPasswordResetEmail: function() {
      let credentials = {
        email: this.$data.form.email
      };
      this.waiting = true;
      axios.post(`/api/auth/user/password/reset/request`, credentials)
        .then(res => {
          this.resetPasswordEmailSent = true;
          this.waiting = false;
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>

<style scoped>


</style>