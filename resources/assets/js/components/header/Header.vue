<template>
	<div id="header-main">
		<div id="header-logo">
			<p>Brand</p>
		</div>
		<div id="hamburger">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</template>
<script>
	export default {
		name: 'app-header'
	}
</script>

<style scoped>
	#header-main {
		display: flex;
		flex-direction: row;
		align-content: center;
		justify-content: space-between;
		background: #444;
		padding: 10px 15px;
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
        -webkit-transition: .25s ease-in-out;
        -moz-transition: .25s ease-in-out;
        -o-transition: .25s ease-in-out;
        transition: .25s ease-in-out;
    }
    /* Hamburger starting position */
	#hamburger span:nth-child(1) {
	  top: 0px;
	}
	#hamburger span:nth-child(2) {
	  top: 14px;
	}
	#hamburger span:nth-child(3) {
	  top: 28px;
	}
	/* Hamburger animation nav-in */
	#hamburger.open span:nth-child(1) {
	    top: 18px;
	    -webkit-transform: rotate(135deg);
	    -moz-transform: rotate(135deg);
	    -o-transform: rotate(135deg);
	    transform: rotate(135deg);
	}
	#hamburger.open span:nth-child(2) {
	    opacity: 0;
	    left: -60px;
	}
	#hamburger.open span:nth-child(3) {
	    top: 18px;
	    -webkit-transform: rotate(-135deg);
	    -moz-transform: rotate(-135deg);
	    -o-transform: rotate(-135deg);
	    transform: rotate(-135deg);
	}
</style>