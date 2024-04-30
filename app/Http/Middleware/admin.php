<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): JsonResponse
    {
        
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return response()->json(['error' => 'Unauthorized access.'], Response::HTTP_UNAUTHORIZED);
            }
            $role = $user->role;
            if ($role != 'admin') {
                $response = [
                    "success"=>false,
                    "message"=>"Unauthorized access."
                ];
                return response()->json($response, 401);
            }
            return $next($request);
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                $response['message'] = 'Token is Invalid';
                return response()->json($response, 403, [], JSON_NUMERIC_CHECK);
            }
            return response()->json($e->getMessage());
        }
    }
}
