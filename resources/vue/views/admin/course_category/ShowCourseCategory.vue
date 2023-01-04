<template>

	<div class="uk-section uk-section-xsmall">

		<!-- Header -->
		<div v-if="dataLoaded" class="uk-container uk-container-expand">

			<breadcrumb-component 
				home-link-name="AdminDashboard"
				:breadcrumb-links="$store.getters['site/getBreadcrumb']" />

		</div>

		<!-- Body -->
		<div v-if="dataLoaded" class="uk-section uk-section-small">
			
			<!-- Add specific view content -->

		</div>

	</div>

</template>

<script>

	export default {

		mounted() {

			this.fetchData();

		},

		data() {
		
			return {

				dataLoaded: false,

				title: undefined,

				courseCategory: {},

				fetchCourseCategoryAttempt: 0

			}
		
		},

		methods: {

			fetchData() {

				this.fetchCourseCategory().then( res => {

					this.dataLoaded = true;
					
					this.title = this.courseCategory.name;

					document.title = this.title;

					this.pushBreadcrumbPage({
						name: this.$route.name, 
						params: this.$route.params, 
						label: this.title, 
						tooltip: '',
					});

				});

			},

			fetchCourseCategory() {

				return new Promise((resolve, reject) => {

					axios.post(route.name('api.course_category.show'), {

						_token: csrf_token,

						course_category_id: this.$route.params.id

					}).then( res => {

						this.fetchCourseCategoryAttempt = 0;

						this.courseCategory = res.data;

						resolve(res);

					}).catch( error => {

						if(this.fetchCourseCategoryAttempt <= 3) {

							setTimeout( () => {

								++this.fetchCourseCategoryAttempt;

								this.fetchData();

							}, 1500);

						} else {

							reject(error);

						}

					});

				});

			}

		}

	}

</script>