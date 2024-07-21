@vite(['resources/css/dashboard.css','resources/js/pages/dashboard.js'])
<x-app-layout>
	<div class="carpet">
		@include('dashboard_blocks.module_block')
	</div>
</x-app-layout>
