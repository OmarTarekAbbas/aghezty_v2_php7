<?php

namespace App\Http\Middleware;

use Closure;

class CheckLocale
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
        if ($request->locale != 'en' && $request->locale != 'ar') {
            return back();
        }
        \App::setLocale($request->locale);
        return $next($request);
    }
}
