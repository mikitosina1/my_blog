<?php

namespace App\Http\Resource;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

/**
 * UserResource
 *
 * @mixin User
 */
class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'role' => $this->role?->title,
            'profile_photo' => $this->profile_photo
                ? Storage::url('profile_photos/'.$this->profile_photo)
                : null,
        ];
    }
}
