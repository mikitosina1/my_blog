<nav x-data="{ open: false }" class="">
	<!-- Primary Navigation Menu -->
	<div class="left-nav">
		<!-- Logo -->
		<div class="shrink-0 flex items-center">
			<a href="{{ route('welcome') }}">
				<x-application-logo class="block h-5 w-auto fill-current text-gray-800 dark:text-gray-200"/>
			</a>
		</div>

		<!-- Navigation Links -->
		<div class="space-x-8 sm:-my-px sm:flex nav-link-div">
			<x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
				@lang('aside.home')
			</x-nav-link>
		</div>
		<div class="nav-link-div">
			<x-nav-link :href="route('about')" :active="request()->routeIs('about')">
				@lang('aside.about')
			</x-nav-link>
		</div>
	</div>

	<!-- Hamburger -->
	<div class="-me-2 flex items-center sm:hidden">
		<button @click="open = ! open"
				class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
			<svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
				<path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round"
					  stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
				<path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
					  stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
			</svg>
		</button>
	</div>

	<!-- Responsive Navigation Menu -->
	<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
		<div class="pt-2 pb-3 space-y-1">
			<x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
				@lang('dashboard.dashboard')
			</x-responsive-nav-link>
		</div>

		<!-- Responsive Settings Options -->
		<div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
			<div class="px-4">
				<div class="font-medium text-base text-gray-800 dark:text-gray-200">
					@if (Auth::check())
						<div>{{ Auth::user()->name ?? ''}}</div>
					@endif
				</div>
				<div class="font-medium text-sm text-gray-500">
					@if (Auth::check())
						{{ Auth::user()->email ?? ''}}
					@endif
				</div>
			</div>

			<div class="mt-3 space-y-1">
				<x-responsive-nav-link :href="route('profile.edit')">
					@lang('dashboard.profile')
				</x-responsive-nav-link>

				<!-- Authentication -->
				<form method="POST" action="{{ route('logout') }}">
					@csrf

					<x-responsive-nav-link :href="route('logout')"
										   onclick="event.preventDefault();
                                        this.closest('form').submit();">
						@lang('user_cloud.logout')
					</x-responsive-nav-link>
				</form>
			</div>
		</div>
	</div>
</nav>
