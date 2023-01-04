<template>
	
	<div id="adminAppWrapper">

        <main uk-grid>
            
    		<the-sidebar />

            <div 
                class="uk-width-expand uk-padding-remove-horizontal uk-section-muted main-container"
                uk-height-viewport="offset-top: true">

    			<the-navbar />

    			<router-view></router-view>

            </div>

        </main>

        <the-offcanvas />

    </div>

</template>

<script>

    import '@css/admin.css'
	
	import TheSidebar from '@layouts/admin/TheSidebar.vue'
	import TheNavbar from '@layouts/admin/TheNavbar.vue'
	import TheOffcanvas from '@layouts/admin/TheOffcanvas.vue'

    export default {

        components: {

            TheSidebar,

            TheNavbar,

            TheOffcanvas,

        }

    }

</script>