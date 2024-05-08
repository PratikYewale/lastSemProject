<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\NewsController;

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

// News
Route::get('/news', [NewsController::class, 'news']);
Route::get('/news/{id}', [NewsController::class, 'newsDetails'])->name('newsDetails');
