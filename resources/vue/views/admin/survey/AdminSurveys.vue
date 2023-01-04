<template>

	<div id="AdminSurveysWrapper">

		<div v-if="isHome" class="uk-section uk-section-xsmall">
			
			<survey-crud 
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
	
	import SurveyCrud from '@cruds/SurveyCrud'

	export default {

		components: {

			SurveyCrud

		},

		beforeRouteEnter (to, from, next) {
			
			next(vue => {
				
				if(to.name == 'AdminSurveys') vue.updateBreadcrumbs();

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

				if(val == 'AdminSurveys') this.updateBreadcrumbs();
			
			}

		},

		computed: {

			isHome() {

				return (this.$route.name == 'AdminSurveys');

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