@vite(['resources/css/dashboard.css','resources/js/pages/dashboard.js'])
<x-app-layout>
	<x-btn-back/>
	<div class="dashboard_carpet">
		@include('dashboard_blocks.module_block')
	</div>
</x-app-layout>
