@vite(['resources/css/dashboard.css','resources/js/pages/dashboard.js'])
<x-app-layout>
	<div class="carpet">
		<div class="cloud">
			<div class="content-block p-4 sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg mt-8">
				<h1>@lang('manage_modules')</h1>
				@if(!empty(isset($modules)))
					<ul>
						@foreach($modules as $module)
							<li class="mb-3 d-flex align-items-center justify-content-between">
								<span>{{ $module->getName() }}</span>
								<label class="switch">
									<input type="checkbox"
										   onchange="toggleModule('{{ $module->getName() }}', this.checked ? 'enable' : 'disable')"
										{{ $module->isEnabled() ? 'checked' : '' }}>
									<span class="slider"></span>
								</label>
							</li>
						@endforeach
					</ul>
				@endif
			</div>

		</div>
	</div>
</x-app-layout>
