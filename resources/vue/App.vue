<template>

	<button class="uk-button uk-button-primary" @click="showAlert">Hola mundo</button>

	<span uk-icon="custom"></span>

	<i class="fa-thin fa-user"></i>

</template>

<script>

	export default {

		methods: {

			showAlert() {

				UIkit.notification('Hello world.');

			}

		}

	}

</script>