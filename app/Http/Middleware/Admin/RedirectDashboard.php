<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class RedirectDashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Sentinel::check()) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
