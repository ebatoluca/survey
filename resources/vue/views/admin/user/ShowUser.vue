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

				user: {},

				fetchUserAttempt: 0

			}
		
		},

		methods: {

			fetchData() {

				this.fetchUser().then( res => {

					this.dataLoaded = true;
					
					this.title = this.user.name;

					document.title = this.title;

					this.pushBreadcrumbPage({
						name: this.$route.name, 
						params: this.$route.params, 
						label: this.title, 
						tooltip: '',
					});

				});

			},

			fetchUser() {

				return new Promise((resolve, reject) => {

					axios.post(route.name('api.user.show'), {

						_token: csrf_token,

						user_id: this.$route.params.id

					}).then( res => {

						this.fetchUserAttempt = 0;

						this.user = res.data;

						resolve(res);

					}).catch( error => {

						if(this.fetchUserAttempt <= 3) {

							setTimeout( () => {

								++this.fetchUserAttempt;

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