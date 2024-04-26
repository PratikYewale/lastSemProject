<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Http\Controllers\Controller;

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
            if (!$request->user()->role == 'admin') {
                $response = [
                    "success"=>false,
                    "message"=>"Unauthorized access."
                ];
                return response()->json($response, 401);
            }
            return $next($request);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
