import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                /* --------- style sheet files  -----------*/
                'resources/css/app.css',
                'resources/css/home.css',
                'resources/css/style.css',
                'resources/css/auth.css',
                'resources/css/panel.css',
                'resources/css/player.css',
                'resources/css/register.css',
                /* --------- javascript files  -----------*/
                'resources/js/app.js',
                'resources/js/auth.js',
                'resources/js/player.js',
                'resources/js/script.js'
            ],
            refresh: true,
        }),
    ],
});