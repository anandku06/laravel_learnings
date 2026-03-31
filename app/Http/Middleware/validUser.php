<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class validUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is valid
        if (! $request->user() || ! $request->user()->is_valid) {
            abort(403, 'Unauthorized');
        } else {
            return response()->json(['message' => 'You are a valid user and can access this route.']);
        }

        return $next($request);
    }
}
