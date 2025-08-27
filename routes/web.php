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
use App\Http\Controllers\FavoritController;
use App\Models\Actor;
use App\Models\Video;
use App\Models\FestivalVideo;
use Illuminate\Support\Facades\Auth;
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
Route::Post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'enter1'])->name('register');
Route::Post('/register', [AuthController::class, 'register'])->name('register1');
Route::get('/reset-password', [AuthController::class, 'enterResetPassword'])->name('reset-password');
Route::get('/home', [VideoController::class, 'home'])->name('home');
Route::get('/', [VideoController::class, 'home'])->name('home');
Route::get('/plan', [SubscriptionController::class, 'plan'])->name('plan');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
///////////////////////////////////// VIDEO////////////////////////////////////////////////////////////////////
Route::get('/video_index', [VideoController::class, 'index'])->name('video-index');
Route::get('/video/{id}', [VideoController::class, 'show'])->name('video.show');
Route::get('/videos/category/{id}', [VideoController::class, 'videosByCategory'])->name('videosbyCategory');
Route::post('/video/{id}/review', [ReviewController::class, 'storeReview'])->name('video.review')->middleware('auth');
Route::post('/create-video', [VideoController::class, 'store'])->name('video.store')->middleware('auth');
Route::get('/video', [VideoController::class, 'create'])->name('video.create')->middleware('auth');
Route::get('/video/{video}/edit', [VideoController::class, 'edit'])->name('video.edit')->middleware('auth');
Route::patch('/video/{video}', [VideoController::class, 'update'])->name('video.update')->middleware('auth');
Route::delete('/video/{id}', [VideoController::class, 'destroy'])->name('video.destroy')->middleware('auth');
///////////////////////////////////// FESTIVAL////////////////////////////////////////////////////////////////////
Route::get('/festival_index', [FestivalController::class, 'index'])->name('festival-index');
Route::get('/festival/{id}', [FestivalController::class, 'show'])->name('festival.show');
///////////////////////////////////// ACTOR////////////////////////////////////////////////////////////////////
Route::get('/actors', [ActorController::class, 'index'])->name('actor.index');
Route::get('/actor/{id}', [ActorController::class, 'show'])->name('actor.show');
///////////////////////////////////// SEARCH////////////////////////////////////////////////////////////////////
Route::get('/search', [SearchController::class, 'search'])->name('video-search');
///////////////////////////////////// Favorit////////////////////////////////////////////////////////////////////
Route::get('/favorite', [FavoritController::class, 'index'])->name('favorite')->middleware('auth');
Route::post('/favorite/{videoId}', [FavoritController::class, 'store'])->name('favorite.add')->middleware('auth');
Route::delete('/favorite/{id}', [FavoritController::class, 'destroy'])->name('favorite.destroy')->middleware('auth');
///////////////////////////////////// PROFILE////////////////////////////////////////////////////////////////////
Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::post('/profile', [UserController::class, 'update'])->name('profile.update')->middleware('auth');

Auth::routes(['register' => false, 'reset' => true, 'verify' => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/{id}/movies', [UserController::class, 'userMovies'])->name('user.movies')->middleware('auth');
