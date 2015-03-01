<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class UserEditMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user = Auth::user();

		if(!($user->editusers || $user->admin)) {
			return redirect()->route('users.loginform')->withErrors(['email' => 'Sie haben nicht die nötigen Rechte, diese Seite aufzurufen.']);
		}


		return $next($request);
	}

}
