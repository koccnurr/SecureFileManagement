<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Sentinel::check()) {
			return redirect()->route('admin.showLoginForm');
		} else {
			if (Sentinel::inRole('admin')) {
				$onuser = Sentinel::getUser();
				view()->share('onuser', $onuser);
			} else {
				return redirect()->route('admin.showLoginForm');

			}

		}

		return $next($request);
	}
}
