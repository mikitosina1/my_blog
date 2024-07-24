@if (Route::has('login'))
	<div class="logged-panel sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
		@if (url()->current() !== url('/'))
			<a href="{{ url()->previous() }}"
			   class="btn_back font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">@lang('aside.back')</a>
		@endif
		@auth
			<!-- Settings Dropdown -->
			<div class="settings">
				<x-dropdown align="right" width="48">
					<x-slot name="trigger">
						<button
							class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
							<div>
								{{ Auth::user()->name ?? ''}}
							</div>

							<div class="ms-1">
								<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
									 viewBox="0 0 20 20">
									<path fill-rule="evenodd"
										  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
										  clip-rule="evenodd"/>
								</svg>
							</div>
						</button>
					</x-slot>

					<x-slot name="content">
						<x-dropdown-link :href="route('profile.edit')">
							@lang('dashboard.profile')
						</x-dropdown-link>

						<!-- Authentication -->
						<form method="POST" action="{{ route('logout') }}">
							@csrf

							<x-dropdown-link :href="route('logout')"
											 onclick="event.preventDefault();
												this.closest('form').submit();">
								@lang('user_cloud.logout')
							</x-dropdown-link>
						</form>
					</x-slot>
				</x-dropdown>
			</div>
		@endauth

		@auth
			<a href="{{ url('/dashboard') }}"
			   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">@lang('dashboard.dashboard')</a>
		@else
			<a href="{{ route('login') }}"
			   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">@lang('user_cloud.login')</a>

			@if (Route::has('register'))
				<a href="{{ route('register') }}"
				   class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">@lang('user_cloud.register')</a>
			@endif
		@endauth
	</div>
@endif
