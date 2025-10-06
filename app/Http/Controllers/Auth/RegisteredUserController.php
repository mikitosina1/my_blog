<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\StoreUserRequest;
use App\Services\UserService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
	public function __construct(
		private readonly UserService $userService
	) {}

	/**
	 * Display the registration view.
	 *
	 * @return View
	 */
	public function create(): View
	{
		return view('auth.register');
	}

	/**
	 * Handle an incoming registration request.
	 *
	 * @param StoreUserRequest $request
	 * @return RedirectResponse
	 */
	public function store(StoreUserRequest $request): RedirectResponse
	{
		$user = $this->userService->createFromRequest($request);

		event(new Registered($user));

		Auth::login($user);

		return redirect(RouteServiceProvider::DASHBOARD);
	}
}
