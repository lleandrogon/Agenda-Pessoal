import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true, // Força usar a porta 5173
        hmr: {
            host: 'localhost',
            port: 5173,
            protocol: 'ws'
        },
        watch: {
            usePolling: true, // Essencial para Docker
        },
    },
});