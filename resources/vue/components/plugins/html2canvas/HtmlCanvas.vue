<template>

	<div class="html-canvas-container" ref="htmlCanvasContainer">
		
		<div class="uk-height-large uk-overflow-auto">
			
			<div ref="canvasContainer"></div>

		</div>

		<div 
			v-if="showHtmlContent"
			ref="htmlContainer"
			v-html="htmlCode"></div>

	</div>

</template>

<script>

	import html2canvas from 'html2canvas';
	
	export default {

		props: {

			html: {
				type: String,
				required: true,
			},

			removeResponsive: {
				type: Boolean,
				default: false,
			}

		},

		data() {

			return {

				showHtmlContent: true,

			}

		},

		mounted() {

			this.takeSnapshot();

		},

		computed: {

			htmlCode() {

				if(this.removeResponsive) {

					return this.html.replace('<meta name="viewport" content="width=device-width, initial-scale=1">', '');

				} else {

					return this.html;

				}

			}

		},

		methods: {

			takeSnapshot() {

				let loader = this.showLoader();

				html2canvas(this.$refs.htmlContainer, {}).then((canvas) => {

				    this.$refs.canvasContainer.appendChild(canvas);

				    this.showHtmlContent = false;

				    this.hideLoader(loader);

				});

			}

		}

	}

</script>