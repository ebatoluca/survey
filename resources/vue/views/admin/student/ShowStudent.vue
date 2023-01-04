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

				student: {},

				fetchStudentAttempt: 0

			}
		
		},

		methods: {

			fetchData() {

				this.fetchStudent().then( res => {

					this.dataLoaded = true;
					
					this.title = this.student.name;

					document.title = this.title;

					this.pushBreadcrumbPage({
						name: this.$route.name, 
						params: this.$route.params, 
						label: this.title, 
						tooltip: '',
					});

				});

			},

			fetchStudent() {

				return new Promise((resolve, reject) => {

					axios.post(route.name('api.student.show'), {

						_token: csrf_token,

						student_id: this.$route.params.id

					}).then( res => {

						this.fetchStudentAttempt = 0;

						this.student = res.data;

						resolve(res);

					}).catch( error => {

						if(this.fetchStudentAttempt <= 3) {

							setTimeout( () => {

								++this.fetchStudentAttempt;

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