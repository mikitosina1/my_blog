<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Roles extends Model
{
	use HasFactory;
	/* @var string $table table title */
	protected $table = 'roles';

	/* @var array $fillable fillable fields in table */
	protected $fillable = [
		'role',
	];

	/**
	 * @return BelongsToMany connection with permissions
	 */
	public function permissions(): BelongsToMany
	{
		return $this->belongsToMany(Permissions::class,'permissions');
	}
}
