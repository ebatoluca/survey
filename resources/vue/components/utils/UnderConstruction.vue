<template>

	<div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-margin uk-padding-small">
		
		<div class="warning-content">

			<h1>{{ title }}</h1>

			<p v-html="message"></p>

			<div class="uk-animation-toggle">
		
				<img 
					class="uk-animation-stroke" 
					src="/assets/images/utils/strokes.svg" 
					width="400" 
					height="400" 
					alt="" 
					uk-svg="stroke-animation: true">

			</div>

			<p v-html="farewell"></p>

		</div>

	</div>

</template>

<script>
	
	export default {

		props: {

			title: {
				type: String,
				default: 'Área en construcción'
			},

			message: {
				type: String,
				default: 'Por favor, disculpe las molestias. <br > Esta sección se encuentra actualmente en construcción'
			},

			farewell: {
				type: String,
				default: 'Si tiene alguna pregunta nos puede escribir a <a href="mailto:soporte@siconsulta.com" target="_blanck">soporte@siconsulta.com</a>',
			}

		}

	}

</script>

<style scoped>
	
	h1 {
		font-weight: 100;
		font-size: 27pt;
		color: #e43;
	}

	p {
		font-weight: 300;
	}

	.warning-content {
		text-align: center;
	}


</style>