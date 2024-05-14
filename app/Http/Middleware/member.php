<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class member
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $response = [
            'success' => false,
            'message' => 'Unauthenticated User. Please Login',
        ];
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if ($user && $user->role !== 'member') {
                $response['message'] = 'Unauthorized Access. Only admin is allowed.';
                return response()->json($response, 403, [], JSON_NUMERIC_CHECK);
            }
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                $response['message'] = 'Token is Invalid';
                return response()->json($response , 403 ,[],JSON_NUMERIC_CHECK);
            }else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                $response['message'] = 'Token is Expired';
                return response()->json($response , 403 ,[],JSON_NUMERIC_CHECK);
            }else{
                $response['message'] = 'Authorization Token not found';
                return response()->json($response , 401 ,[],JSON_NUMERIC_CHECK);
            }
        }
        return $next($request);
    }
}

