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
            if($request->user()->type === 'admin') {
                return redirect()->route('admin-home');
            } elseif($request->user()->type === 'wadir') {
                return redirect()->route('wadir-home');
            } elseif($request->user()->type === 'super') {
                return redirect()->route('super-home');
            }
        }

        return $next($request);
    }
}
