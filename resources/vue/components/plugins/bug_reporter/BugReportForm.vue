<template>
	
	<div>
		
		<p>
			
			¿Quieres comentar algo?

		</p>

		<div>
			
			<button @click="showScreenShot = !showScreenShot">Mostrar captura de pantalla</button>

			<screen-record-component 
				:show-screen-shot="showScreenShot"
				@shot="screenShot"/>

		</div>

	</div>

</template>

<script>

	import ScreenRecordComponent from './ScreenRecordComponent.vue'
	
	export default {

		components: {

			ScreenRecordComponent,

		},

		data() {

			return {

				showScreenShot: false,

			}

		},

		methods: {

			screenShot(data) {

				console.log(data);

			}

		}

	}

</script>