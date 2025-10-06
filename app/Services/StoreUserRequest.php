<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

/**
 * StoreUserRequest
 * Class for validating user data
 *
 */
class StoreUserRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, ValidationRule|array|string>
	 */
	public function rules(): array
	{
		return [
			'name' => 'required|string|max:250|min:3',
			'lastname' => 'nullable|string|max:250',
			'email' => [
				'required',
				'string',
				'lowercase',
				'email',
				'max:255',
				'unique:' . User::class
			],
			'password' => ['required', 'confirmed', Rules\Password::defaults()],
			'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
			'bio' => 'nullable|string|max:500',
		];
	}
}
