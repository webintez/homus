<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceMode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if maintenance mode is enabled
        if (Setting::get('maintenance_mode', false)) {
            // Allow admin routes to pass through
            if ($request->is('admin/*')) {
                return $next($request);
            }
            
            // Redirect all other routes to maintenance page
            return redirect()->route('maintenance');
        }

        return $next($request);
    }
}
