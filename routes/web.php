<?php

use App\Http\Controllers\ActorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\SubscriptionController;
use App\Models\Subscription;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Models\Actor;
use App\Models\Video;
use App\Models\FestivalVideo;
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


Route::Post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/login', [AuthController::class, 'enter'])->name('login');
Route::Post('/login', [AuthController::class, 'login'])->name('authenticate');
Route::get('/register', [AuthController::class, 'enter1'])->name('register');
Route::Post('/register', [AuthController::class, 'register'])->name('register1');
Route::get('/reset-password', [AuthController::class, 'enterResetPassword'])->name('reset-password');
// Route::get('/test', [AuthController::class, 'test'])->name('test');
Route::get('/', [VideoController::class, 'home'])->name('home');


Route::get('/watch-later', [VideoController::class, 'watchLater'])->name('watch-later');
Route::get('/festivals', [FestivalController::class, 'index'])->name('festivals.index');
Route::get('/festivals/{id}', [FestivalController::class, 'show'])->name('festivals.show');
Route::get('/plan', [SubscriptionController::class, 'plan'])->name('plan');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');


///////////////////////////////////// VIDEO////////////////////////////////////////////////////////////////////
Route::get('/video_index', [VideoController::class, 'index'])->name('video-index');
Route::get('/video/{id}', [VideoController::class, 'show'])->name('video.show');
Route::get('/videos/category/{id}', [VideoController::class, 'videosByCategory'])->name('videosbyCategory');
Route::post('/video/{id}/review', [ReviewController::class, 'storeReview'])->name('video.review')->middleware('auth');
///////////////////////////////////// FESTIVAL////////////////////////////////////////////////////////////////////
Route::get('/festival_index', [FestivalController::class, 'index'])->name('festival-index');
Route::get('/festival/{id}', [FestivalController::class, 'show'])->name('festival.show');
///////////////////////////////////// ACTOR////////////////////////////////////////////////////////////////////
Route::get('/actors', [ActorController::class, 'index'])->name('actor.index');
Route::get('/actor/{id}', [ActorController::class, 'show'])->name('actor.show');
///////////////////////////////////// SEARCH////////////////////////////////////////////////////////////////////
Route::get('/search', [SearchController::class, 'search'])->name('video-search');
