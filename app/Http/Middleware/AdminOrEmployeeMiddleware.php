<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminOrEmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->usertype == 'admin' || $user->usertype == 'employee') {
                return $next($request);
            }
            // Add debug information
            \Log::info('User role does not match admin or employee', ['user_id' => $user->id, 'role' => $user->role]);
        } else {
            // Add debug information
            \Log::info('User is not authenticated');
        }

        return redirect('/homepage')->with('error', 'You do not have access to this section');
    }
}
