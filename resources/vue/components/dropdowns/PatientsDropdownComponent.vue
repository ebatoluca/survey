<template>

	<div 
    	:id="dropdownId" 
    	class="patients-dropdown uk-padding-remove uk-overflow-auto" 
    	uk-dropdown="mode: click;">
	    
        <ul class="uk-list uk-list-divider">

			<li v-for="patient in patients" class="uk-padding-small uk-padding-remove-vertical pointer">

				<router-link 
					class="uk-link-reset" 
					@click="closeDropdown"
					:to="{

						name: routeName,

						params: {

							id: patient.id

						}

					}">
					
					<div class="uk-margin-small-top uk-grid-small pointer" uk-grid>
						
						<div class="uk-width-auto">
							
							<img 
								class="uk-border-circle pointer" 
								:src="getDisplayFileUrl(patient.user.payload.data.avatar)"
								style="height: 45px; width: 45px;">

						</div>

						<div class="uk-width-expand">
							
							<p class="uk-margin-remove uk-text-bold pointer">

								{{ patient.user.name }} {{ patient.user.dad_last_name }} {{ patient.user.mom_last_name }}

							</p>

							<p class="uk-margin-remove uk-text-xsmall uk-text-meta pointer">
								
								<!-- En este apartado podemos poner información del último diagnóstico, si el paciente está activo, entre otras cosas -->

								{{ patient.user.email }}

							</p>

						</div>

					</div>

				</router-link>

			</li>

			<li></li>

		</ul>

	</div>

</template>

<script>

	import { hideDropdown } from '@js/utils/ui'
	
	export default {

		props: {

			dropdownId: {
				type: String,
				required: true
			},

			patients: {
				type: Array,
				required: true,
			},

			routeName: {
				type: String,
				default: 'RoleSpecialistPatientShow'
			}

		},

		methods: {

			closeDropdown() {

				hideDropdown(`#${this.dropdownId}`);

			}

		}

	}

</script>

<style scoped>
	
	.patients-dropdown {
		max-height: calc(100vh - 60px);
		width: 380px;
	}

</style>