<template>

	<nav class="breadcrumbs">

		<!-- Home link -->

			<router-link 
				class="breadcrumbs-item"
				:to="{

					name: homeLinkName,

					params: homeLinkParams,

				}">
				
				<span v-html="homeLinkLabel"></span>

			</router-link>

		<!-- Breadcrumbs links -->

			<router-link 
				v-for="breadcrumb in breadcrumbLinks"
				:key="breadcrumb.name"
				class="breadcrumbs-item"
				:class="{
					'is-active': breadcrumb.active == true
				}"
				:to="{

					name: breadcrumb.name,

					params: breadcrumb.params,

				}">
				
				<span v-html="breadcrumb.label" :uk-tooltip="breadcrumb.tooltip"></span>

			</router-link>

	</nav>

</template>

<script>
	
	export default {

		props: {

			homeLinkName: {
				type: String,
				default: 'Admin'
			},

			homeLinkParams: {
				type: Object,
				default: {}
			},

			homeLinkLabel: {
				type: String,
				default: '<i class="fa fa-home"></i>'
			},

			breadcrumbLinks: {
				type: Array,
				default: [],
			},

		},

	}

</script>

<style scoped>

	.breadcrumbs {
		border: 1px solid #cbd2d9;
		border-radius: 0.3rem;
		display: inline-flex;
	    overflow-x: auto;
	    overflow-y: hidden;
    	max-width: 100%;
	}

	.breadcrumbs::-webkit-scrollbar {
		display: none;
	}

	.breadcrumbs-item {
		background: #fff;
		color: #333;
		outline: none;
		padding: .4em 1em .4em 1.2em;
		position: relative;
		text-decoration: none;
		transition: background 0.2s linear;
		max-height: 26px;
	}

	.breadcrumbs-item:hover:after,
	.breadcrumbs-item:hover {
		background: #edf1f5;
	}

	.breadcrumbs-item:focus:after,
	.breadcrumbs-item:focus,
	.breadcrumbs-item.is-active:focus {
		background: #323f4a;
		color: #fff;
	}

	.breadcrumbs-item:after,
	.breadcrumbs-item:before {
		background: white;
		bottom: 0;
		clip-path: polygon(50% 50%, -50% -50%, 0 100%);
		content: "";
		left: 100%;
		position: absolute;
		top: 0;
		transition: background 0.2s linear;
		width: 1em;
		z-index: 1;
	}

	.breadcrumbs-item:before {
		background: #cbd2d9;
		margin-left: 1px;
	}

	.breadcrumbs-item:last-child {
		border-right: none;
	}

	.breadcrumbs-item:last-child:after,
	.breadcrumbs-item:last-child:before {
		display: none;
	}

	.breadcrumbs-item.is-active {
		background: #edf1f5;
	}



</style>