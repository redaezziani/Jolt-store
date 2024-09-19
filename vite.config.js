import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '192.168.1.118', // Your IP address
        port: 3000, // Vite port
        hmr: {
            host: '192.168.1.118', // For Hot Module Replacement
        },
    },
});
