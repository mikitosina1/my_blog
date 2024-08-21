@vite(['resources/css/dashboard.css','resources/js/pages/dashboard.js'])
<x-app-layout>
	<x-dashboard-blocks>
		@include('modulemanager::module_manager_block')
	</x-dashboard-blocks>
</x-app-layout>
