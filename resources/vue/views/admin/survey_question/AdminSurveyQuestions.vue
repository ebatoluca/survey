<template>

	<div id="AdminSurveyQuestionsWrapper">

		<div v-if="isHome" class="uk-section uk-section-xsmall">
			
			<survey-question-crud 
				:show-title="false"
				:show-breadcrumb="true"
				:key="crudKey"/>

		</div>

		<div v-else>

			<router-view @updateData="updateCrud"></router-view>
			
		</div>

	</div>

</template>

<script>
	
	import SurveyQuestionCrud from '@cruds/SurveyQuestionCrud.vue'

	export default {

		components: {

			SurveyQuestionCrud

		},

		beforeRouteEnter (to, from, next) {
			
			next(vue => {
				
				if(to.name == 'AdminSurveyQuestions') vue.updateBreadcrumbs();

			});


		},

		data() {

			return {

				title: undefined,

				crudKey: 0,

			}

		},

		watch:{
			
			'$route.name' (val, oldVal){

				if(val == 'AdminSurveyQuestions') this.updateBreadcrumbs();
			
			}

		},

		computed: {

			isHome() {

				return (this.$route.name == 'AdminSurveyQuestions');

			}

		},

		methods: {

			updateCrud() {

				++this.crudKey;

			},

			updateBreadcrumbs() {

				this.clearBreadcrums();

				this.title = document.title;

				this.pushBreadcrumbPage({
					name: this.$route.name, 
					params: this.$route.params, 
					label: this.title, 
					tooltip: '',
				});

			}

		}

	}

</script>