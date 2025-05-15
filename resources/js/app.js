import './bootstrap';

import Alpine from 'alpinejs';
// import jquery
import $ from 'jquery';

window.Alpine = Alpine;

Alpine.start();

window.$ = $;


window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

$(document).ready(function () {
	$('.language').click(function () {
		$('.language').hide();
		$('.close').show();
		$('.language_list').show();
	});

	$('.close').click(function () {
		$('.close').hide();
		$('.language_list').hide();
		$('.language').show();
	});
});

