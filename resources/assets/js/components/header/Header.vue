<template>
	<div id="header-main">
		<router-link to="/">
			<div id="header-logo">
				<img src="/img/golf-ball.svg" class="logo" width="25px" alt="logo">
				<span class="title">Tee<span class='temp'>Tyme</span></span>
			</div>
		</router-link>
		<div id="hamburger" 
			 @click="toggleSideNav"
			 :class="{ 'open': sideNavStatus}">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'app-header',
		computed: {
			sideNavStatus() {
				return this.$store.getters.sideNavStatus;
			}
		},
		methods: {
			toggleSideNav() {
				this.$store.commit('toggleSideNav');
			}
		}
	}
</script>

<style scoped>
	#header-main {
		position: relative;
		display: flex;
		flex-direction: row;
		align-content: center;
		justify-content: space-between;
		background: #525252;
		padding: 10px 20px;
		color: #fff;
	}
	.temp {
		color: #00ff05;
	}
	#header-main #header-logo {
		display: flex;
		flex-direction: row;
		align-items: center;
	}
	#header-main #header-logo .title {
		font-size: 28px;
		margin-left: 7px;
		color: #fff;
	}
	#hamburger {
	    position: relative;
	    display: flex;
	    flex-direction: column;
	    justify-content: space-around;
	    width: 35px;
	    height: 35px;
		margin-top: 3px;
		cursor: pointer;
    	z-index: 650;    
	}
	#hamburger span {
        display: block;
        position: absolute;
        height: 2px;
        width: 100%;
        background: #fff;
        border-radius: 9px;
        opacity: 1;
        left: 0;
        -webkit-transform: rotate(0deg);
        -moz-transform: rotate(0deg);
        -o-transform: rotate(0deg);
        transform: rotate(0deg);
        -webkit-transition: .22s ease-in-out;
        -moz-transition: .22s ease-in-out;
        -o-transition: .22s ease-in-out;
        transition: .22s ease-in-out;
    }
    /*Hamburger starting position*/
	#hamburger span:nth-child(1) {
	  top: 3px;
	}
	#hamburger span:nth-child(2) {
	  top: 17px;
	}
	#hamburger span:nth-child(3) {
	  top: 31px;
	}
	/* Hamburger animation nav-in */
	#hamburger.open span {
		background: #fff;
	}
	#hamburger.open span:nth-child(1) {
	    top: 17px;
	    -webkit-transform: rotate(135deg);
	    -moz-transform: rotate(135deg);
	    -o-transform: rotate(135deg);
	    transform: rotate(135deg);
	}
	#hamburger.open span:nth-child(2) {
	    opacity: 0;
	    background: #0f0;
	    left: -80px;
	    height: 4px;
	    width: 0;
	}
	#hamburger.open span:nth-child(3) {
	    top: 17px;
	    -webkit-transform: rotate(-135deg);
	    -moz-transform: rotate(-135deg);
	    -o-transform: rotate(-135deg);
	    transform: rotate(-135deg);
	}
</style>