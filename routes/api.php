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
use App\Http\Controllers\v1\Admin\DonationController as AdminDonationController;
use App\Http\Controllers\v1\Admin\TeamController;
use App\Http\Controllers\v1\Customer\DonationController;

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

    // Authentication
    Route::post('adminRegister', [AdminAuthController::class, 'adminRegister']);
    Route::post('adminLogin', [AdminAuthController::class, 'adminLogin']);

    Route::group(['middleware' => ['cors', 'jwt.verify', 'admin']], function () {

        // Donation
        Route::get('getAllDonors', [AdminDonationController::class, 'getAllDonors']);

        // Teams
        Route::post('addTeam', [TeamController::class, 'addTeam']);
        Route::post('updateTeam', [TeamController::class, 'updateTeam']);
        Route::get('getAllTeams', [TeamController::class, 'getAllTeams']);
        Route::get('getTeamById', [TeamController::class, 'getTeamById']);
        Route::delete('deleteTeamById', [TeamController::class, 'deleteTeamById']);
        // Team Profiles 
        Route::post('addTeamProfile', [TeamController::class, 'addTeamProfile']);
        Route::post('updateTeamProfile', [TeamController::class, 'updateTeamProfile']);
        Route::get('getAllTeamProfiles', [TeamController::class, 'getAllTeamProfiles']);
        Route::get('getTeamProfileById', [TeamController::class, 'getTeamProfileById']);
        Route::delete('deleteTeamProfileById', [TeamController::class, 'deleteTeamProfileById']);

    });
});

Route::group(['prefix' => 'v1/customer', 'as' => 'v1/customer'], function () {

    // Donation
    Route::post('addDonation', [DonationController::class, 'addDonation']);

    Route::group(['middleware' => ['cors', 'jwt.verify', 'member']], function () {
    });
});
