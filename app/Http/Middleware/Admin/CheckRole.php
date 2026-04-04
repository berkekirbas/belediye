<?php

namespace App\Http\Middleware\Admin;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Sentinel::check() && Sentinel::inRole('admin')) {
            return $next($request);
        }
        return redirect()->route('dashboard')->with('error', 'Bu sayfaya erişim yetkiniz bulunmamaktadır.');
    }
}
