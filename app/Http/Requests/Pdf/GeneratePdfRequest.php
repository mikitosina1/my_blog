<?php

namespace App\Http\Requests\Pdf;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GeneratePdfRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'type' => [
                'required',
                'string',
                Rule::in(['Resume', 'Experience']),
            ],

            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],

            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:50'],

            'profile_photo' => [
                'nullable',
                'image',
                'max:2048',
            ],

            'skills' => ['nullable', 'string'],

            'additional' => ['nullable', 'array'],
            'additional.*' => ['string', 'max:255'],

            'experience' => ['nullable', 'array'],
            'experience.*.title' => ['nullable', 'string', 'max:255'],
            'experience.*.description' => ['nullable', 'string'],

            'studying' => ['nullable', 'array'],
            'studying.*.title' => ['nullable', 'string', 'max:255'],
            'studying.*.description' => ['nullable', 'string'],

            'certificates' => ['nullable', 'array'],
            'certificates.*.title' => ['nullable', 'string', 'max:255'],
            'certificates.*.description' => ['nullable', 'string'],
        ];
    }
}
