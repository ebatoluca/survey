import { defineConfig } from 'vite';
import { resolve } from 'path'
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/css/app.css', 
                'resources/assets/js/app.js',
            ],
            refresh: true,
        }),
        vue(),
    ],
    resolve: {
        alias: {
            '@public':     resolve(__dirname, 'public'),
            '@resources':  resolve(__dirname, 'resources'),
            '@assets':     resolve(__dirname, 'resources/assets'),
            '@css':        resolve(__dirname, 'resources/assets/css'),
            '@js':         resolve(__dirname, 'resources/assets/js'),
            '@plugins':    resolve(__dirname, 'resources/assets/plugins'),
            '@images':     resolve(__dirname, 'resources/assets/images'),
            '@app':        resolve(__dirname, 'resources/vue'),
            '@router':     resolve(__dirname, 'resources/vue/router'),
            '@vuex':       resolve(__dirname, 'resources/vue/vuex'),
            '@layouts':       resolve(__dirname, 'resources/vue/layouts'),
            '@views':       resolve(__dirname, 'resources/vue/views'),
        },
    },
});
