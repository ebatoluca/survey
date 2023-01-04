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

				survey: {},

				fetchSurveyAttempt: 0

			}
		
		},

		methods: {

			fetchData() {

				this.fetchSurvey().then( res => {

					this.dataLoaded = true;
					
					this.title = this.survey.name;

					document.title = this.title;

					this.pushBreadcrumbPage({
						name: this.$route.name, 
						params: this.$route.params, 
						label: this.title, 
						tooltip: '',
					});

				});

			},

			fetchSurvey() {

				return new Promise((resolve, reject) => {

					axios.post(route.name('api.survey.show'), {

						_token: csrf_token,

						survey_id: this.$route.params.id

					}).then( res => {

						this.fetchSurveyAttempt = 0;

						this.survey = res.data;

						resolve(res);

					}).catch( error => {

						if(this.fetchSurveyAttempt <= 3) {

							setTimeout( () => {

								++this.fetchSurveyAttempt;

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