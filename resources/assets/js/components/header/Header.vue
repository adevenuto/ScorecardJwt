<template>
	<div id="header-main">
		<router-link to="/">
			<div id="header-logo">
				<img src="/img/logo.svg" class="logo" width="29px" alt="logo">
				<span class="title">SCOR</span>
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
		display: flex;
		flex-direction: row;
		align-content: center;
		justify-content: space-between;
		background: #3c3d41;
		padding: 10px 20px;
		color: #fff;
	}
	#header-main #header-logo {
		display: flex;
		flex-direction: row;
		align-items: center;
	}
	#header-main #header-logo .title {
		font-size: 24px;
		margin-left: 5px;
	}
	#hamburger {
	    position: relative;
	    display: flex;
	    flex-direction: column;
	    justify-content: space-around;
	    width: 40px;
	    height: 40px;
    	z-index: 9999;    
	}
	#hamburger span {
        display: block;
        position: absolute;
        height: 4px;
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