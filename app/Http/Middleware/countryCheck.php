<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class countryCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user's country is allowed
        $allowedCountries = ['US', 'CA', 'UK', 'IN']; // Example allowed countries
        $userCountry = $request->route('country'); // Assuming the country code is passed as a route parameter

        if (! in_array($userCountry, $allowedCountries)) {
            abort(403, 'Unauthorized');
        } else {
            return response()->json(['message' => 'Your country is allowed to access this route.']);
        }

        return $next($request);
    }
}
