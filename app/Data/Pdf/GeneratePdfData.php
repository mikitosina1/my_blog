<?php

namespace App\Data\Pdf;

use App\Http\Requests\Pdf\GeneratePdfRequest;

class GeneratePdfData
{
    public function __construct(
        public readonly string $type,
        public readonly string $name,
        public readonly ?string $phone,
        public readonly string $email,
        public readonly string $country,
        public readonly string $city,
        public readonly string $address,
        public readonly string $zip,
        public readonly mixed $profilePhoto,
        public readonly ?string $skills,
        public readonly array $additional,
        public readonly array $experience,
        public readonly array $studying,
        public readonly array $certificates,
    ) {}

    public static function fromRequest(GeneratePdfRequest $request): self
    {
        return new self(
            type: $request->validated('type'),
            name: $request->validated('name'),
            phone: $request->validated('phone'),
            email: $request->validated('email'),
            country: $request->validated('country'),
            city: $request->validated('city'),
            address: $request->validated('address'),
            zip: $request->validated('zip'),
            profilePhoto: $request->file('profile_photo'),
            skills: $request->validated('skills'),
            additional: $request->validated('additional', []),
            experience: $request->validated('experience', []),
            studying: $request->validated('studying', []),
            certificates: $request->validated('certificates', []),
        );
    }
}
