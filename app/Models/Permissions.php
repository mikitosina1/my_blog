<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permissions extends Model
{
	/* @var string $table table title */
	protected $table = 'permissions';

	/**
	 * @return BelongsToMany connection with roles
	 */
	public function roles(): BelongsToMany
	{
		return $this->belongsToMany(Role::class, 'roles');
	}
}
