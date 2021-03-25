<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class FavoriteMiddleware
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
        if(!Session::has('favorites'))
            Session::put('favorites',[]);
        return $next($request);
    }
}
