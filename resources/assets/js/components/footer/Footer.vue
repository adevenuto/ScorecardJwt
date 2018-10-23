<template>
	<div id="footer-main">
	    <div class="container-fluid">
	        <div class="row">
	            <div class="col-sm-3 text-center">
	                <a href="/"> 
	                    <img src="/img/logo.svg" class="logo" width="70px" alt="logo">
	                </a>
	            </div>
	            <div class="col-sm-3">
	                <h5>Get started</h5>
	                <ul>
	                    <li><a href="/">Home</a></li>
	                    <li><a href="/course/create">Create A Course</a></li>
	                    <li><a href="/courses">Courses</a></li>
	                </ul>
	            </div>
	            <div class="col-sm-3">
	                <h5>About us</h5>
	                <ul>
	                    <li><a href="#">Company Information</a></li>
	                    <li><a href="#">Contact us</a></li>
	                    <li><a href="#">Reviews</a></li>
	                </ul>
	            </div>
	            <div class="col-sm-3">
	                <h5>Support</h5>
	                <ul>
	                    <li><a href="#">FAQ</a></li>
	                    <li><a href="#">Help desk</a></li>
	                    <li><a href="#">Forums</a></li>
	                </ul>
	            </div>
	            <div class="col-sm-12">
	                <div class="social-networks">
	                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
	                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
	                    <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
	                    <button type="button" class="btn contact">Contact us</button>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="footer-copyright">
	        <p>&copy; 2018 Scorecard</p>
	        <p>Built with <i class="fa fa-heart"></i> by <a href="http://anthonydevenuto.com">Anthony DeVenuto</a></p>
	    </div>
	</div>
</template>	

<script>
	export default {
		name: 'app-footer'
	}
</script>

<style scoped>
	/*FOOTER*/
	#footer-main {
	    background-color: #3c3d41;
	    color: white;
	    padding-top: 20px;
	}
	#footer-main .footer-copyright {
        background-color: #333333;
        padding-top: 3px;
        padding-bottom: 3px;
        text-align: center;
    }
	    
    #footer-main .fa-heart {
        color: #f00;
    }
    #footer-main .row {
        margin-bottom: 30px;
    }
    #footer-main .navbar-brand {
        margin-top: 45px;
        height: 65px;
    }
    #footer-main .footer-copyright p {
        margin: 10px;
        color: #ccc;
    }
    #footer-main ul {
        list-style-type: none;
        padding-left: 0;
        line-height: 1.7;
    }
    #footer-main h5 {
        font-size: 23px;
        color: white;
        font-weight: bold;
        margin-top: 30px;
    }
    #footer-main h2 a {
        font-size: 50px;
        text-align: center;
        color: #fff;
    }
    #footer-main a {
        color: #d2d1d1;
        text-decoration: none;
    }
    #footer-main a:hover, #footer-main a:focus {
        text-decoration: none;
        color: white;
    }
	#footer-main .logo {
        margin-top: 41px;
    }
   	#footer-main .social-networks {
        text-align: center;
        padding-top: 30px;
    }
   	#footer-main .social-networks a {
        font-size: 32px;
        color: #f9f9f9;
        padding: 10px;
        transition: 0.2s;
    }
    #footer-main .social-networks a:hover {     
        text-decoration: none;
    }
    #footer-main .social-networks .facebook:hover {
        color: #0077e2;
    }
    #footer-main .social-networks .google:hover {
        color: #ef1a1a;
    }
    #footer-main .social-networks .twitter:hover {
        color: #00aced;
    }
    #footer-main .social-networks .btn {
        color: white;
        background-color: transparent;
        border: 1px solid #fff;
        font-size: 16px;
        border-radius: 20px;
        width: 150px;
        display: block;
        margin: 0 auto;
        margin-top: 10px;
        line-height: 25px;
        transition: 0.2s;     
	}
	#footer-main .social-networks .btn:hover {  
        background-color: rgba(1, 212, 223, 0.98);
	}
	@media screen and (max-width: 767px) {
    	#footer-main {
        	text-align: center;
        }
    }
</style>