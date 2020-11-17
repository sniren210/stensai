<?php

namespace App\Http\Middleware;

use Closure;

class isGuru
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
        if (auth()->guard('web')->check() || auth()->guard('guru')->check()) {
            return $next($request);
        }
        
        return redirect()->route('home');
    }
}
