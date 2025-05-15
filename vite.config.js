import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import collectModuleAssetsPaths from './vite-module-loader.js';

async function getConfig() {
	const paths = [
		// css
		'resources/css/app.css',
		'resources/css/about.css',
		'resources/css/welcome.css',
		'resources/css/resume.css',
		'resources/css/dashboard.css',
		'resources/css/auth/login.css',
		'resources/css/auth/register.css',

		// js
		'resources/js/app.js',
		'resources/js/pages/resume.js',
		'resources/js/pages/dashboard.js',
		'resources/js/ck_editor.js'
	];
	const allPaths = await collectModuleAssetsPaths(paths, 'Modules');

	return defineConfig({
		plugins: [
			laravel({
				input: allPaths,
				refresh: true,
			})
		]
	});
}

export default getConfig();
