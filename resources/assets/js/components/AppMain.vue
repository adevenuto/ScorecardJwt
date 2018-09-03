<template>
	<div id="app-main">
    	<!-- <router-view></router-view> -->
    	<div id="overlay"></div>
    	<Header/>
		<SideBarNav/>
    	<div class="container">
    		<h1>Temp Text to take up space</h1> 

	    	<p>qui nostrum tempora deserunt a! Consequatur adipisci tempora itaque inventore quae laudantium dignissimos vel, assumenda mollitia explicabo fugiat, laborum, est vero cumque voluptates incidunt quo!</p> 

	    	<p>Perspiciatis laborum doloremque, nulla placeat. Ducimus fuga architecto reprehenderit fugiat ab, provident minus explicabo hic eius saepe animi, esse rem aliquid quasi mollitia cupiditate quis tempora facere.</p> 

			<p>Assumenda temporibus, molestias quisquam perspiciatis at iure obcaecati qui, cupiditate nobis, praesentium nostrum ullam architecto, eligendi minus eveniet sint.</p>

			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam eveniet nobis fuga, rem officiis amet, provident, corrupti iste atque possimus minus nulla alias neque repellendus esse eius soluta voluptatibus</p> 

	    	<p>qui nostrum tempora deserunt a! Consequatur adipisci tempora itaque inventore quae laudantium dignissimos vel, assumenda mollitia explicabo fugiat, laborum, est vero cumque voluptates incidunt quo!</p> 

	    	<p>Perspiciatis laborum doloremque, nulla placeat. Ducimus fuga architecto reprehenderit fugiat ab, provident minus explicabo hic eius saepe animi, esse rem aliquid quasi mollitia cupiditate quis tempora facere.</p> 

			<p>Assumenda temporibus, molestias quisquam perspiciatis at iure obcaecati qui, cupiditate nobis, praesentium nostrum ullam architecto, eligendi minus eveniet sint.</p>
    	</div>
    	
    	<Footer/>
    </div>
</template>

<script>
	import Header from './header/Header.vue';
	import Footer from './footer/Footer.vue';
	import SideBarNav from './sidebarnav/SideBarNav.vue';
    export default {
        name: 'app-main',
        components: {Header, Footer, SideBarNav}
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
	    background-color: rgba(0,0,0,.20);
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



















