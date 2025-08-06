<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Role
 *
 * Main Role class definition
 *
 * @property int    $id basic role id
 * @property string $title role title
 * @property string $created_at when created
 * @property string $updated_at when updated
 *
 * @method static Role|null find(int $id, array $columns = ['*']) find by ID
 * @method static Role|null findOrFail(int $id, array $columns = ['*']) find by ID or throw exception
 * @method static Role|null first(array $columns = ['*']) get first record
 * @method static Role|null firstWhere(string $column, string $operator = null, mixed $value = null, string $boolean = 'and') find by column
 * @method static Builder where(string $column, string $operator = null, mixed $value = null, string $boolean = 'and') add where condition
 */
class Role extends Model
{
	use HasFactory;

	public const ADMIN = 'admin';
	public const USER = 'user';


	/* @var string $table table title */
	protected $table = 'roles';

	/* @var array $fillable fillable fields in a table */
	protected $fillable = [
		'title',
	];

	/**
	 * permissions
	 * get all permissions with this role
	 *
	 * @return BelongsToMany in connection with permissions
	 */
	public function permissions(): BelongsToMany
	{
		return $this->belongsToMany(Permissions::class, 'permissions');
	}

	/**
	 * users
	 * get all users with this role
	 *
	 * @return HasMany in connection with users
	 */
	public function users(): HasMany
	{
		return $this->hasMany(User::class, 'role_id', 'id');
	}

	/**
	 * getRoleTitle
	 *
	 * Return role title by ID
	 *
	 * @param int $role_id
	 * @return string
	 */
	public function getRoleTitle(int $role_id): string
	{
		return self::find($role_id)->title;
	}

	public function isAdmin(): bool
	{
		return $this->title === self::ADMIN;
	}
}
