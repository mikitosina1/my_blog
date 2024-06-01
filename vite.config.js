import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // css
                'resources/css/app.css',
                'resources/css/about.css',
                'resources/css/welcome.css',
                'resources/css/resume.css',

                // js
                'resources/js/app.js',
                'resources/js/pages/resume.js'
            ],
            refresh: true,
        }),
    ],
});
