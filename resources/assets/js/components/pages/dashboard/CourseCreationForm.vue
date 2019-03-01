<template>
    <form class="slide-form" action="">
		<header v-if="step1">Create A New Golf Course</header>
		<header v-if="step2">Create Holes for {{form.name}}</header>
        <transition name="fade">
            <div v-show="step1" class="step step-1">
                <div class="form-left"> 
                    <div class="form-group">
                        <label>Name:</label>
                        <input v-model="form.name" 
								v-validate="'required'"
								data-vv-as="name"
								data-vv-scope="coursecreate_s1"
								name="course_name"
								type="text" 
								:class="[{error: errors.has('coursecreate_s1.course_name')},'letter_space-only', 'form-control']">
                    </div>
                    <div class="form-group">
                        <label>Address:</label>
                        <input id="autocomplete"
								placeholder=""
								
								

								name="course_address"
								type="text" 
								:class="[{error: errors.has('coursecreate_s1.course_address')}, 'form-control']">
								<input id="course_address" type="text" class="hide" name="course_address" 
								v-model="form.address">
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input v-model="form.email" 
								v-validate="'required|email'"
								data-vv-as="email"
								data-vv-scope="coursecreate_s1"
								name="course_email"
								type="email" 
								:class="[{error: errors.has('coursecreate_s1.course_email')}, 'form-control']">
                    </div>
                    <div class="form-group">
                        <label>Phone:</label>
                        <input v-model="form.phone_number" 
								type="text" 
								v-validate="'required|min:14'"
								maxlength="14"
								data-vv-as="phone"
								data-vv-scope="coursecreate_s1"
								name="course_phone"
								:class="[{error: errors.has('coursecreate_s1.course_phone')}, 'form-control num-only']">
                    </div>
					<div id="hidden-course-form-fields">
						<!-- Address Components From Google Autocomplete -->
						<input type="text" class="hide coordinate" id="lat" v-model="form.lat">
						<input type="text" class="hide coordinate" id="lng" v-model="form.lng">
						<input type="text" class="hide" id="street_number" v-model="form.street_number">
						<input type="text" class="hide" id="route" v-model="form.route">
						<input type="text" class="hide" id="locality" v-model="form.city">
						<input type="text" class="hide" id="administrative_area_level_1" v-model="form.state">
						<input type="text" class="hide" id="postal_code" v-model="form.postal_code">
						<input type="text" class="hide" id="country" v-model="form.country">
					</div>
                </div>
                <div class="form-divider"></div>
                <div class="form-right">
                    <div class="slider-switch">
                        <label for="driving-range"> 
                            <div class="text">Driving Range</div>
                            <input v-model="form.driving_range" type="checkbox" id="driving-range">
                            <span class="slider-switch-container">
                            <span class="slider-switch-toggle"></span>
                            </span>
                        </label>
                    </div>
                    <div class="slider-switch">
                        <label for="putting-green"> 
                            <div class="text">Putting Green</div>
                            <input v-model="form.putting_green" type="checkbox" id="putting-green">
                            <span class="slider-switch-container">
                            <span class="slider-switch-toggle"></span>
                            </span>
                        </label>
                    </div>
                    <div class="slider-switch">
                        <label for="caddie"> 
                            <div class="text">Caddie</div>
                            <input v-model="form.caddie" type="checkbox" id="caddie">
                            <span class="slider-switch-container">
                            <span class="slider-switch-toggle"></span>
                            </span>
                        </label>
                    </div>
                    <div class="slider-switch">
                        <label for="ProShop"> 
                            <div class="text">Pro Shop</div>
                            <input v-model="form.pro_shop" type="checkbox" id="ProShop">
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
                            <input v-model="form.holeGroupName" 
									name="name"
									type="text" 
									class="form-control">
                        </div>
                    </div>
                    <div class="hole-count-teebox">
                        <div class="hole-count">
                            <div>Number of holes</div>
                            <label :class="[
									{'selected': form.holeCount == '9'},
									{'error': errors.has('coursecreate_s2.hole-count')},'select-btn']" 
                                    for="hole-count-9">9
                            </label>
                            <input type="radio" 
									class="hide" 
									v-model="form.holeCount" 
									:value="9" 
									name="hole-count"
									v-validate="'required'"
									data-vv-scope="coursecreate_s2" 
									id="hole-count-9">
                            <label :class="[
									{'selected': form.holeCount == '18'},
									{'error': errors.has('coursecreate_s2.hole-count')},'select-btn']" 
                                    for="hole-count-18">18
                            </label>
                            <input type="radio" 
									class="hide" 
									v-model="form.holeCount" 
									:value="18" 
									name="hole-count"
									v-validate="'required'"
									data-vv-scope="coursecreate_s2" 
									id="hole-count-18">
                        </div>
                        <div class="teebox">
                            <div>Teebox</div>
                            <select :class="[{'error': errors.has('coursecreate_s2.tee-box')}, 'custom-select']" 
									name="tee-box"
									v-model="form.teeBox"
									v-validate="'required'"
									data-vv-scope="coursecreate_s2">
                                <option disabled :value="null">Select a teebox</option>
                                <option value="tournament">Tournament</option>
                                <option value="back">Back</option>
                                <option value="middle">Middle</option>
                                <option value="front">Front</option>
                            </select>
                        </div>
                    </div>
                    <div class="rendered-holes">
                        <div v-for="index in form.holeCount" :key="index" class="holes">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon" id="sizing-addon1">{{index}}</span>
                                <input type="text" 
                                    :class="[{'error': errors.has('coursecreate_s2.'+currentHole(index))},'form-control', 'hole', 'num-only']"
									v-validate="'required'"
									data-vv-scope="coursecreate_s2" 
									:name="currentHole(index)"
                                    placeholder="Length" 
                                    maxlength="3"
                                    aria-describedby="sizing-addon1">
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- step2 end -->
        </transition>

        <div class="form-nav">
            <template v-if="step1">
                <div @click="courseFormToggle" class="nav-btn btn btn-sm btn-outline-secondary mr-4">Cancel</div>
                <div @click="stepForward" class="nav-btn btn btn-success">Next</div>
            </template>
            <template v-if="step2">
                <div @click="stepBack" class="nav-btn btn btn-sm btn-outline-secondary mr-4">Back</div>
                <div @click="createHoles" class="nav-btn btn btn-success">Create Course</div>
            </template>
        </div>
    </form>
</template>

<script>
	export default {
		name: 'CourseCreationForm',
		data() {
			return {
				form: {
					// Club Info
					name: 'Hillside',
					address: '3218 N Milwaukee Ave, Chicago, IL 60618, USA',
					email: 'das@fds.com',
					phone_number: '(231) 323-1232',
					driving_range: false,
					putting_green: false,
					caddie: false,
					pro_shop: false,
					teeBox: 'back',
					holeGroupName: 'West',
					holeCount: 9,
					holes: [],
					// Address components
					lat: '41.939392',
					lng: '-87.72491100000002',
					street_number: '3218',
					route: 'North Milwaukee Avenue',
					city: 'Chicago',
					state: 'IL',
					postal_code: '60618',
					country: 'United States',
				},
				step1: true,
				step2: false
			}
		},
		watch: {
			'form.phone_number': function(val) {
				let x = val.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
	    		this.form.phone_number = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
			}
		},
		methods: {
			courseFormToggle() {
				this.$emit('cancel');
			},
			stepForward() {
				this.$validator.validateAll('coursecreate_s1').then((result) => {
					if (result) {
						this.step1 = false;
						this.step2 = true;
					}
				});
			},
			stepBack() {
				this.step1 = true;
				this.step2 = false;
			},
			createHoles() {
				const that = this;
				this.$validator.validateAll('coursecreate_s2').then((result) => {
					if (result) {
						this.form.holes = [];
						let holesList = document.querySelectorAll('.hole');
						for (var i = 0; i < holesList.length; ++i) {
							let holeNum = i + 1;
							let holeLength = holesList[i].value;
							that.$set(this.form.holes, i, {hole: holeNum, length: holeLength});
						}
						this.sendCourseData();
					}
				});
			},
			sendCourseData() {
				const credentials = this.form;
				axios.post('api/user/course/create', credentials)
				.then(payload => {

				})
				.catch( err => {

				})
			},
			currentHole(index) {
				return 'hole-'+index;
			}
		}
	}
</script>

<style lang="scss" scoped>
	@import '~@/_global_variables.scss';

	.slide-form {
		border: 1px solid #ddd;
		margin-bottom: 10px;
		border-radius: $g-container-radius;
		background: #fff;
		overflow: hidden;
		header {
			font-size: 1.6rem;
			text-align: center;
			background: #498600;
			color: #fff;
		}
		label {
			margin: 0;
			font-size: .9rem;
			font-weight: bold;
		}
		input, select {
			border: 1px solid #c1c1c1 !important;
		}
		input.error, select.error, label.error {
			border: 1px solid #fb0000 !important;
		}
		.form-group {
			margin-bottom: .3rem;
		}
		.form-control {
			padding: 0.35rem 0.75rem;
		}
		.step {
			display: flex;
			align-items: center;
			justify-content: space-around;
			padding: 10px 15px;
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
					border: 1px solid #c1c1c1;
					background: #f3f3f3;
					border-radius: $g-container-radius;
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
				margin: 10px 0;
			}
			.hole-count .select-btn {
				padding: calc(.3rem + 2px) 35px;
				border: 1px solid #c1c1c1;
				border-radius: $g-btn-radius;
				margin-bottom: 10px;
				cursor: pointer;
				&:hover {
					transition: 250ms;
					background: #f9f9f9;
				}
			}
			.hole-count .select-btn.selected {
				background: #529100;
				color: #fff;
			}
			.rendered-holes {
				display: block;
				width: 100%;
				.holes {
					width: 31.33%;
					margin: 10px 1% 0 1%;
					float: left;
					transition: 250ms;
				}
				.input-group-addon {
					color: #fff;
					min-width: 30px;
					background-color: #529100;
					border: 1px solid #c1c1c1;
					margin-right: 1px;
    				border-radius: $g-btn-radius;
				}
			}
		}
		.form-nav {
			display: flex;
			align-items: center;
			justify-content: center;
			padding: 15px;
			background: #fff;
			border-top: 1px solid #dedede;
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
			height: 15px;
			width: 30px;
			border-radius: 12px;
			background: #ffffff;
			-webkit-box-shadow: inset 0px 0px 4px 0px #999;
			box-shadow: inset 0px 0px 4px 0px #999;
			.slider-switch-toggle {
				position: absolute;
				height: 15px;
				width: 15px;
				left: 0;
				border-radius: 50%;
				background: #fff;
				border: 2px solid #a2a2a2;
				transition: 200ms;
			}
		}
		input:checked + .slider-switch-container .slider-switch-toggle {
			left: 15px !important;
			background: #ffffff;
    		border: 2px solid #64a345;
			&:after {
				position: absolute;
				transform: rotate(-45deg);
				transition: all 100ms;
				content: '';
				width: 7px;
				height: 4px;
				left: 2px;
				top: 3px;
				border-bottom: 2px solid #70ad4f;
				border-left: 2px solid #70ad4f;
				background-size: contain;
				background-repeat: no-repeat;
			}
		}
	}
	@media (min-width: 1024px) {
		.slide-form .step.step-2 .rendered-holes .holes {
			width: 18%;
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
		.slide-form .step.step-2 .rendered-holes .holes {
			width: 48%;
		}	
	}
</style>


// v-validate="'required'"
// 								data-vv-as="address"
// 								data-vv-scope="coursecreate_s1"