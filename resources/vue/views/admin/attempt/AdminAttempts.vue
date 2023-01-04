<template>

	<div id="AdminAttemptsWrapper">

		<div v-if="isHome" class="uk-section uk-section-xsmall">
			
			<attempt-crud 
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
	
	import AttemptCrud from '@cruds/AttemptCrud'

	export default {

		components: {

			AttemptCrud

		},

		beforeRouteEnter (to, from, next) {
			
			next(vue => {
				
				if(to.name == 'AdminAttempts') vue.updateBreadcrumbs();

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

				if(val == 'AdminAttempts') this.updateBreadcrumbs();
			
			}

		},

		computed: {

			isHome() {

				return (this.$route.name == 'AdminAttempts');

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