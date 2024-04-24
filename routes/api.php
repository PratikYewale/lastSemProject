<?php

use App\Http\Controllers\v1\Admin\SponsorshipController;
use App\Http\Controllers\v1\Admin\ClubController;
use App\Http\Controllers\v1\Admin\ContactUsController;
use App\Http\Controllers\v1\Admin\FaqController;
use App\Http\Controllers\v1\Admin\MembershipController;
use App\Http\Controllers\v1\Admin\NewsController;
use App\Http\Controllers\v1\Admin\ProgramController;
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

    //Programs
    Route::post('createPrograms',[ProgramController::class,'createPrograms']);
    Route::post('updateProgram',[ProgramController::class,'updateProgram']);
    Route::get('getAllProgram',[ProgramController::class,'getAllProgram']);
    Route::delete('deletePrograms',[ProgramController::class,'deletePrograms']);
    Route::get('getProgramById',[ProgramController::class,'getProgramById']);

    //Clubs
    Route::post('createClub',[ClubController::class,'createClub']);
    Route::post('updateClub',[ClubController::class,'updateClub']);
    Route::get('getAllClub',[ClubController::class,'getAllClub']);
    Route::delete('deleteClub',[ClubController::class,'deleteClub']);
    Route::get('getClubById',[ClubController::class,'getClubById']);

    //Membership
    Route::post('createMembership',[MembershipController::class,'createMembership']);
    Route::post('updateMembership',[MembershipController::class,'updateMembership']);
    Route::get('getAllMemberships',[MembershipController::class,'getAllMemberships']);
    Route::delete('deletemembership',[MembershipController::class,'deletemembership']);
    Route::get('getMembershipById',[MembershipController::class,'getMembershipById']);

    //createSponsorship
    Route::post('createSponsorship',[SponsorshipController::class,'createSponsorship']);
    Route::post('updateSponsorship',[SponsorshipController::class,'updateSponsorship']);
    Route::get('getAllSponsorship',[SponsorshipController::class,'getAllSponsorship']);
    Route::delete('deleteSponsorship',[SponsorshipController::class,'deleteSponsorship']);
    Route::get('getSponsorshipById',[SponsorshipController::class,'getSponsorshipById']);


    Route::group(['middleware' => ['cors', 'jwt.verify', 'admin']], function () {
        
        
    });
});

Route::group(['prefix' => 'v1/customer', 'as' => 'v1/customer'], function () {

    
});
