<?php

namespace App\Http\Middleware;

use App\Person;
use Closure;

class RedirectIfSaved
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
        if (Person::check()) {
            return redirect()->route('attendance.create');
        }

        return $next($request);
    }
}
