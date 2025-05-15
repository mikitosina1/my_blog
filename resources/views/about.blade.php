@vite(['resources/js/app.js','resources/css/about.css','resources/css/app.css'])
<x-app-layout>
	<div class="content-block p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-8">
		{{--        <div class="pimcore certificates">--}}
		{{--            <div><img src="https://pimcore.com/academy/certificate-validation/badge/18PB765KY2E9XVN" style="max-width: 5em; max-height: 5em;" alt="pimcore junior badge"></div>--}}
		{{--            <div><img src="https://pimcore.com/academy/certificate-validation/badge/7Y9WXEG1QCBTA8V" style="max-width: 5em; max-height: 5em;" alt="pimcore senior badge"></div>--}}
		{{--            <div><img src="https://pimcore.com/academy/certificate-validation/badge/7RF9SP5E4JUMXKV" style="max-width: 5em; max-height: 5em;" alt="pimcore enterprise badge"></div>--}}
		{{--        </div>--}}

		<!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->

		<div class="social">
			<a href="https://t.me/mikitosina">
				<svg xmlns="http://www.w3.org/2000/svg" height="26" width="25.5" viewBox="0 0 496 512" class="telegram">
					<path
						d="M248 8C111 8 0 119 0 256S111 504 248 504 496 393 496 256 385 8 248 8zM363 176.7c-3.7 39.2-19.9 134.4-28.1 178.3-3.5 18.6-10.3 24.8-16.9 25.4-14.4 1.3-25.3-9.5-39.3-18.7-21.8-14.3-34.2-23.2-55.3-37.2-24.5-16.1-8.6-25 5.3-39.5 3.7-3.8 67.1-61.5 68.3-66.7 .2-.7 .3-3.1-1.2-4.4s-3.6-.8-5.1-.5q-3.3 .7-104.6 69.1-14.8 10.2-26.9 9.9c-8.9-.2-25.9-5-38.6-9.1-15.5-5-27.9-7.7-26.8-16.3q.8-6.7 18.5-13.7 108.4-47.2 144.6-62.3c68.9-28.6 83.2-33.6 92.5-33.8 2.1 0 6.6 .5 9.6 2.9a10.5 10.5 0 0 1 3.5 6.7A43.8 43.8 0 0 1 363 176.7z"/>
				</svg>
			</a>
			<a href="https://github.com/mikitosina1">
				<svg xmlns="http://www.w3.org/2000/svg" height="26" width="25.5" viewBox="0 0 496 512" class="github">
					<path
						d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/>
				</svg>
			</a>
			<a href="https://www.linkedin.com/in/mykyta-zarichnyi-b63b51252">
				<svg xmlns="http://www.w3.org/2000/svg" height="26" width="24" viewBox="0 0 448 512" class="linkedin">
					<path
						d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/>
				</svg>
			</a>
			<a href="mailto:mikitosina27@gmail.com">
				<svg class="gmail" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" height="26px"
					 width="26px" fill="black">
					<path
						d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z"/>
				</svg>
			</a>
		</div>
		<div class="text">
			<h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">@lang('about.hi') 🤓</h1>
			<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">@lang('about.iam')</p>
			<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">📣 @lang('about.1')</p>
			<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">🛠️ @lang('about.0')</p>
			<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">📋 @lang('about.2')</p>
			<ul>
				<li class="mt-1 text-sm text-gray-600 dark:text-gray-400">LAMP, LEMP, Linux (Debian & Ubuntu), Docker,
					DDEV, Git, composer
				</li>
				<li class="mt-1 text-sm text-gray-600 dark:text-gray-400">Cron, PHP, Laravel, Shopware, Pimcore, AJAX,
					MySQL, API
				</li>
				<li class="mt-1 text-sm text-gray-600 dark:text-gray-400">JavaScript, jQuery, VUE, HTML, CSS, Bootstrap,
					Sass/Less, XML, Bootstrap, vite
				</li>
				<li class="mt-1 text-sm text-gray-600 dark:text-gray-400">PhpStorm, Agile, OOP, MVC, DRY, KISS,
					Teamwork, AI
				</li>
			</ul>
			<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">📘 @lang('about.3')</p>
			<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">⌨️ @lang('about.4')</p>
			<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">🏅 @lang('about.5')</p>
			<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">🧸 @lang('about.6')</p>
			<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">📖 @lang('about.7')</p>
			<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">📚 @lang('about.8')</p>
			<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">💎 @lang('about.9')</p>
		</div>
	</div>
</x-app-layout>
