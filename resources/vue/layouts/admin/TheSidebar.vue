<template>
	
	<div class="uk-width-auto sidebar">
        
        <div id="sidebarNavWrapper">

            <div class="close-toggle uk-visible@m">

                <a uk-toggle="target: #sidebarNavWrapper; cls: force-display mobile-display">
                    
                    <i class="fas fa-arrow-left"></i>

                </a>

            </div>
                
            <div class="sidebar-nav">
                            
                <ul class="uk-list">
                    
                    <li class="uk-text-center uk-margin-top uk-margin-bottom">
                        
                        <a href="#">
                            
                            <img 
                                src="https://siconsulta.com/assets/images/logos/logo_150.png" 
                                style="width: 35px; height: 35px; object-fit: contain;" />

                        </a>

                    </li>

                    <li class="uk-text-center icon">
                        
                        <a href="#" uk-toggle="target: #offcanvasNav">

                            <i class="fas fa-tachometer-alt"></i>

                        </a>

                    </li>

                    <hr class="uk-margin-remove" />

                    <li class="uk-text-center icon">
                        
                        <a href="https://tawk.to/siconsulta" target="_blanck">

                            <i class="far fa-comment-alt"></i>

                        </a>

                    </li>

                    <li class="uk-text-center icon">
                        
                        <a href="https://siconsulta.tawk.help" target="_blanck">

                            <i class="fas fa-question"></i>

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</template>