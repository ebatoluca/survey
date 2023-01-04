<template>
	
	<div class="wrapper">
        
        <the-header />

        <div class="form-body">
            
            <div class="uk-section uk-section-large" uk-height-viewport="offset-top: true">
                
                <div class="uk-container uk-animation-slide-left">

                    <router-view></router-view>

                </div>

            </div>

        </div>

    	<the-footer />

    </div>

</template>

<script>

	import '@css/survey.css'
	
	import TheHeader from '@layouts/survey/TheHeader.vue'
	import TheFooter from '@layouts/survey/TheFooter.vue'

	export default {

		components:{

			TheHeader,

			TheFooter,

		}

	}

</script>