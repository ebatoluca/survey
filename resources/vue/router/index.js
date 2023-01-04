import { createWebHistory, createRouter } from "vue-router"
import routes from "./routes"

const router = createRouter({

	history: createWebHistory(),
	
    routes,
    
    scrollBehavior(to, from, savedPosition) {
        
        return { 

            top: 0,
    
            behavior: 'smooth',
    
        }
    
    },

});

export default router;