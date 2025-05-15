<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
	/**
	 * Handle an incoming request.
	 *
	 * @param Closure(Request): (Response)  $next
	 */
	public function handle(Request $request, Closure $next): Response
	{
		/* @var User $user */
		$user = Auth::user();
		$role = new Role();

		if (!$user || $role->getRoleTitle($user->role_id) != UserRole::Admin->value) {
			abort(403, 'Access denied');
		}

		return $next($request);
	}
}
