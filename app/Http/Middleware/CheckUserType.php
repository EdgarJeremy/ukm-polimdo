<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        if($request->user()->type !== $type) {
            return redirect()->route($type === 'admin' ? 'wadir-home' : 'admin-home');
        }

        return $next($request);
    }
}