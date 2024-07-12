@vite(['resources/css/dashboard.css','resources/js/pages/dashboard.js'])
<x-app-layout>
	<div class="carpet">
		<div class="cloud">
			<div class="content-block p-4 sm:p-8 dark:bg-gray-800 shadow sm:rounded-lg mt-8">
				<h1>@lang('manage_modules')</h1>
				@if(!empty(isset($modules)))
					<ul>
						@foreach($modules as $module)
							<li>
								<span>{{ $module->getName() }}</span>
								@if($module->isEnabled())
									<button onclick="toggleModule('{{ $module->getName() }}', 'disable')">Disable</button>
								@else
									<button onclick="toggleModule('{{ $module->getName() }}', 'enable')">Enable</button>
								@endif
							</li>
						@endforeach
					</ul>
				@endif
			</div>
		</div>
	</div>
</x-app-layout>
