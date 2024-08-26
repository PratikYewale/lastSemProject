<?php

use App\Http\Controllers\Frontend\AfterLoginPagesController;
use App\Http\Controllers\Frontend\auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\RazorpayPaymentController;
use App\Http\Controllers\Frontend\TeamController;
use App\Http\Controllers\v1\Customer\ContactUsController;
use App\Http\Controllers\v1\Customer\DonationController;
use App\Http\Controllers\v1\Customer\MemberController;
use App\Http\Controllers\v1\Customer\SponsorshipController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
/*






*/
Route::get('/', [HomeController::class, 'index']);
Route::get('/donate', [HomeController::class, 'donate']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/forgotpassword', [HomeController::class, 'forgotpassword']);

Route::get('/teams', [TeamController::class, 'teams']);
Route::get('/teamDetails/{id}', [TeamController::class, 'teamDetails'])->name('teamDetails');
Route::get('/services', [HomeController::class, 'services']);
Route::get('/announcement', [HomeController::class, 'announcement']);
// Route::get('/registration', [HomeController::class, 'registration']);
Route::get('/membership', [HomeController::class, 'membership']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/events', [HomeController::class, 'events']);
Route::get('/pastevents', [HomeController::class, 'pastevents']);

Route::post('/addContactUs', [ContactUsController::class, 'addContactUs'])->name('addContactUs');
Route::post('/addContactUsVerified', [ContactUsController::class, 'addContactUsVerified'])->name('addContactUsVerified');


// News
Route::get('/news', [NewsController::class, 'news']);
Route::get('/announcement/{id}', [NewsController::class, 'announcementDetails'])->name('announcementDetails');
Route::get('/registration/associationRegistration', [NewsController::class, 'association']);
Route::get('/registration/athletesRegistration', [NewsController::class, 'athletes']);
Route::get('/registration/sponsorshipRegistration', [NewsController::class, 'sponsorship']);

//forgot password

// Route::post('/forgotpassword', [MemberController::class, 'updatePassword'])->name('updatePassword');
// Route::post('/checkOtpAndLoginEmail', [MemberController::class, 'checkOtpAndLoginEmail'])->name('checkOtpAndLoginEmail');
// Route::post('/forgotpassword', [MemberController::class, 'forgetPasswordAdmin'])->name('forgetPasswordAdmin');

Route::post('/forget-password', [MemberController::class, 'forgetPasswordAdmin'])->name('forgetPasswordAdmin');
Route::post('/check-otp', [MemberController::class, 'checkOtpAndLoginEmail'])->name('checkOtpAndLoginEmail');
Route::post('/reset-password', [MemberController::class, 'updatePassword'])->name('updatePassword');


// Login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [MemberController::class, 'loginMember'])->name('loginMember');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/createSponsorship', [SponsorshipController::class, 'createSponsorship'])->name('createSponsorship');

// =============Rozerpay ==============
// web.php


Route::post('/registration', [MemberController::class, 'addAssociationMember'])->name('addAssociationMember');
Route::post('/athleteRegistration', [MemberController::class, 'addAthlete'])->name('addAthlete');
Route::post('/edit-profile-athlete', [MemberController::class, 'updateAthlete'])->name('updateAthlete');
Route::post('/edit-profile-association', [MemberController::class, 'updateAssociationMember'])->name('updateAssociationMember');
Route::post('/donate', [DonationController::class, 'addDonation'])->name('addDonation');

Route::get('/razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('/razorpay-payment', [RazorpayPaymentController::class, 'payment'])->name('payment');

Route::post('/paymentVerification', [MemberController::class, 'paymentVerification'])->name('paymentVerification');

// After Login Pages Routes
Route::get('/media-gallery', [AfterLoginPagesController::class, 'mediaGallery']);
Route::get('/userAchivements', [AfterLoginPagesController::class, 'userAchivements']);
Route::get('/editAchivement', [AfterLoginPagesController::class, 'editAchivement']);
Route::get('/profile', [AfterLoginPagesController::class, 'profile']);
// Route::get('/about', [HomeController::class, 'showPdfImage']);
