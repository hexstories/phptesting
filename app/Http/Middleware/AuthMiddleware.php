<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('sanctum')->user(); // Get the user from the token

        if ($user) {
            // Token is valid
            return $next($request);
        } else {
            // Token is invalid or not present
            return response()->json(['response_message' => 'Authentication Error'], 401);
        }
    }
}
