<template>
	
	<div>
		
		<a uk-toggle="target: #bugReporterModal" :class="linkClasses">
			
			<slot></slot>

		</a>

		<!-- This is the modal -->
		<div id="bugReporterModal" uk-modal>

		    <div class="uk-modal-dialog uk-border-rounded">

		    	<button class="uk-modal-close-outside" type="button" uk-close></button>

		    	<!-- PENDIENTE: También se deberá habilitar el encabezado cuando se abilite el bug-report-form -->
		    	<div v-if="false" class="uk-modal-header uk-border-rounded card-header-alpha">
		    		
		    		Reportar un error

		    	</div>

		    	<div class="uk-modal-body uk-border-rounded uk-padding-remove">

		    		<!-- PENDIENTE: Esto quedapendiente hasta que pongamos en marcha el screen shot y un formulario interno-->
		    		<bug-report-form
		    			v-if="false" 
		    			@submit="bugReportForm" />

		    		<!-- PENDIENTE: De manera provicional vamos a poner este formulario de Google-->
		    		<iframe 
						src="https://docs.google.com/forms/d/e/1FAIpQLSfCVy3GnAMw2t6Uy539U7WmQ20MHJnVIcN03D4aGmg_pxHkEQ/viewform?embedded=true" 
						style="width: 100%; height: 550px;" 
						frameborder="0" 
						marginheight="0" 
						marginwidth="0">Cargando…</iframe>

		    	</div>

		    </div>
		</div>

	</div>

</template>

<script>

	import BugReportForm from './BugReportForm.vue'
	
	export default {

		components: {

			BugReportForm,

		},

		props: {

			linkClasses: {
				type: String,
				default: null
			}

		},

		methods: {

			bugReportForm(data) {

				console.log(data);

			}

		}

	}

</script>