<template>
	<div class="container-fluid my-3">
		<div class="row">
			<div class="col-md col-12">
				<div class="my-courses-section">
					<div class="my-courses-text">
						My Courses
					</div>
					
					<svg class="plus-btn" width="39" height="39" viewBox="0 0 39 39" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M21.327 17.673h7.846a1.827 1.827 0 0 1 0 3.654h-7.846v7.846a1.827 1.827 0 0 1-3.654 0v-7.846H9.827a1.827 1.827 0 0 1 0-3.654h7.846V9.827a1.827 1.827 0 0 1 3.654 0v7.846z" fill="#43454a"/><circle stroke="#43454a" stroke-width="3" cx="19.5" cy="19.5" r="18"/></g></svg>
				</div>
				<div class="divider"></div>


				<div class="slide-form">
					<form action="">
						<header>Create A New Course</header>
						<div class="step-1">
							<div class="form-left"> 
								<div class="form-group">
									<label>Name:</label>
									<input type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Address:</label>
									<input type="text" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Email:</label>
									<input type="email" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Phone:</label>
									<input type="text" class="form-control" required>
								</div>
							</div>
							<div class="form-divider"></div>
							<div class="form-right">
								<div class="slider-switch">
									<label for="driving-range"> 
										<div class="text">Driving Range</div>
										<input type="checkbox" id="driving-range">
										<span class="slider-switch-container">
										<span class="slider-switch-toggle"></span>
										</span>
									</label>
								</div>
								<div class="slider-switch">
									<label for="putting-green"> 
										<div class="text">Putting Green</div>
										<input type="checkbox" id="putting-green">
										<span class="slider-switch-container">
										<span class="slider-switch-toggle"></span>
										</span>
									</label>
								</div>
								<div class="slider-switch">
									<label for="caddie"> 
										<div class="text">Caddie</div>
										<input type="checkbox" id="caddie">
										<span class="slider-switch-container">
										<span class="slider-switch-toggle"></span>
										</span>
									</label>
								</div>
								<div class="slider-switch">
									<label for="ProShop"> 
										<div class="text">Pro Shop</div>
										<input type="checkbox" id="ProShop">
										<span class="slider-switch-container">
										<span class="slider-switch-toggle"></span>
										</span>
									</label>
								</div>
							</div>
						</div> <!-- step-1 end -->


						<div class="form-nav">
							<div class="nav-btn btn btn-outline-secondary mr-4">Cancel</div>
							<div class="nav-btn btn btn-outline-success">Next</div>
						</div>
					</form>
				</div>



			</div>
			<div class="col-md col-12 sidebar">
				<div class="profile-section">
					<h4>User Profile Section</h4>
					<img src="https://gaboosters.org/wp-content/uploads/2018/03/1585481.jpg" width="75" alt="">
				</div>
			</div>
		</div>
		
		<!-- <div class="col-md-12">
			<h1 style="text-transform: capitalize;">{{currentUser.name}}'s Dashboard</h1>
			<div>
				<div v-for="course in currentUserCourses" :key="course.id">
					<h3 style="margin: 0;">{{course.name}}</h3>
					<i>{{course.holes}}</i><br>
					<i>{{course.email}}</i>
					<hr>
				</div>
			</div>
		</div> -->
	</div>
</template>

<script>
	export default {
		name: 'Dashboard',
		computed: {
			currentUser() {
				return this.$store.getters.currentUser;
			},
			currentUserCourses() {
				return this.$store.getters.currentUserCourses;
			}
		},
		created: function() {
			let currentUser = this.currentUser;
			if(currentUser) this.$store.dispatch('fetchUserCourses', currentUser);
		}, 
		methods: {
			
		}
	}
</script>

<style lang="scss" scoped>
	@import '~@/_global_variables.scss';
	.my-courses-section {
		display: flex;
		align-items: center;
		justify-content: space-between;
		margin-bottom: 5px;
		.my-courses-text {
			font-size: 1.5rem;
		}
		.plus-btn {
			width: 30px;
			height: 30px;
			cursor: pointer;
		}
	}
	.profile-section {
		display: flex;
		align-items: center;
		flex-direction: column;
		justify-content: center;
		border: 1px solid #000;
		border-radius: $g-container-radius;
		min-height: 600px;
	}




















	.slide-form {
		border: 1px solid #000;
		margin: 10px 0;
		border-radius: $g-container-radius;
		header {
			font-size: 1.6rem;
			text-align: center;
			background: #096506;
			color: #fff;
		}
		label {
			margin: 0;
			font-size: .9rem;
			font-weight: bold;
		}
		input {
			border: 1px solid #000 !important;
		}
		.form-group {
			margin-bottom: .3rem;
		}
		.step-1 {
			display: flex;
			align-items: center;
			justify-content: space-around;
			padding: 15px;
			.form-left {
				min-width: 250px;
			}
			.form-divider {
				height: 240px;
				width: 2px;
				background: #dadada;
			}
			.form-right {
				min-width: 250px;
			}
		}

		.form-nav {
			display: flex;
			align-items: center;
			justify-content: center;
			padding: 15px;
			background: #fff;
			.nav-btn {
				border-radius: $g-btn-radius;
				padding: 10px 30px;
			}
		}
	}
	.slider-switch {
		margin-bottom: 15px;
		input {
			visibility: hidden;
		}
		label {
			display: flex;
			align-items: center;
		}
		.text {
			min-width: 50%;
		}
		.slider-switch-container {
			position: relative;
			height: 18px;
			width: 40px;
			border-radius: 12px;
			background: #D8D8D8;
			box-shadow: inset 0px 0px 4px 0px #999;
			.slider-switch-toggle {
			position: absolute;
			left: -1px;
			top: -1px;
			height: 20px;
			width: 20px;
			border-radius: 50%;
			background: #a2a2a2;
    		border: 2px solid #a2a2a2;
			transition: 250ms;
			}
		}
		input:checked + .slider-switch-container .slider-switch-toggle {
			left: 21px !important;
			background: #ffffff;
    		border: 2px solid #64a345;
			&:after {
				background-image: url('/img/check.svg');
				position: absolute;
				content: '';
				width: 10px;
				height: 8px;
				left: 3px;
				top: 4px;
				background-size: cover;
				background-repeat: no-repeat;
			}
		}
	}




















	@media (min-width: 768px) {
		.sidebar {
			max-width: 450px;
		}
		.container-fluid {
			max-width: 1400px;
		}
	}
	@media (max-width: 1100px) {
		.slide-form { 
			.step-1 {
				flex-direction: column;
				align-items: normal;
				.form-divider {
					margin: 15px 0;
					height: 2px;
					width: 100%;
				}
			}
		}
	}
</style>