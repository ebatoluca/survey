<template>

	<div id="AdminStudentsWrapper">

		<div v-if="isHome" class="uk-section uk-section-xsmall">
			
			<student-crud 
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
	
	import StudentCrud from '@cruds/StudentCrud'

	export default {

		components: {

			StudentCrud

		},

		beforeRouteEnter (to, from, next) {
			
			next(vue => {
				
				if(to.name == 'AdminStudents') vue.updateBreadcrumbs();

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

				if(val == 'AdminStudents') this.updateBreadcrumbs();
			
			}

		},

		computed: {

			isHome() {

				return (this.$route.name == 'AdminStudents');

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