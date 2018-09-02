<template>
	<div>
    	<!-- <router-view></router-view> -->
    	<Header/>
    	<Footer/>
    </div>
</template>

<script>
	import Header from './header/Header.vue';
	import Footer from './footer/Footer.vue';
    export default {
        name: 'app-main',
        components: {Header, Footer}
    }
</script>
