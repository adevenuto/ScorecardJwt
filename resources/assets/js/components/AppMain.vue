<template>
	<div id="app-main">
    	<div id="overlay"
    		 @click="toggleSideNav" 
    	     :class="{ 'overlay': sideNavStatus}">
    	</div>
		
		<Header/>
		<Messages/>
		<SideBarNav/>
		<transition name="fade">
			<router-view></router-view>
		</transition>
		<Footer/>
		
    </div>
</template>

<script>
	import Header from './header/Header.vue';
	import Messages from './messages/Messages.vue';
	import Footer from './footer/Footer.vue';
	import SideBarNav from './sidebarnav/SideBarNav.vue';
	import Login from './auth/Login.vue';
	import {checkTokenOnRefresh} from '../helpers/auth';
    export default {
		name: 'app-main',
		components: {Messages, Header, Footer, SideBarNav, Login},
		data() {
			return {
				
			}
		},
		created: function() {
			const user = localStorage.getItem('user');
			if (user) {
				let user = this.$store.getters.currentUser;
				checkTokenOnRefresh(user);
			}
		},
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
	#app-main {
		position: relative;
	}
	#content-main {
		display: flex;
		flex-direction: column;
	}
	#app-main #overlay {
	    position: absolute;
	    width: 100%;
	    height: 100%;
	    background-color: rgba(0,0,0,.30);
	    z-index: 500;
	    display: none;
	    opacity: 0;
	    -webkit-transition: .25s ease-in-out;
	    -webkit-transition: .25s ease-in-out;
	    -moz-transition: .25s ease-in-out;
	    -o-transition: .25s ease-in-out;
	    transition: .25s ease-in-out;;
	}
	#app-main #overlay.overlay {
	    display: block;
	    opacity: 1;
	}
</style>



















