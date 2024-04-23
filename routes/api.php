<?php

use App\Http\Controllers\v1\Admin\ContactUsController;
use App\Http\Controllers\v1\Admin\FaqController;
use App\Http\Controllers\v1\Admin\NewsController;
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

    //FAQ
    Route::post('createFaq',[FaqController::class,'createFaq']);
    Route::post('updateFaq',[FaqController::class,'updateFaq']);
    Route::get('getFaq',[FaqController::class,'getFaq']);
    Route::delete('deleteFaq',[FaqController::class,'deleteFaq']);
    Route::get('getFaqById',[FaqController::class,'getFaqById']);
    
    //contactus
    Route::post('addContactUs',[ContactUsController::class,'addContactUs']);
    Route::get('getAllContactUs',[ContactUsController::class,'getAllContactUs']);

    //News
    Route::post('createNews',[NewsController::class,'createNews']);
    Route::post('updateNews',[NewsController::class,'updateNews']);
    Route::get('getAllNews',[NewsController::class,'getAllNews']);
    Route::delete('deleteNews',[NewsController::class,'deleteNews']);
    Route::get('getNewsById',[NewsController::class,'getNewsById']);



    Route::group(['middleware' => ['cors', 'jwt.verify', 'admin']], function () {
        
        
    });
});

Route::group(['prefix' => 'v1/customer', 'as' => 'v1/customer'], function () {

    
});
