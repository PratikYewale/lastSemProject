<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
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
Route::get('/programs', [HomeController::class, 'programs']);
Route::get('/competition', [HomeController::class, 'competition']);
Route::get('/membership', [HomeController::class, 'membership']);
Route::get('/contact', [HomeController::class, 'contact']);
