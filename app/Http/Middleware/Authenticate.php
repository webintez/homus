<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Check which guard is being used based on the route
        if ($request->is('customer/*')) {
            return route('customer.login');
        } elseif ($request->is('technician/*')) {
            return route('technician.login');
        } elseif ($request->is('admin/*')) {
            return route('admin.login');
        }
        
        // Default fallback
        return route('customer.login');
    }

    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next, ...$guards)
    {
        // If no guards are specified, determine the guard based on the route
        if (empty($guards)) {
            if ($request->is('customer/*')) {
                $guards = ['customer'];
            } elseif ($request->is('technician/*')) {
                $guards = ['technician'];
            } elseif ($request->is('admin/*')) {
                $guards = ['web'];
            } else {
                $guards = ['customer'];
            }
        }

        return parent::handle($request, $next, ...$guards);
    }
}
