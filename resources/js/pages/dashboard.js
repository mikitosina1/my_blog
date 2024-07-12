$(document).ready(function() {
	function toggleModule(moduleName, action) {
		fetch(`/module/${action}`, {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json',
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			},
			body: JSON.stringify({module: moduleName})
		})
			.then(response => response.json())
			.then(data => {
				alert(data.message);
				location.reload();
			});
	}
});
