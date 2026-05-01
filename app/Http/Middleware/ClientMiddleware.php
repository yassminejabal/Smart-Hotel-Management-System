<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('Login.create');
        }
        if (Auth::user()->role == 'Client' || Auth::user()->role == 'Admin' || Auth::user()->role =='Receptionniste') {
            return $next($request);
        }
            abort(404);
    }
}