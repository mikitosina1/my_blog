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
     */
    public function createFromRequest(StoreUserRequest $request): User
    {
        $photo = $this->handleProfilePhoto($request);
        $data = $this->prepareUserData($request->validated(), $photo);

        return User::create($data);
    }

    /**
     * Handle profile photo upload.
     */
    private function handleProfilePhoto(StoreUserRequest $request): string
    {
        if ($request->hasFile('profile_photo')) {
            $photo = $request->file('profile_photo');
            $filename = Str::random(40).'.'.$photo->getClientOriginalExtension();
            $photo->storeAs('profile_photos', $filename, 'public');

            return $filename;
        }

        return 'defUser.jpg';
    }

    /**
     * Prepare user data for creation.
     */
    private function prepareUserData(array $validatedData, string $photo): array
    {
        return [
            'name' => $validatedData['name'],
            'lastname' => $validatedData['lastname'] ?? '',
            'email' => $validatedData['email'],
            'email_verified_at' => null,
            'password' => bcrypt($validatedData['password']),
            'profile_photo' => $photo,
            'bio' => $validatedData['bio'] ?? '',
            'ip_address' => request()->ip(),
        ];
    }
}
