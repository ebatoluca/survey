<template>
	
	<a id="fullscreen-toggle" href="#" @click="toggleFullScreen">
							
		<i 
			v-if="isFullscreen" 
			class="fas fa-compress" 
			uk-tooltip="title: Salir de pantalla completa"></i>

		<i 
			v-else 
			class="fas fa-expand fs-20"
			uk-tooltip="title: Pantalla completa"></i>

	</a>

</template>

<script>
	
	export default {

		data() {

			return {

				isFullscreen: false,

			}

		},

		mounted() {

			document.addEventListener('fullscreenchange', (event) => this.fullscreenHandler());

		},

		methods: {

			fullscreenHandler() {

				this.isFullscreen = !(!document.fullscreenElement);

			},

			toggleFullScreen() {

				if (!document.fullscreenElement) {

					document.documentElement.requestFullscreen();

				} else {

					if (document.exitFullscreen) {

						document.exitFullscreen();

					}

				}

			}

		}

	}

</script>