@vite(['resources/css/dashboard.css','resources/js/pages/dashboard.js'])
@php
	use Nwidart\Modules\Facades\Module;
	$modules = Module::allEnabled();
@endphp

<x-app-layout>
	<x-user-dashboard-module-blocks>
		<div class="cloud">
			<div class="cloud-top">
				@lang('dashboard.dashboard')
			</div>
			<div class="cloud-widgets">
				@foreach ($modules as $module)
					@php
						$viewName = strtolower($module->getName()) . '::dashboard-block';
					@endphp
					@includeIf($viewName)
				@endforeach
			</div>
		</div>
	</x-user-dashboard-module-blocks>
</x-app-layout>

