<template>
    <form class="slide-form" action="">
		<header v-if="step1">Create A New Golf Course</header>
		<header v-if="step2">Create Holes for {{formData.golfClub.name}}</header>
        <transition name="fade">
            <div v-show="step1" class="step step-1">
                <div class="form-left"> 
                    <div class="form-group">
                        <label>Name:</label>
                        <input v-model="formData.golfClub.name" 
								v-validate="'required'"
								data-vv-as="name"
								data-vv-scope="coursecreate_s1"
								name="course_name"
								type="text" 
								:class="[{error: errors.has('coursecreate_s1.course_name')},'letter_space-only', 'form-control']">
						<!-- <div class="errors" v-show="errors.has('coursecreate_s1.course_name')">
							{{errors.first('coursecreate_s1.course_name')}}
						</div> -->
                    </div>
                    <div class="form-group">
                        <label>Address:</label>
                        <input v-model="formData.golfClub.address" 
								v-validate="'required'"
								data-vv-as="address"
								data-vv-scope="coursecreate_s1"
								name="course_address"
								type="text" 
								:class="[{error: errors.has('coursecreate_s1.course_address')}, 'form-control']">
						<!-- <div class="errors" v-show="errors.has('coursecreate_s1.course_address')">
							{{errors.first('coursecreate_s1.course_address')}}
						</div> -->
                    </div>
                    <div class="form-group">
                        <label>Email:</label>
                        <input v-model="formData.golfClub.email" 
								v-validate="'required|email'"
								data-vv-as="email"
								data-vv-scope="coursecreate_s1"
								name="course_email"
								type="email" 
								:class="[{error: errors.has('coursecreate_s1.course_email')}, 'form-control']">
						<!-- <div class="errors" v-show="errors.has('coursecreate_s1.course_email')">
							{{errors.first('coursecreate_s1.course_email')}}
						</div> -->
                    </div>
                    <div class="form-group">
                        <label>Phone:</label>
                        <input v-model="formData.golfClub.phone" 
								type="text" 
								v-validate="'required|min:14'"
								maxlength="14"
								data-vv-as="phone"
								data-vv-scope="coursecreate_s1"
								name="course_phone"
								:class="[{error: errors.has('coursecreate_s1.course_phone')}, 'form-control num-only']">
						<!-- <div class="errors" v-show="errors.has('coursecreate-s1.course_phone')">
							{{errors.first('coursecreate-s1.course_phone')}}
						</div> -->
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
                            <input v-model="formData.holeGroupName" 
									name="name"
									type="text" 
									class="form-control">
                        </div>
                    </div>
                    <div class="hole-count-teebox">
                        <div class="hole-count">
                            <div>Number of holes</div>
                            <label :class="[
									{'selected': formData.holeCount == '9'},
									{'error': errors.has('coursecreate_s2.hole-count')},'select-btn']" 
                                    for="hole-count-9">9
                            </label>
                            <input type="radio" 
									class="hide" 
									v-model="formData.holeCount" 
									:value="9" 
									name="hole-count"
									v-validate="'required'"
									data-vv-scope="coursecreate_s2" 
									id="hole-count-9">
                            <label :class="[
									{'selected': formData.holeCount == '18'},
									{'error': errors.has('coursecreate_s2.hole-count')},'select-btn']" 
                                    for="hole-count-18">18
                            </label>
                            <input type="radio" 
									class="hide" 
									v-model="formData.holeCount" 
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
									v-model="formData.teeBox"
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
                        <div v-for="index in formData.holeCount" :key="index" class="holes">
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
                <div @click="courseFormToggle" class="nav-btn btn btn-outline-warning mr-4">Cancel</div>
                <div @click="stepForward" class="nav-btn btn btn-outline-success">Next</div>
            </template>
            <template v-if="step2">
                <div @click="stepBack" class="nav-btn btn btn-outline-secondary mr-4">Back</div>
                <div @click="createCourse" class="nav-btn btn btn-outline-success">Create Course</div>
            </template>
        </div>
    </form>
</template>

<script>
	export default {
		name: 'CourseCreationForm',
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
				step1: true,
				step2: false
			}
		},
		watch: {
			'formData.golfClub.phone': function(val) {
				let x = val.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
	    		this.formData.golfClub.phone = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
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
			createCourse() {
				const that = this;
				this.$validator.validateAll('coursecreate_s2').then((result) => {
					if (result) {
						this.formData.holes = [];
						let holesList = document.querySelectorAll('.hole');
						for (var i = 0; i < holesList.length; ++i) {
							let holeNum = i + 1;
							let holeLength = holesList[i].value;
							that.$set(this.formData.holes, i, {hole: holeNum, length: holeLength});
						}
					}
					console.log(this.formData)
				});
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
		border: 1px solid #000;
		margin-bottom: 10px;
		border-radius: $g-container-radius;
		header {
			font-size: 1.6rem;
			text-align: center;
			background: #26c721;
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
		input.error, select.error, label.error {
			border: 1px solid #fb0000 !important;
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
				border: 1px solid #000;
				border-radius: $g-btn-radius;
				margin-bottom: 10px;
				cursor: pointer;
				&:hover {
					transition: 250ms;
					background: #f9f9f9;
				}
			}
			.hole-count .select-btn.selected {
				background: #2acd25;
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
					color: #ffffff;
					min-width: 30px;
					background-color: #2acd25;
					border: 1px solid #000;
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