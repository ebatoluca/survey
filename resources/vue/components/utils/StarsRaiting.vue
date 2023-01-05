<template>
	
	<span class="stars" :style="{ 

		fontSize: fontSize + fontSizeUnit,

		color: activeColor,

	}">
        
        <i v-for="i in integer" :key="i" class="fas fa-star fa-sm"></i>

        <i v-for="f in float" :key="f" class="fas fa-star-half-alt fa-sm"></i>

        <i v-for="e in empty" :key="e" class="far fa-star fa-sm"></i>

    </span>

</template>

<script>
	
	export default {

		props: {

			votes: {
				type: Number,
				required: true,
				validator(value) {
				
					return (value >= 0 && value <= 5);
				
				}
			},

			activeColor: { 
	        	type: String, 
	        	required: false, 
	        	default: null 
	        },

	        fontSize: {
	        	type: [String, Number],
	        	default: '.875'
	        },

	        fontSizeUnit: {
	        	type: String,
	        	default: 'rem'
	        }

		},

		computed: {

			integer() {

				return Math.trunc(this.votes); 

			},

			float() {

				let float = Number((this.votes - this.integer).toFixed(2));

				return (float > 0) ? 1 : 0;

			},

			empty() {

				return 5 - this.float - this.integer;

			},

		}

	}

</script>
