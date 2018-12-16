<template>
    <div class="not-found">
		<img src="/img/out-of-bounds.svg" alt="hazard sign">
        <h1>404</h1>
		<h4>Page Not Found</h4>
    </div>
</template>

<script>
	export default {
		name: 'NotFound',
		data() {
			return {
				
			}
    	}
	}
</script>

<style lang="scss" scoped>
	.not-found {
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		height: 500px;
		h1 {
			font-size: 3.5rem;
    		font-weight: 600;
		}
		h4 {
			margin-top: -15px;
			font-size: 1rem;
			color: #83868c;
		}
		img {
			max-width: 200px;
		}
	}
</style>		