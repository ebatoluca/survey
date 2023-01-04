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

				teacher: {},

				fetchTeacherAttempt: 0

			}
		
		},

		methods: {

			fetchData() {

				this.fetchTeacher().then( res => {

					this.dataLoaded = true;
					
					this.title = this.teacher.name;

					document.title = this.title;

					this.pushBreadcrumbPage({
						name: this.$route.name, 
						params: this.$route.params, 
						label: this.title, 
						tooltip: '',
					});

				});

			},

			fetchTeacher() {

				return new Promise((resolve, reject) => {

					axios.post(route.name('api.teacher.show'), {

						_token: csrf_token,

						teacher_id: this.$route.params.id

					}).then( res => {

						this.fetchTeacherAttempt = 0;

						this.teacher = res.data;

						resolve(res);

					}).catch( error => {

						if(this.fetchTeacherAttempt <= 3) {

							setTimeout( () => {

								++this.fetchTeacherAttempt;

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