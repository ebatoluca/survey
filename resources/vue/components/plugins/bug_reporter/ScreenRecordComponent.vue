<template>
	
	<div 
		v-show="showScreenShot"
		id="screenshot" 
		class="container" 
		@mousemove="move" 
		@mousedown="mouseDown" 
		@mouseup="mouseUp">

		<transition name="screenshot">
			
			<div 
				v-if="tookScreenShot"
				class="flash"></div>

		</transition>


		<div 
			class="overlay" 
			:class="{ 'highlighting' : mouseIsDown }" 
			:style="{ borderWidth: borderWidth }"></div>

		<div 
			class="crosshairs" 
			:class="{ 'hidden' : isDragging }" 
			:style="{ left: crossHairsLeft + 'px', top: crossHairsTop + 'px' }"></div>

		<div 
			class="borderedBox" 
			:class="{ 'hidden': !isDragging }" 
			:style="{ left: boxLeft + 'px', top: boxTop + 'px', width: boxEndWidth + 'px', height: boxEndHeight + 'px' }"></div>

		<span 
			ref="tooltip"
			class="tooltip" 
			:class="{ 'hidden': !isDragging }" 
			:style="{ left: toolTipLeft + 'px', top: toolTipTop + 'px'}">

			{{boxEndWidth}} x {{boxEndHeight}}px

		</span>

	</div>

</template>

<script>

	import html2canvas from 'html2canvas';
	
	export default {

		props: {

			showScreenShot: {
				type: Boolean,
				default: false,
			},

		},

		emits: ['shot'],

		data() {

			return {

				TOOLTIP_MARGIN: undefined,

				mouseIsDown: false,
			    isDragging: false, 
			    tookScreenShot: false, // After the mouse is released
			    
			    // Used to calculate where to start showing the dragging area
			    startX: 0,
			    startY: 0,
			    endX: 0,
			    endY: 0,
			    
			    borderWidth: "",
			    
			    // Handling the positioning of the crosshairs
			    crossHairsLeft: 0,
			    crossHairsTop: 0,
			    
			    // The box that contains the border and all required numbers.
			    boxTop: 0,
			    boxLeft: 0,
			    boxEndWidth: 0,
			    boxEndHeight: 0,
			    
			    // The tooltip's required positioning numbers.
			    toolTipLeft: 0,
			    toolTipTop: 0,
			    toolTipWidth: 0,
			    toolTipHeight: 0,
			    
			    windowHeight: 0,
			    windowWidth: 0,

			    croppedImageWidth: 0,
				croppedImageHeight: 0,
				imageUrl: undefined,

			}

		},

		mounted() {

			this.TOOLTIP_MARGIN = +window.getComputedStyle(document.querySelector(".tooltip")).margin.split("px")[0];

			this.windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
		    this.windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
		    
		    this.toolTipWidth = this.$refs.tooltip.getBoundingClientRect().width;

		    console.log(this.toolTipWidth);

		    window.onresize = () => {

		    	this.windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
		    	
		    	this.windowHeight = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;

		    };

		},

		methods: {
	
			move(e) {

				console.log(e);

				this.crossHairsTop = e.clientY;
				this.crossHairsLeft = e.clientX;

				var tooltipBoundingRect = this.$refs.tooltip.getBoundingClientRect();

				this.toolTipWidth = tooltipBoundingRect.width;
				this.toolTipHeight = tooltipBoundingRect.height;

				/* 
				* Change how the borderWidth is being calculated based on the x and y values.
				* Calculate the box with the 1px border's positioning and width 
				* Calculate the positioning of the tooltip */
				if (this.mouseIsDown) {

					var endY = this.endY = e.clientY,

					endX = this.endX = e.clientX,
					startX = this.startX,
					startY = this.startY,
					windowWidth = this.windowWidth,
					windowHeight = this.windowHeight;

					// Calculating the values differently depending on how the user start's dragging.
					if (endX >= startX && endY >= startY) {

						this.isDragging = true;

						this.borderWidth = startY + "px " + (windowWidth - endX) + "px " + (windowHeight - endY) + "px " + startX + "px";

						this.boxTop = startY;
						this.boxLeft = startX;
						this.boxEndWidth = endX - startX;
						this.boxEndHeight = endY - startY;

						this.toolTipLeft = endX;
						this.toolTipTop = endY;

						if (endX + this.toolTipWidth >= windowWidth) {
							
							this.toolTipLeft = windowWidth - this.toolTipWidth - (this.TOOLTIP_MARGIN * 2);

						}

						if (endY + this.toolTipHeight + (this.TOOLTIP_MARGIN * 2) >= windowHeight) {
							
							this.toolTipTop = windowHeight - this.toolTipHeight - (this.TOOLTIP_MARGIN * 2);

						}

					} else if (endX <= startX && endY >= startY) {

						this.isDragging = true;

						this.borderWidth = startY + "px " + (windowWidth - startX) + "px " + (windowHeight - endY) + "px " + endX + "px";

						this.boxLeft = endX;
						this.boxTop = startY;
						this.boxEndWidth = startX - endX;
						this.boxEndHeight = endY - startY;

						this.toolTipLeft = endX - this.toolTipWidth;
						this.toolTipTop = endY;

						if (endX - this.toolTipWidth <= 0) {
							
							this.toolTipLeft = this.TOOLTIP_MARGIN;

						}

						if (endY + this.toolTipHeight + (this.TOOLTIP_MARGIN * 2) >= windowHeight) {
						
							this.toolTipTop = windowHeight - this.toolTipHeight - (this.TOOLTIP_MARGIN * 2);

						}

					} else if (endX >= startX && endY <= startY) {

						this.isDragging = true;

						this.boxLeft = startX;
						this.boxTop = endY;
						this.boxEndWidth = endX - startX;
						this.boxEndHeight = startY - endY;

						this.toolTipLeft = endX;
						this.toolTipTop = endY - this.toolTipHeight;

						this.borderWidth = endY + "px " + (windowWidth - endX) + "px " + (windowHeight - startY) + "px " + startX + "px";

						if (endX + this.toolTipWidth >= windowWidth) {
						
							this.toolTipLeft = windowWidth - this.toolTipWidth - (this.TOOLTIP_MARGIN * 2);

						}

						if (endY - this.toolTipHeight <= 0) {
						
							this.toolTipTop = this.TOOLTIP_MARGIN;

						}

					} else if (endX <= startX && endY <= startY) {

						this.isDragging = true;

						this.boxLeft = endX;
						this.boxTop = endY;
						this.boxEndWidth = startX - endX;
						this.boxEndHeight = startY - endY;

						this.borderWidth = endY + "px " + (windowWidth - startX) + "px " + (windowHeight - startY) + "px " + endX + "px";

						this.toolTipLeft = endX - this.toolTipWidth;
						this.toolTipTop = endY - this.toolTipHeight;

						if (endX - this.toolTipWidth <= 0) {
						
							this.toolTipLeft = this.TOOLTIP_MARGIN;

						}

						if (endY - this.toolTipHeight <= 0) {
						
							this.toolTipTop = this.TOOLTIP_MARGIN;

						}

					} else {
					
						this.isDragging = false;

					}

				}

			},

			mouseDown(e) {

				this.borderWidth = this.windowWidth + "px " + this.windowHeight + "px"; 

				this.startX = e.clientX;
				this.startY = e.clientY;

				this.toolTipWidth = this.$refs.tooltip.getBoundingClientRect().width;

				this.mouseIsDown = true;
				this.tookScreenShot = false;

			},

			mouseUp(e) {

				this.borderWidth = 0;

				if (this.isDragging) {

					// Don't take the screenshot unless the mouse moved somehow.
					this.tookScreenShot = true;

				}

				this.isDragging = false;
				this.mouseIsDown = false;

				this.takeScreenshot();

			},

			takeScreenshot() {
				
				html2canvas(document.querySelector('body')).then(canvas => {
				
					let croppedCanvas = document.createElement('canvas'),
					
					croppedCanvasContext = croppedCanvas.getContext('2d');

					croppedCanvas.width  = this.croppedImageWidth;
					
					croppedCanvas.height = this.croppedImageHeight;

					croppedCanvasContext.drawImage(canvas, this.startX, this.startY, this.croppedImageWidth, this.croppedImageHeight, 0, 0, this.croppedImageWidth, this.croppedImageHeight);

					this.imageUrl = croppedCanvas.toDataURL();

					this.$emit('shot', this.imageUrl);

				});

			}
	
		}

	}

</script>

<style scoped>
	

	.overlay,
	.crosshairs,
	.tooltip,
	.borderedBox {
		user-select: none;
	}

	.overlay {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, 0.5);
	}

	.overlay.highlighting {
		background: none;
		border-color: rgba(0, 0, 0, 0.5);
		border-style: solid;
	}

	.crosshairs {
		height: 100%;
		position: absolute;
		width: 100%;
		z-index: 2147483645;
	}

	.crosshairs.hidden {
		display: none;
	}

	.crosshairs::before,
	.crosshairs::after {
		content: "";
		height: 100%;
		width: 100%;
		position: absolute;
		border: none !important;
		border-image: !important;
	}

	.crosshairs::before {
		left: -100%;
		top: -100%;
		border-right: 1px solid rgba(255, 255, 255, 0.3) !important;
		border-bottom: 1px solid rgba(255, 255, 255, 0.3) !important;
	}

	.crosshairs::after {
		left: 0px;
		top: 0px;
		border-top: 1px solid rgba(255, 255, 255, 0.3) !important;
		border-left: 1px solid rgba(255, 255, 255, 0.3) !important;
	}

	.container {
		clear: both;
		overflow: hidden;
		width: 100%;
		height: 100%;
	}

	.borderedBox {
		border: 1px solid #fff;
		position: absolute;
	}

	.borderedBox.hidden {
		display: none;
	}

	.tooltip {
		display: inline-block;
		position: absolute;

		background-color: grey;
		color: #fff;

		border-radius: 4px;

		font-size: 12px;
		font-family: monospace;

		padding: 6px;
		margin: 6px;
		white-space: nowrap;
	}

	.tooltip.hidden {
		display: none;
	}

	.flash {
		position: absolute;
		width: 100%;
		height: 100%;

		top: 0;
		left: 0;

		background-color: #fff;
		z-index: 2147483646;

		opacity: 1;

		animation-delay: 0.2s;
		animation-name: fade-out;
		animation-duration: 1s;
		animation-iteration-count: 1;
		animation-fill-mode: forwards;
	}

	.screenshot-enter-active,
	.screenshot-leave-active {
		transition: opacity 0.2s;
	}

	.screenshot-enter, .screenshot-leave-to /* .fade-leave-active below version 2.1.8 */ {
		opacity: 0;
	}

	@keyframes fade-out {

		from {
			opacity: 1;
		}

		to {
			opacity: 0;
		}

	}


</style>