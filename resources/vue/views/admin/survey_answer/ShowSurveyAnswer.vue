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

				surveyAnswer: {},

				fetchSurveyAnswerAttempt: 0

			}
		
		},

		methods: {

			fetchData() {

				this.fetchSurveyAnswer().then( res => {

					this.dataLoaded = true;
					
					this.title = this.surveyAnswer.name;

					document.title = this.title;

					this.pushBreadcrumbPage({
						name: this.$route.name, 
						params: this.$route.params, 
						label: this.title, 
						tooltip: '',
					});

				});

			},

			fetchSurveyAnswer() {

				return new Promise((resolve, reject) => {

					axios.post(route.name('api.survey_answer.show'), {

						_token: csrf_token,

						survey_answer_id: this.$route.params.id

					}).then( res => {

						this.fetchSurveyAnswerAttempt = 0;

						this.surveyAnswer = res.data;

						resolve(res);

					}).catch( error => {

						if(this.fetchSurveyAnswerAttempt <= 3) {

							setTimeout( () => {

								++this.fetchSurveyAnswerAttempt;

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