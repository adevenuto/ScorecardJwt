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
					<div v-show="courseForm">
						<CourseCreationForm @cancel="courseFormToggle"/>
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
		<transition name='fade' >
		<div v-if="currentUser" class="col-md-12">
			<h1 style="text-transform: capitalize;">{{currentUser.name}}'s Dashboard</h1>
			<div>
				<div v-for="course in currentUserCourses" :key="course.id">
					<h3 style="margin: 0;">{{course.name}}</h3>
					<i>{{course.holes}}</i><br>
					<i>{{course.email}}</i>
					<hr>
				</div>
			</div>
		</div>
		</transition>
	</div>
</template>

<script>
	import CourseCreationForm from './CourseCreationForm.vue';
	export default {
		name: 'Dashboard',
		components: {CourseCreationForm},
		data() {
			return {
				courseForm: false, 
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
			this.$store.dispatch('fetchUserCourses');
		}, 
		mounted: function() {
			// Google places address autocomplete
			var componentForm = {
				street_number: 'short_name',
				route: 'long_name',
				locality: 'long_name',
				administrative_area_level_1: 'short_name',
				country: 'long_name',
				postal_code: 'short_name'
			};
				
			var autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'), {types: ['geocode']});
			autocomplete.setFields(['address_components', 'geometry', 'formatted_address']);
			autocomplete.addListener('place_changed', fillInAddress);
			function fillInAddress() {
				var place = autocomplete.getPlace();

				var lat = place.geometry.location.lat();
				var lat_field = $('#lat');
				lat_field.val(lat);
				lat_field[0].dispatchEvent(new CustomEvent('input'));
				var lng = place.geometry.location.lng();
				var lng_field = $('#lng');
				lng_field.val(lng);
				lng_field[0].dispatchEvent(new CustomEvent('input'));

				var formatted_address = place.formatted_address;
				var course_address_field = $('#course_address');
				course_address_field.val(formatted_address);
				course_address_field[0].dispatchEvent(new CustomEvent('input'));
				
				for (var component in componentForm) {
					var target = $('#'+component);
					target.val('');
					target.prop( "disabled", true );
					target[0].dispatchEvent(new CustomEvent('input'));
				}
				
				for (var i = 0; i < place.address_components.length; i++) {
					var addressType = place.address_components[i].types[0];
					if (componentForm[addressType]) {
						var val = place.address_components[i][componentForm[addressType]];
						let targetField = $('#'+addressType);
						targetField.val(val);
						targetField[0].dispatchEvent(new CustomEvent('input'));
					}
				}
			}
		},
		methods: {
			courseFormToggle() {
				this.courseForm = !this.courseForm;
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
		background: #fff;
		border-radius: $g-container-radius;
		min-height: 600px;
	}

	@media (min-width: 768px) {
		.sidebar {
			max-width: 500px;
		}
		.container-fluid {
			max-width: 1400px;
		}
	}
	@media (min-width: 1024px) {
		.slide-form .step.step-2 .rendered-holes .holes {
			width: 18%;
		}	
	}
</style>