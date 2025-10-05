<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
	/**
	 * Display the registration view.
	 */
	public function create(): View
	{
		return view('auth.register');
	}

	/**
	 * Handle an incoming registration request.
	 *
	 * @throws ValidationException
	 */
	public function store(Request $request): RedirectResponse
	{
		$request->validate($this->getValidationRules());

		$photo = $this->handleProfilePhoto($request);
		$data = $this->prepareUserData($request, $photo);

		$user = User::create($data);

		event(new Registered($user));

		Auth::login($user);

		return redirect(RouteServiceProvider::DASHBOARD);
	}

	/**
	 * getValidationRules
	 * -----------------------------------------------------------------------------------------------------------------
	 * gives rules for validation
	 * @return array
	 */
	public function getValidationRules(): array
	{
		return [
			'name' => 'required|string|max:250|min:3',
			'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
			'password' => ['required', 'confirmed', Rules\Password::defaults()],
		];
	}

	/**
	 * handleProfilePhoto
	 * -----------------------------------------------------------------------------------------------------------------
	 * prepares way for a photo and stores pic if it exists
	 *
	 * @param Request $request
	 * @return ?string
	 */
	private function handleProfilePhoto(Request $request): ?string
	{
		if ($request->hasFile('profile_photo')) {
			$photo = $request->file('profile_photo');
			$filename = Str::random(40) . '.' . $photo->getClientOriginalExtension();
			$photo->storeAs('profile_photos', $filename, 'public');
			return $filename;
		} else {
			return 'defUser.jpg';
		}
	}

	/**
	 * prepareUserData
	 * -----------------------------------------------------------------------------------------------------------------
	 * prepares an array of data for register a new user
	 *
	 * @param Request $request
	 * @param string|null $photo
	 * @return array
	 */
	private function prepareUserData(Request $request, ?string $photo): array
	{
		return [
			'name' => $request->name,
			'lastname' => $request->lastname,
			'email' => $request->email,
			'email_verified_at' => null,
			'password' => $request->password,
			'profile_photo' => $photo,
			'bio' => $request->bio,
			'ip_address' => $request->ip(),
		];
	}
}
