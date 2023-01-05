<template>
	
	<div>
		
		<iframe 
			:src="src" 
			:style="`width:100%; height:${height};`" 
			frameborder="0"></iframe>

	</div>

</template>

<script>
	
	export default {


		props: {

			src: {
				type: String,
				required: true
			},

			height: {
				default: '600px',
			}

		}

	}

</script>