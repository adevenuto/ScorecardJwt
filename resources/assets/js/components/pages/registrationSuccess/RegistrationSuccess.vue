<template>
	<div class="col-sm-6 col-sm-offset-3">
		<div class="success-message">
			<h1>{{successMessage}}</h1>
			<img src="/img/golf-sticks-in-bag.svg" width="160" alt="golfclubs img">
			<p>Congratulations, all thats left is validating your email address. Please check your inbox, we've sent a link to activate your account.</p>
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
		flex-direction: column;
		align-items: center;
		justify-content: center;
		min-height: 500px;
	}
	.success-message h1 {
		font-size: 4rem;
		font-weight: 600;
	}
	.success-message p {
		font-size: 1.25rem;
		font-weight: 600;
		margin-top: 20px;
	}
</style>