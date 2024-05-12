<?php

use App\Http\Controllers\Frontend\auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\RazorpayPaymentController;
use App\Http\Controllers\v1\Customer\ContactUsController;
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
Route::get('/teams', [HomeController::class, 'teams']);
Route::get('/services', [HomeController::class, 'services']);
Route::get('/announcement', [HomeController::class, 'announcement']);
Route::get('/registration', [HomeController::class, 'registration']);
Route::get('/membership', [HomeController::class, 'membership']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/addContactUs', [ContactUsController::class, 'addContactUs'])->name('addContactUs');
Route::post('/addContactUsVerified', [ContactUsController::class, 'addContactUsVerified'])->name('addContactUsVerified');


// News
Route::get('/news', [NewsController::class, 'news']);
Route::get('/news/{id}', [NewsController::class, 'newsDetails'])->name('newsDetails');


// Login
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [MemberController::class, 'loginMember'])->name('loginMember');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/createSponsorship', [SponsorshipController::class, 'createSponsorship'])->name('createSponsorship');
Route::post('/registration', [MemberController::class, 'addAssociationMember'])->name('addAssociationMember');
Route::post('/athleteRegistration', [MemberController::class, 'addAthlete'])->name('addAthlete');
// =============Rozerpay ==============
// web.php



Route::get('/razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('/razorpay-payment', [RazorpayPaymentController::class, 'payment'])->name('payment');

Route::post('/paymentVerification', [MemberController::class, 'paymentVerification'])->name('paymentVerification');