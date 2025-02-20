import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // server: {
    //     host: '0.0.0.0',
    //     hmr: {
    //         // host: '192.168.100.10',
    //         host: ['172.20.10.2', 'localhost'],
    //     }
    // }
});
