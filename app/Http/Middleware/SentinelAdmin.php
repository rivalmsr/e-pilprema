<?php

namespace App\Http\Middleware;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

use Closure;

class SentinelAdmin
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
        $caption_log = 'You must be logged to view the page';
        $caption_guest = 'You are a customer and cannot access to backend section';
        if (!Sentinel::check()) { // user is not authenticated
            return redirect('login')->with('error', $caption_log);
        }
       if (!Sentinel::inRole('admin')) { // user is authenticated but he is a customer
            return redirect('dashboard')->with('error', 'You are a customer and cannot access to backend section');
        }
        return $next($request);
    }
}
