<template>
	
	<div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-padding-small statistics-card">
						
		<div class="uk-margin uk-grid-collapse" uk-grid>
			
			<div class="uk-width-expand">
				
				<p class="uk-margin-remove title">
					
					{{ title }}

				</p>

			</div>

			<div 
				v-if="showLabel" 
				class="uk-width-auto"
				uk-tooltip="title: Tasa de crecimiento con respecto al mismo día del mes anterior">

				<div :class="`label ${labelType}`">
					
					{{ label }}% <i :class="labelIcon"></i>

				</div>

			</div>

		</div>

		<div class="uk-margin uk-grid-collapse" uk-grid>

			<div class="uk-width-auto">
				
				<div>
					
					<i 
						:class="`${icon} icon ${iconColor}`"></i>

				</div>

			</div>

			<div class="uk-width-expand">
				
				<p class="counter">

					<span class="number">{{ formatedNumber }}</span> 

					<span class="sufix">{{ sufix }}</span>

				</p>

			</div>

		</div>

	</div>

</template>

<script>

	import { numberFormat } from '@js/utils/number'
	
	export default {

		props: {

			title: {
				type: String,
				required: true,
			},

			showLabel:{
				type: Boolean,
				default: true,
			},

			labelType: {
				type: String,
				default: 'neutro'
			},

			label: {
				type: [Number, String], 
				default: ''
			},

			labelIcon: {
				type: String,
				default: ''
			},

			icon: {
				type: String,
				default: 'fas fa-users',
				// PENDIENTE: Después hacer requerido
			},

			iconColor: {
				type: String,
				default: 'blue'
			},

			number: {
				type: [Number, String],
				default: 0
			},

			decimals: {
				type: Number,
				default: 0
			},

			sufix: {
				type: String,
				default: ''
			}

		},

		computed: {

			formatedNumber()
			{

				return numberFormat(this.number, this.decimals);

			}

		}

	}

</script>

<style scoped>

	.title {
	    font-size: 15px;
	    color: #999;
	}

	.label{
	    font-size: 12px;
	    padding: 0px 15px;
	    border-radius: 5px;
	    font-size: 500;
	}

	.label.success {
		background: #32d296;
		color: #fff;
	}

	.label.neutro {
		background: #5094fe;
		color: #fff;
	}
	
	.label.danger {
		background: #f0506e;
		color: #fff;
	}
	
	.icon {
	    height: 40px;
	    width: 40px;
	    line-height: 40px;
	    text-align: center;
	    border-radius: 100%;
	}

	.icon.blue {
	    background: #5094fe33;
	    color: #5094fe;
	    border: 2px solid #5094fe;
	}

	.icon.green {
	    background: #32d29621;
    	color: #32d296;
    	border: 2px solid #32d296;
	}

	.icon.red {
	    background: #f0506e33;
    	color: #f0506e;
    	border: 2px solid #f0506e;
	}

	.icon.yellow {
	    background: #ffd;
	    color: #abab24;
	    border: 2px solid #abab24;
	}

	.counter {
		text-align: right;
	    font-size: 40px;
	    font-weight: 700;
	    line-height: 40px;
	}

	.sufix {
	    font-size: 16px;
	    font-weight: 100;
	    vertical-align: bottom;
	    margin-left: 15px;
	}

</style>