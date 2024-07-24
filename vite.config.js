import {defineConfig} from 'vite';
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
				'resources/css/dashboard.css',
				'resources/css/dashboard/module_block.css',
				'resources/css/auth/login.css',
				'resources/css/auth/register.css',

				// js
				'resources/js/app.js',
				'resources/js/pages/resume.js',
				'resources/js/pages/dashboard.js',
				'resources/js/pages/dashboard/module_block.js'
			],
			refresh: true,
		}),
	],
});
