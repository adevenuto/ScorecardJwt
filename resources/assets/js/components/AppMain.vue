<template>
	<div>
    	<!-- <router-view></router-view> -->
    	<Header/>
    </div>
</template>

<script>
	import Header from './header/Header.vue';
    export default {
        name: 'app-main',
        components: {Header}
    }
</script>
