import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import cleanPlugin from 'vite-plugin-clean'
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        cleanPlugin(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
