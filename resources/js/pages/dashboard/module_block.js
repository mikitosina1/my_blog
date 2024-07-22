import './../../bootstrap';
import $ from 'jquery';
window.$ = $;


window.toggleModule = function(moduleName, action) {
	console.log('MN',moduleName, 'MA', action)
	const url = action === 'enable' ? '/module/enable' : '/module/disable';

	fetch(url, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json',
			'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
		},
		body: JSON.stringify({module: moduleName})
	})
		.then(response => response.json())
		.then(data => {
			alert(data.message);
			location.reload();
		})
		.catch(error => console.error('Error:', error));
}
