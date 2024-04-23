<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\Admin\AdminAuthController;
use App\Http\Controllers\v1\Student\StudentAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1/admin', 'as' => 'v1/admin'], function () {

    

    Route::group(['middleware' => ['cors', 'jwt.verify', 'admin']], function () {

        
    });
});

Route::group(['prefix' => 'v1/customer', 'as' => 'v1/customer'], function () {
    Route::group(['middleware' => ['cors', 'jwt.verify', 'member']], function () {

    });
});
