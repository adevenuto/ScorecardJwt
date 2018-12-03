<template>
<div class="container">
	<div class="col-sm-8 mx-auto">
		<div class="success-message">
			<img class="golf-bag-svg" src="/img/golf-sticks-in-bag.svg" width="200" alt="golfclubs img">
			<div class="message-right">
				<h1>{{successMessage}}</h1>
				<hr class="m0" style="border-color: #0f0;">
				<p>An activation link has been sent to your inbox. Use that link to activate your account.</p>
			</div>
		</div>
	</div>
</div>
</template>

<script>
	export default {
		name: 'RegistrationSuccess',
		data() {
			return {
				successMessage: 'Success'
			}
    	}
	}
</script>

<style scoped>
	.success-message {
		display: flex;
		flex-direction: row;
		align-items: center;
		justify-content: center;
		min-height: 500px;
	}
	.success-message .golf-bag-svg {
		position: relative;
		opacity: 0;
		top: -145px;
		animation-name: dropIn;
		animation-duration: .75s; 
		animation-timing-function: ease-in-out; 
		animation-fill-mode: forwards;
		animation-delay: .4s;
	}
	.message-right h1 {
		font-size: 4rem;
		font-weight: 600;
	}
	.message-right p {
		font-size: 1.25rem;
		line-height: 1.4rem;
		font-weight: 600;
		margin-top: 20px;
		text-align: left;
	}

	@media only screen and (max-width: 767px) {
      .success-message .golf-bag-svg {
        display: none;
      }
	}
	
	@keyframes dropIn {
	0% {
		opacity: 0;
		top: -145px;
	}
	50% {
		opacity: .5;
			top: 50px;
	}
	100% {
		opacity: 1;
			top: 0;
	}
}
</style>		