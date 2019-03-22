<?php

namespace App\Http\Middleware;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Closure;

class SentinelVotes
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
        if (!Sentinel::check()) { // user is authenticated
            return redirect('/')->with('error', 'Cant Access the page');
        }
        if (Sentinel::inRole('admin') || Sentinel::inRole('teacher')) {
            return redirect('dashboard')->with('error', 'Cant Access the page');
        }
        return $next($request);
    }
}
