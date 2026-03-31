<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class elgibleUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is eligible
        if ($age = $request->age < 18) {
            abort(403, 'Unauthorized');
        } else {
            return response()->json(['message' => 'You are eligible to access this route.']);
        }

        return $next($request);
    }
}
