<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfStaffFullyRegistered
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

        error_log('I am here');
        /*Trying to access staff routes without registration*/
        if (Auth::user()->staff->is_fully_registered == 0) {
            return redirect('/staff/fill-details');
        }

        return $next($request);
    }
}
