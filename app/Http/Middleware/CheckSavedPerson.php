<?php

namespace App\Http\Middleware;

use App\Person;
use Closure;

class CheckSavedPerson
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
        if (Person::check() == false) {
            return redirect()->route('person.create');
        }

        return $next($request);
    }
}
