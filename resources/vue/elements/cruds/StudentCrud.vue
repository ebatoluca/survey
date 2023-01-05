<template>
	
	<crud-template
		title="Student Administration" 
		:data-url="dataUrl"
		:policy-url="policyUrl"
		:model="model"
		:external-filters="studentExternalFilters"
		:form-filters="formFilters"
		:extra-params="extraParams"
		:hide-columns="hideColumns"
		:card-wrapper="cardWrapper"
		:show-topbar="showTopbar"
		:show-title="showTitle"
		:show-breadcrumb="showBreadcrumb"
		:has-actions="hasActions" 
		:has-filter="hasFilter" >

		<template v-slot:filterForm>
			
			<filter-form @submit="updateFormFilters" />

		</template>

	</crud-template>

</template>

<script>
	
	import CrudTemplate from '@templates/CrudTemplate.vue'
	import FilterForm from '@forms/filters/StudentFilterForm.vue'
	import * as model from '@js/models/student' 

	export default {

		components: {
			
			CrudTemplate,
			
			FilterForm ,

		},

		props: {

			showTopbar:{
				type: Boolean,
				default: true
			},
			
			showTitle: {
				type: Boolean,
				default: true
			},

			showBreadcrumb: {
				type: Boolean,
				default: false
			},

			hasActions: {
				type: Boolean,
				default: true
			},

			hasFilter: {
				type: Boolean,
				default: true
			},

			externalFilters: {
				type: Object,
				default: {}
			},

			extraParams: {
				type: Object,
				default: {}
			},

			hideColumns: {
				type: Array,
				default: []
			},

			cardWrapper: {
				type: Boolean,
				default: true
			},

		},		

		data() {

			return {
			
				dataUrl: route.name('api.student.index'),

				policyUrl: route.name('api.student.policies'),

				model: model,

				formFilters: {}
			
			}

		},

		computed: {

			studentExternalFilters() {

				let filters = {/* Add custom filters */}

				return {
					...this.externalFilters,
					...filters
				}

			}

		},

		methods: {

			updateFormFilters(filters) {

				this.formFilters = filters;

			},

		}

	}

</script>