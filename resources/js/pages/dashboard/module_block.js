import './../../bootstrap';
import $ from 'jquery';
window.$ = $;

window.toggleModule = function(moduleName, action) {
	fetch(`/module/${action}`, {
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
