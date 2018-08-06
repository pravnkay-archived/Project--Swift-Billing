<?php

namespace App\Http\Middleware;

use Closure;

class AuthUser
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if($request->user() === null) {
			return redirect('login');
		} else {
			$request->user()->authorizeRoles(['admin', 'user']);
			return $next($request);
		}

		
	}
}
