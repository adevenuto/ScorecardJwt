<template>
	<div id="app-main">
    	<div id="overlay"
    		 @click="toggleSideNav" 
    	     :class="{ 'overlay': sideNavStatus}"></div>
    	<Header/>
		<SideBarNav/>
    	<div class="container">
    		<router-view></router-view>
    	</div>
    	
    	<Footer/>
    </div>
</template>

<script>
	import Header from './header/Header.vue';
	import Footer from './footer/Footer.vue';
	import SideBarNav from './sidebarnav/SideBarNav.vue';
	import Login from './auth/Login.vue';
    export default {
        name: 'app-main',
        components: {Header, Footer, SideBarNav, Login},
        computed: {
        	sideNavStatus() {
				return this.$store.getters.sideNavStatus;
			},
        	welcome() {
        		return this.$store.getters.welcome;
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
	#app-main {
		position: relative;
	}
	#app-main #overlay {
	    position: absolute;
	    width: 100%;
	    height: 100%;
	    background-color: rgba(0,0,0,.30);
	    z-index: 8888;
	    display: none;
	    opacity: 0;
	    -webkit-transition: .25s ease-in-out;
	    -webkit-transition: .25s ease-in-out;
	    -moz-transition: .25s ease-in-out;
	    -o-transition: .25s ease-in-out;
	    transition: .25s ease-in-out;nsition: .25s ease-in-out;
	}

	/*Triggered by jQuery*/
	#app-main #overlay.overlay {
	    display: block;
	    opacity: 1;
	}
</style>



















