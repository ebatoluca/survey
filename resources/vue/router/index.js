import { createWebHistory, createRouter } from "vue-router"
import middlewarePipeline from '@router/middleware/middlewarePipeline'
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

router.beforeEach((to, from, next) => {

    // Meta tag global information
    if(to.meta.title) {

        let pageTitle = to.meta.title;

        let routePath = `${location.protocol}//${location.host}${to.fullPath}`;

        document.title = pageTitle;

    }

    // Si no tiene middle ware retornar la ruta de destino
    if(!to.meta.middleware)  return next();

    // Si existen middleware, los asignamos a una constante.
    const middleware = to.meta.middleware;

    const context = {
        to,
        from,
        next
    }

    return middleware[0]({
        ...context,
        next: middlewarePipeline(context, middleware, 1)
    });

});

export default router;