<?php

namespace Hifone\Http\Middleware;

use Closure;
use Illuminate\Http\Request;


class LoginSessionMiddleware
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
		$username = $request->session()->get('username');
		if (!empty($username['username'])){
			return $next($request);
		}
		else{
			header("Location: /auth/login");
		}
    }
}
