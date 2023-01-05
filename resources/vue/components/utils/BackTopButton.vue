<template>
	
	<a id="backTopButton" @click="backTop">
		
		<i class="fas fa-chevron-up"></i>

	</a>

</template>

<script>
	
	export default {

		mounted() {

			document.addEventListener("scroll", (e) => { this.handleScroll(e) }, false);

		}, 

		methods: {

			handleScroll(e) {

				let element = document.getElementById("backTopButton");

				if(element != null) {

					if(window.scrollY > 300 ) {
	  					
	  					element.classList.add("show");

					} else {

						element.classList.remove("show");

					}

				}

			},

			backTop() {

				window.scrollTo({top: 0, behavior: 'smooth'});
				
			}

		}

	}

</script>

<style>
	
	#backTopButton {
	  display: inline-block;
	  background-color: var(--secondary-color);
	  width: 50px;
	  height: 50px;
	  text-align: center;
	  border-radius: 4px;
	  position: fixed;
	  bottom: 30px;
	  right: 30px;
	  transition: background-color .3s, 
	    opacity .5s, visibility .5s;
	  opacity: 0;
	  visibility: hidden;
	  z-index: 1000;
	}
	
	#backTopButton i {
	  font-style: normal;
	  font-size: 1.6rem;
	  line-height: 50px;
	  color: #fff;
	}
	
	#backTopButton:hover {
	  cursor: pointer;
	  background-color: #333;
	}
	
	#backTopButton:active {
	  background-color: #555;
	}

	#backTopButton.show {
	  opacity: 1;
	  visibility: visible;
	}

</style>