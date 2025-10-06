<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Str;

/**
 * UserService
 * Class for creating new users
 */
class UserService
{
	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param StoreUserRequest $request
	 * @return User
	 */
	public function createFromRequest(StoreUserRequest $request): User
	{
		$photo = $this->handleProfilePhoto($request);
		$data = $this->prepareUserData($request->validated(), $photo);

		return User::create($data);
	}

	/**
	 * Handle profile photo upload.
	 *
	 * @param StoreUserRequest $request
	 * @return string
	 */
	private function handleProfilePhoto(StoreUserRequest $request): string
	{
		if ($request->hasFile('profile_photo')) {
			$photo = $request->file('profile_photo');
			$filename = Str::random(40) . '.' . $photo->getClientOriginalExtension();
			$photo->storeAs('profile_photos', $filename, 'public');
			return $filename;
		}

		return 'defUser.jpg';
	}

	/**
	 * Prepare user data for creation.
	 *
	 * @param array $validatedData
	 * @param string $photo
	 * @return array
	 */
	private function prepareUserData(array $validatedData, string $photo): array
	{
		return [
			'name' => $validatedData['name'],
			'lastname' => $validatedData['lastname'] ?? null,
			'email' => $validatedData['email'],
			'email_verified_at' => null,
			'password' => bcrypt($validatedData['password']),
			'profile_photo' => $photo,
			'bio' => $validatedData['bio'] ?? null,
			'ip_address' => request()->ip(),
		];
	}
}
