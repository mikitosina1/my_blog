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
				'resources/css/dashboard.css',
				'resources/css/dashboard/module_block.css',
				'resources/css/auth/login.css',
				'resources/css/auth/register.css',

				// js
				'resources/js/app.js',
				'resources/js/pages/resume.js',
				'resources/js/pages/dashboard.js',
				'resources/js/pages/dashboard/module_block.js',
				'resources/js/ck_editor.js'
			],
			refresh: true,
		}),
	],
	build: {
		rollupOptions: {
			output: {
				manualChunks(id) {
					if (id.includes('node_modules')) {
						return id.toString().split('node_modules/')[1].split('/')[0].toString();
					}
				}
			}
		},
		chunkSizeWarningLimit: 1500 // Увеличение лимита размера чанков до 1500 кБ
	}
});
