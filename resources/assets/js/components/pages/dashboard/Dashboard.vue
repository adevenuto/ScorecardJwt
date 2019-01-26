<template>
	<div class="container-fluid my-3">
		<div class="row">
			<div class="col-md col-12">
				<div class="my-courses">
					<div class="my-courses-text">
						My Courses
					</div>
					<svg @click="courseFormToggle" class="plus-btn" width="39" height="39" viewBox="0 0 39 39" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M21.327 17.673h7.846a1.827 1.827 0 0 1 0 3.654h-7.846v7.846a1.827 1.827 0 0 1-3.654 0v-7.846H9.827a1.827 1.827 0 0 1 0-3.654h7.846V9.827a1.827 1.827 0 0 1 3.654 0v7.846z" fill="#43454a"/><circle stroke="#43454a" stroke-width="3" cx="19.5" cy="19.5" r="18"/></g></svg>
				</div>
				<div class="divider mb-2"></div>

				<transition name="fade">
				<div v-if="courseForm" class="slide-form">
					<form action="">
						<header v-if="step1">Create A New Golf Course</header>
						<header v-if="step2">Create Holes for {{formData.golfClub.name}}</header>
						<transition name="fade">
							<div v-show="step1" class="step step-1">
								<div class="form-left"> 
									<div class="form-group">
										<label>Name:</label>
										<input v-model="formData.golfClub.name" type="text" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Address:</label>
										<input v-model="formData.golfClub.address" type="text" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Email:</label>
										<input v-model="formData.golfClub.email" type="email" class="form-control" required>
									</div>
									<div class="form-group">
										<label>Phone:</label>
										<input v-model="formData.golfClub.phone" type="text" class="form-control" required>
									</div>
								</div>
								<div class="form-divider"></div>
								<div class="form-right">
									<div class="slider-switch">
										<label for="driving-range"> 
											<div class="text">Driving Range</div>
											<input v-model="formData.golfClub.drivingRange" type="checkbox" id="driving-range">
											<span class="slider-switch-container">
											<span class="slider-switch-toggle"></span>
											</span>
										</label>
									</div>
									<div class="slider-switch">
										<label for="putting-green"> 
											<div class="text">Putting Green</div>
											<input v-model="formData.golfClub.puttingGreen" type="checkbox" id="putting-green">
											<span class="slider-switch-container">
											<span class="slider-switch-toggle"></span>
											</span>
										</label>
									</div>
									<div class="slider-switch">
										<label for="caddie"> 
											<div class="text">Caddie</div>
											<input v-model="formData.golfClub.caddie" type="checkbox" id="caddie">
											<span class="slider-switch-container">
											<span class="slider-switch-toggle"></span>
											</span>
										</label>
									</div>
									<div class="slider-switch">
										<label for="ProShop"> 
											<div class="text">Pro Shop</div>
											<input v-model="formData.golfClub.proShop" type="checkbox" id="ProShop">
											<span class="slider-switch-container">
											<span class="slider-switch-toggle"></span>
											</span>
										</label>
									</div>
								</div>
							</div> <!-- step1 end -->
						</transition>
						<transition name="fade">



						<div v-show="step2" class="step step-2">
							<div class="step2-container">
								<div class="hole-group">
									<div class="header">
										If this golf club is only 9 or 18 holes <strong>Do Not</strong>	fill in this field. However, if this golf club has multiple (individually named) courses on the property, add the name of the course you will be playing (additional courses can be added later).
									</div>
									<div class="form-group">
										<label>Hole Group Name:</label>
										<input v-model="formData.holeGroupName" type="text" class="form-control" required>
									</div>
								</div>
								<div class="hole-count-teebox">
									<div class="hole-count">
										<div>Number of holes</div>
										<label :class="[{'selected': formData.holeCount == '9'},'select-btn']" for="hole-count-9">9</label>
										<input type="radio" class="hide" v-model="formData.holeCount" value="9" name="hole-count" id="hole-count-9">
										<label :class="[{'selected': formData.holeCount == '18'},'select-btn']" for="hole-count-18">18</label>
										<input type="radio" class="hide" v-model="formData.holeCount" value="18" name="hole-count" id="hole-count-18">
									</div>
									<div class="teebox">
										<div>Teebox</div>
										<select class="custom-select" v-model="formData.teeBox">
											<option :value="null">Select a teebox</option>
											<option value="tournament">Tournament</option>
											<option value="back">Back</option>
											<option value="middle">Middle</option>
											<option value="front">Front</option>
										</select>
									</div>
								</div>
								<div class="divider"></div>
							</div>
						</div> <!-- step2 end -->




						</transition>
						<div class="form-nav">
							<template v-if="step1">
								<div @click="courseFormToggle" class="nav-btn btn btn-outline-warning mr-4">Cancel</div>
								<div @click="stepForward" class="nav-btn btn btn-outline-success">Next</div>
							</template>
							<template v-if="step2">
								<div @click="stepBack" class="nav-btn btn btn-outline-secondary mr-4">Back</div>
								<div class="nav-btn btn btn-outline-success">Create Course</div>
							</template>
						</div>
					</form>
				</div>
				</transition>



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
		data() {
			return {
				formData: {
					golfClub: {
						name: null,
						address: null,
						email: null,
						phone: null,
						drivingRange: false,
						puttingGreen: false,
						caddie: false,
						proShop: false,
					},
					teeBox: null,
					holeGroupName: null,
					holeCount: null,
					holes: []
				},
				courseForm: true, 
				step1: false,
				step2: true
			}
		},
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
			courseFormToggle() {
				this.courseForm = !this.courseForm;
			},
			stepForward() {
				this.step1 = false;
				this.step2 = true;
			},
			stepBack() {
				this.step1 = true;
				this.step2 = false;
			}
		}
	}
</script>

<style lang="scss" scoped>
	@import '~@/_global_variables.scss';
	.my-courses {
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
		margin-bottom: 10px;
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
		input, select {
			border: 1px solid #000 !important;
		}
		.form-group {
			margin-bottom: .3rem;
		}
		.step {
			display: flex;
			align-items: center;
			justify-content: space-around;
			padding: 15px;
		}
		.step.step-1 {
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
		.step.step-2 {
			.step2-container {
				.hole-group {
					border: 1px solid #000;
					background: #f3f3f3;
					padding: 10px;
					.header {
						font-size: .71rem;
    					padding-bottom: 5px;
					}
				}
			}
			.hole-count-teebox {
				display: flex;
				justify-content: space-between;
				margin: 10px;
				.hole-count .select-btn {
					padding: calc(.3rem + 2px) 35px;
					border: 1px solid #000;
					margin-bottom: 10px;
					&:hover {
						background: #f9f9f9;
					}
				}
				.hole-count .select-btn.selected {
					background: #0e6f0e;
    				color: #fff;
				}
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
				padding: 10px 22px;
				cursor: pointer;
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
				background: #fff;
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
			.step {
				flex-direction: column;
				align-items: normal;
			}
			.step.step-1 .form-divider {
				margin: 15px 0;
				height: 2px;
				width: 100%;
			}
			.step.step-2 .hole-count-teebox .hole-count .select-btn {
				padding: calc(.3rem + 2px) 27px;
			}
		}
	}
	@media (max-width: 374px) {
		.slide-form { 
			.step.step-2 .hole-count-teebox {
				flex-direction: column;
			}
		}
	}
</style>