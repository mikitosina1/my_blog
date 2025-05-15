<?php

namespace App\Enums;

enum UserRole: string
{
	case Admin = 'admin';
	case User = 'user';

	public function id(): int
	{
		return match ($this) {
			self::Admin => config('roles.admin'),
			self::User => config('roles.user'),
		};
	}
}
