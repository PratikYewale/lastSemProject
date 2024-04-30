<?php

use App\Http\Controllers\v1\Admin\EventController;
use App\Http\Controllers\v1\Admin\JobController;
use App\Http\Controllers\v1\Admin\SponsorshipController;
use App\Http\Controllers\v1\Admin\ClubController;
use App\Http\Controllers\v1\Admin\ContactUsController as AdminContactUsController;
use App\Http\Controllers\v1\Admin\FaqController;
use App\Http\Controllers\v1\Admin\MembershipController;
use App\Http\Controllers\v1\Admin\NewsController;
use App\Http\Controllers\v1\Admin\ProgramController;
use App\Http\Controllers\V1\Customer\JobApplicationController;
use App\Http\Controllers\V1\Admin\JobApplicationController as AppliedJobController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\Admin\AdminAuthController;
use App\Http\Controllers\v1\Admin\DonationController as AdminDonationController;
use App\Http\Controllers\v1\Admin\MemberController as AdminMemberController;
use App\Http\Controllers\v1\Admin\TeamController;
use App\Http\Controllers\v1\Customer\ContactUsController;
use App\Http\Controllers\v1\Customer\DonationController;
use App\Http\Controllers\v1\Customer\MemberAuthController;
use App\Http\Controllers\v1\Customer\MemberController;
use App\Http\Controllers\v1\Customer\MembershipController as CustomerMembershipController;

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
    Route::post('forgetPasswordAdmin',[AdminAuthController::class,'forgetPasswordAdmin']);
    Route::post('checkOtpAndLoginEmail',[AdminAuthController::class,'checkOtpAndLoginEmail']);
    Route::post('updatePassword',[AdminAuthController::class,'updatePassword']);
    Route::group(['middleware' => ['cors', 'jwt.verify', 'admin']], function () {
        
        //Auth
        Route::get('getCurrentProfile', [AdminAuthController::class, 'getCurrentProfile']);
        
        // Donation
        Route::get('getAllDonors', [AdminDonationController::class, 'getAllDonors']);
        Route::get('getDonorById', [AdminDonationController::class, 'getDonorById']);
        
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
        // Team Member // Testing Required
        Route::post('addTeamMember', [TeamController::class, 'addTeamMember']);
        Route::post('updateTeamMember', [TeamController::class, 'updateTeamMember']);
        Route::get('getAllTeamMembers', [TeamController::class, 'getAllTeamMembers']);
        Route::get('getTeamMemberById', [TeamController::class, 'getTeamMemberById']);
        Route::delete('deleteTeamMemberById', [TeamController::class, 'deleteTeamMemberById']);
        
        //FAQ
        Route::post('createFaq', [FaqController::class, 'createFaq']);
        Route::post('updateFaq', [FaqController::class, 'updateFaq']);
        Route::get('getAllFaq', [FaqController::class, 'getAllFaq']);
        Route::delete('deleteFaq', [FaqController::class, 'deleteFaq']);
        Route::get('getFaqById', [FaqController::class, 'getFaqById']);
        
        //News
        Route::post('createNews', [NewsController::class, 'createNews']);
        Route::post('updateNews', [NewsController::class, 'updateNews']);
        Route::get('getAllNews', [NewsController::class, 'getAllNews']);
        Route::delete('deleteNews', [NewsController::class, 'deleteNews']);
        Route::get('getNewsById', [NewsController::class, 'getNewsById']);
        
        //Programs
        Route::post('createPrograms', [ProgramController::class, 'createPrograms']);
        Route::post('updateProgram', [ProgramController::class, 'updateProgram']);
        Route::get('getAllProgram', [ProgramController::class, 'getAllProgram']);
        Route::delete('deletePrograms', [ProgramController::class, 'deletePrograms']);
        Route::get('getProgramById', [ProgramController::class, 'getProgramById']);
        
        //Clubs
        Route::post('createClub', [ClubController::class, 'createClub']);
        Route::post('updateClub', [ClubController::class, 'updateClub']);
        Route::get('getAllClub', [ClubController::class, 'getAllClub']);
        Route::delete('deleteClub', [ClubController::class, 'deleteClub']);
        Route::get('getClubById', [ClubController::class, 'getClubById']);
        
        //Membership
        Route::post('createMembership', [MembershipController::class, 'createMembership']);
        Route::post('updateMembership', [MembershipController::class, 'updateMembership']);
        Route::get('getAllMemberships', [MembershipController::class, 'getAllMemberships']);
        Route::delete('deletemembership', [MembershipController::class, 'deletemembership']);
        Route::get('getMembershipById', [MembershipController::class, 'getMembershipById']);
        Route::get('getAllMembershipPayment', [MembershipController::class, 'getAllMembershipPayment']);
        
        //createSponsorship
        Route::post('createSponsorship', [SponsorshipController::class, 'createSponsorship']);
        Route::post('updateSponsorship', [SponsorshipController::class, 'updateSponsorship']);
        Route::get('getAllSponsorship', [SponsorshipController::class, 'getAllSponsorship']);
        Route::delete('deleteSponsorship', [SponsorshipController::class, 'deleteSponsorship']);
        Route::get('getSponsorshipById', [SponsorshipController::class, 'getSponsorshipById']);
        
        // Member
        Route::get('getAllMembers', [AdminMemberController::class, 'getAllMembers']);
        Route::get('getMemberById', [AdminMemberController::class, 'getMemberById']);
        
        //ContactUs
        Route::get('getAllContactUs',[AdminContactUsController::class,'getAllContactUs']);
        Route::get('getContactUsById',[AdminContactUsController::class,'getContactUsById']);
        Route::post('resolveQuery',[AdminContactUsController::class,'resolveQuery']);
        
        //Event
        Route::post('createEvent',[EventController::class,'createEvent']);
        Route::post('updateEvent',[EventController::class,'updateEvent']);
        Route::get('getAllEvents',[EventController::class,'getAllEvents']);
        Route::delete('deleteEvent',[EventController::class,'deleteEvent']);
        Route::get('getEventById',[EventController::class,'getEventById']);
        
        
        //job
        Route::post('createJob',[JobController::class,'createJob']);
        Route::delete('deleteJob',[JobController::class,'deleteJob']);
        Route::get('getJobById',[JobController::class,'getJobById']);
        Route::get('getAllJob',[JobController::class,'getAllJob']);
        Route::post('updateJob',[JobController::class,'updateJob']);
        
        //JobApplication
        Route::get('getJobApplicationByJobId',[AppliedJobController::class,'getJobApplicationByJobId']);
        Route::get('getJobApplicationById',[AppliedJobController::class,'getJobApplicationById']);
    });
});

Route::group(['prefix' => 'v1/customer', 'as' => 'v1/customer'], function () {
    // Member
    Route::post('addMember', [MemberController::class, 'addMember']);
    Route::post('loginMember', [MemberController::class, 'loginMember']);
    
    // Auth
    Route::post('forgetPasswordMember',[MemberAuthController::class,'forgetPasswordMember']);
    Route::post('checkOtpAndVerify',[MemberAuthController::class,'checkOtpAndVerify']);
    Route::post('updatePassword',[MemberAuthController::class,'updatePassword']);
    
    // Donation
    Route::post('addDonation', [DonationController::class, 'addDonation']);
    Route::post('donationPaymentVerification', [DonationController::class, 'donationPaymentVerification']);
    
    // Contact Us
    Route::post('addContactUs', [ContactUsController::class, 'addContactUs']);
    
    // Membership
    Route::get('getAllMemberships', [CustomerMembershipController::class, 'getAllMemberships']);
    Route::get('getMembershipById', [CustomerMembershipController::class, 'getMembershipById']);

    //JobApplication
    Route::post('addJobApplication',[JobApplicationController::class,'addJobApplication']);
    
    
    Route::group(['middleware' => ['cors', 'jwt.verify', 'member']], function () {
        
        //Athlete Registration
        Route::post('athleteRegistration',[MemberController::class,'athleteRegistration']);
        Route::post('paymentVerification',[MemberController::class,'paymentVerification']);
    });



    Route::group(['middleware' => ['cors', 'jwt.verify', 'athlete']], function () {

    });
});
