<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 *
 * Main User class definition
 *
 * @property int         $id basic user id
 * @property string      $name user name
 * @property string      $lastname user lastname
 * @property string      $email user email
 * @property string|null $email_verified_at account verified at
 * @property string      $password user password
 * @property string|null $remember_token remember me (hidden)
 * @property string      $profile_photo user photo
 * @property string      $bio few words about user
 * @property int         $role_id user roles id
 * @property string      $ip_address user ip address
 * @property int         $visitor user visitor or not (hidden)
 */
class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $fillable = [
		'name',
		'lastname',
		'email',
		'email_verified_at',
		'password',
		'profile_photo',
		'bio',
		'role_id',
		'ip_address'
	];

	/**
	 * The attributes that should be hidden for serialization.
	 *
	 * @var array<int, string>
	 */
	protected $hidden = [
		'password',
		'remember_token',
		'visitor',
	];

	/**
	 * The attributes that should be cast.
	 *
	 * @var array<string, string>
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
		'password' => 'hashed',
	];

	protected $guarded = ["*", "\\", "drop", "/", "table"];

	public function role(): BelongsTo
	{
		return $this->belongsTo(Role::class, 'role_id', 'id');
	}
}
