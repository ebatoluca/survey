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

				period: {},

				fetchPeriodAttempt: 0

			}
		
		},

		methods: {

			fetchData() {

				this.fetchPeriod().then( res => {

					this.dataLoaded = true;
					
					this.title = this.period.name;

					document.title = this.title;

					this.pushBreadcrumbPage({
						name: this.$route.name, 
						params: this.$route.params, 
						label: this.title, 
						tooltip: '',
					});

				});

			},

			fetchPeriod() {

				return new Promise((resolve, reject) => {

					axios.post(route.name('api.period.show'), {

						_token: csrf_token,

						period_id: this.$route.params.id

					}).then( res => {

						this.fetchPeriodAttempt = 0;

						this.period = res.data;

						resolve(res);

					}).catch( error => {

						if(this.fetchPeriodAttempt <= 3) {

							setTimeout( () => {

								++this.fetchPeriodAttempt;

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