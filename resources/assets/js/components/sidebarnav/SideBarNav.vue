<template>
	<div id="sidebar-container">
		<div id="mySidenav" 
			 :class="[{'navIn': sideNavStatus}, 'sidenav']">
		    <a href="/test" @click="toggleSideNav">About</a>
		    <a href="#" @click="toggleSideNav">Services</a>
		    <a href="#" @click="toggleSideNav">Clients</a>
		    <a href="#" @click="toggleSideNav">Contact</a>
		    <hr>
		    <div class="auth" @click="toggleSideNav">
		    	<template v-if="!currentUser">
		    		<router-link to="/login">Login</router-link>
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
				let router = this.$router;
				return this.$store.commit('logOut', router);
			}
		}
	}
</script>

<style scoped>
	#sidebar-container .sidenav {
	    height: 100%; 
	    width: 0;
	    position: fixed;
	    z-index: 8888;
	    top: 0;
	    right: -1px;
	    background-color: rgba(17, 17, 17, 0.86);
	    overflow-x: hidden;
	    padding-top: 60px;
	    transition: 0.3s;
	}
  	#sidebar-container .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #fff;
        display: block;
        transition: 0.3s
    }
   	#sidebar-container .sidenav hr {
        margin: 5px 32px 5px 32px;
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
	/*Triggered by jQuery*/
	#sidebar-container .sidenav.navIn {
	    width: 240px;
	    border-left: 2px solid #0f0;
	}
</style>












