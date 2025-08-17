@vite(['resources/css/dashboard.css','resources/js/pages/dashboard.js'])
@php
	use Nwidart\Modules\Facades\Module;
	$modules = Module::allEnabled();
@endphp

<x-app-layout>
	<x-user-dashboard-module-blocks>
		<div class="cloud">
			<div class="dark:bg-gray-900 shadow sm:rounded-lg mt-8 cloud-widgets">
				<h1 class="dark:text-gray-300 cloud-top">
					@lang('dashboard.dashboard'):
				</h1>
				<div class="widgets-container">
					@foreach ($modules as $module)
						@php
							$viewName = strtolower($module->getName()) . '::user.dashboard-block';
						@endphp
						@includeIf($viewName)
					@endforeach
				</div>
			</div>
		</div>
	</x-user-dashboard-module-blocks>
</x-app-layout>
