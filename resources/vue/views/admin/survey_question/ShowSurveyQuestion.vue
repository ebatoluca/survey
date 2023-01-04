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

				surveyQuestion: {},

				fetchSurveyQuestionAttempt: 0

			}
		
		},

		methods: {

			fetchData() {

				this.fetchSurveyQuestion().then( res => {

					this.dataLoaded = true;
					
					this.title = this.surveyQuestion.name;

					document.title = this.title;

					this.pushBreadcrumbPage({
						name: this.$route.name, 
						params: this.$route.params, 
						label: this.title, 
						tooltip: '',
					});

				});

			},

			fetchSurveyQuestion() {

				return new Promise((resolve, reject) => {

					axios.post(route.name('api.survey_question.show'), {

						_token: csrf_token,

						survey_question_id: this.$route.params.id

					}).then( res => {

						this.fetchSurveyQuestionAttempt = 0;

						this.surveyQuestion = res.data;

						resolve(res);

					}).catch( error => {

						if(this.fetchSurveyQuestionAttempt <= 3) {

							setTimeout( () => {

								++this.fetchSurveyQuestionAttempt;

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