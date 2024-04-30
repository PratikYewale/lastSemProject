<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class athlete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return response()->json(['error' => 'Unauthorized access.'], Response::HTTP_UNAUTHORIZED);
            }
            $role = $user->role;
            if ($role != 'athlete') {
                $response = [
                    "success"=>false,
                    "message"=>"Unauthorized access."
                ];
                return response()->json($response, 401  );
            }
            return $next($request);
        } catch (Exception $e) {
            return response()->json($e->getMessage(),$e->getTrace());
        }
    }
}
