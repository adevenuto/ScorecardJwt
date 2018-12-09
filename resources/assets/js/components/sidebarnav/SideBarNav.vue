<template>
	<div id="sidebar-container">
		<div id="mySidenav" 
			 :class="[{'navIn': sideNavStatus}, 'sidenav']">
			<div @click="toggleSideNav">
				<router-link to="/courses">Find A Course</router-link>
				<router-link to="#">Services</router-link>
				<router-link to="#">Clients</router-link>
				<router-link to="#">Contact</router-link>
			</div>
		    <hr>
		    <div class="auth" @click="toggleSideNav">
		    	<template v-if="!currentUser">
		    		<router-link to="/login">Login</router-link>
		    		<router-link to="/register">Sign up</router-link>
		    	</template>
		    	<template v-else>
		    		<router-link to="/dashboard">Dashboard</router-link>
		    		<a id="logout" href="#" @click.prevent="logout">Logout</a>
		    	</template>
		        
		    </div>
		</div>
	</div>
</template>

<script>
	import {invalidateAndLogout} from '../../helpers/auth';
	export default {
		name: 'app-sidebar-nav',
		computed: {
			sideNavStatus() {
				return this.$store.getters.sideNavStatus;
			},
			currentUser() {
				return this.$store.getters.currentUser;
			}
		},
		methods: {
			toggleSideNav() {
				return this.$store.commit('toggleSideNav');
			},
			logout() {
				let user = this.$store.getters.currentUser;
				return invalidateAndLogout(user);
			}
		}
	}
</script>

<style scoped>
	#sidebar-container .sidenav {
	    height: 100%; 
	    width: 240px;
	    position: fixed;
	    z-index: 600;
	    top: 0;
	    right: -240px;
	    background-color: rgba(17, 17, 17, 0.86);
	    overflow-x: hidden;
		padding: 60px 25px 0px 25px;
	    transition: 0.3s;
	}
  	#sidebar-container .sidenav a {
        padding: 0;
        text-decoration: none;
        font-size: 22px;
        color: #fff;
        display: block;
        transition: 0.3s
    }
   	#sidebar-container .sidenav hr {
        margin: 5px 0;
        border-color: #4c4c4c;
    }
	#sidebar-container .sidenav .auth a {
	    font-size: 16px;
	    color: #fff;
	    cursor: pointer;
	}
	#sidebar-container .sidenav #logout {
	    color: #f00;
	}

	#sidebar-container .sidenav.navIn {
	    right: 0;
	    border-left: 2px solid #0f0;
	}
	#sidebar-container .sidenav.navIn a {
        padding: 6px 0;
    }
</style>












