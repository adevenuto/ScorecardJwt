<template>
	<div id="sidebar-container">
		<div id="mySidenav" class="sidenav">
		    <a href="/test">About</a>
		    <a href="#">Services</a>
		    <a href="#">Clients</a>
		    <a href="#">Contact</a>
		    <hr>
		    <!-- <div class="auth">
		        @if (Auth::guest())
		            <a href="{{ route('login') }}">Login</a>
		            <a href="{{ route('register') }}">Register</a>
		        @else
		        <a id="logout" href="{{ route('logout') }}"
		            onclick="event.preventDefault();
		                     document.getElementById('logout-form').submit();">
		            Logout
		        </a>
		        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		            {{ csrf_field() }}
		        </form>
		        @endif
		    </div> -->
		</div>
	</div>
</template>

<script>
	export default {
		name: 'app-sidebar-nav'
	}
</script>

<style scoped>
	#sidebar-container .sidenav {
	    height: 100%; 
	    width: 0;
	    position: fixed;
	    z-index: 9999;
	    top: 0;
	    left: 0;
	    background-color: #111;
	    overflow-x: hidden;
	    padding-top: 60px;
	    transition: 0.5s;
	}
  	#sidebar-container .sidenav  a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #a0a0a0;
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
	}
	#sidebar-container .sidenav #logout {
	    color: #f00;
	}
	/*Triggered by jQuery*/
	#sidebar-container .sidenav.navIn {
	    width: 250px;
	}
</style>












