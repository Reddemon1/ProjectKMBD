<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, $role): Response
    {
        // Log::info('Checking role: ' . $role);
        $roles = explode(':', $role);

        foreach ($roles as $i) {
            if (Auth::check() && Auth::user()->role == trim($i)) {
                // return abort(403, 'Unauthorized action');
                return $next($request);
            }
        }
        session()->flash('role_check_failed', true);
        return redirect()->back();
    }
}
