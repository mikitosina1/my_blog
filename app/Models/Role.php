<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Role
 *
 * Main Role class definition
 *
 * @property int $id basic role id
 * @property string $title role title
 * @property string $created_at when created
 * @property string $updated_at when updated
 */
class Role extends Model
{
	use HasFactory;

	/* @var string $table table title */
	protected $table = 'roles';

	/* @var array $fillable fillable fields in a table */
	protected $fillable = [
		'title',
	];

	/**
	 * @return BelongsToMany in connection with permissions
	 */
	public function permissions(): BelongsToMany
	{
		return $this->belongsToMany(Permissions::class, 'permissions');
	}

	public function users(): HasMany
	{
		return $this->hasMany(User::class, 'role_id', 'id');
	}
}
