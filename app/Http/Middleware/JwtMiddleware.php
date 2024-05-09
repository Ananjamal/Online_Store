<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     try {
    //         $user = JWTAuth::parseToken()->authenticate();
    //     } catch (\Exception $e) {
    //         if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
    //             return response()->json(['status' => 'Token is Invalid']);
    //         } elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
    //             return response()->json(['status' => 'Token is Expired']);
    //         } else {
    //             return response()->json(['status' => 'Authorization Token not found']);
    //         }
    //     }
    //     return $next($request);
    // }
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['status' => 'Token is Invalid']);
            } elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['status' => 'Token is Expired']);
            } else {
                return response()->json(['status' => 'Authorization Token not found']);
            }
        }

        // Check if the user has the "admin" role
        if (Auth::user()->hasRole('admin')) {
            return $next($request);
        }
        else {
            return response()->json(['status' => 'You are not allowed to access this resource'], 403);
        }
        return $next($request);

    }
}
