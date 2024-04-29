<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;

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
            if (!$request->user()->role == 'member') {
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
