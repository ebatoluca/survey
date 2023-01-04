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

				attempt: {},

				fetchAttemptAttempt: 0

			}
		
		},

		methods: {

			fetchData() {

				this.fetchAttempt().then( res => {

					this.dataLoaded = true;
					
					this.title = this.attempt.name;

					document.title = this.title;

					this.pushBreadcrumbPage({
						name: this.$route.name, 
						params: this.$route.params, 
						label: this.title, 
						tooltip: '',
					});

				});

			},

			fetchAttempt() {

				return new Promise((resolve, reject) => {

					axios.post(route.name('api.attempt.show'), {

						_token: csrf_token,

						attempt_id: this.$route.params.id

					}).then( res => {

						this.fetchAttemptAttempt = 0;

						this.attempt = res.data;

						resolve(res);

					}).catch( error => {

						if(this.fetchAttemptAttempt <= 3) {

							setTimeout( () => {

								++this.fetchAttemptAttempt;

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