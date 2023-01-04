<template>

	<div id="AdminPeriodsWrapper">

		<div v-if="isHome" class="uk-section uk-section-xsmall">
			
			<period-crud 
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
	
	import PeriodCrud from '@cruds/PeriodCrud'

	export default {

		components: {

			PeriodCrud

		},

		beforeRouteEnter (to, from, next) {
			
			next(vue => {
				
				if(to.name == 'AdminPeriods') vue.updateBreadcrumbs();

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

				if(val == 'AdminPeriods') this.updateBreadcrumbs();
			
			}

		},

		computed: {

			isHome() {

				return (this.$route.name == 'AdminPeriods');

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