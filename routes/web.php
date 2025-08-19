<?php

use App\Http\Controllers\ActorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\SubscriptionController;
use App\Models\Subscription;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::Post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/login', [AuthController::class, 'enter'])->name('login');
Route::Post('/login', [AuthController::class, 'login'])->name('authenticate');
Route::get('/register', [AuthController::class, 'enter1'])->name('register');
Route::Post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/reset-password', [AuthController::class, 'enterResetPassword'])->name('reset-password');
// Route::get('/test', [AuthController::class, 'test'])->name('test');
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/actor-info', [ActorController::class, 'info'])->name('actor-info');
Route::get('/video_info', [VideoController::class, 'info'])->name('video_info');
Route::get('/watch-later', [VideoController::class, 'watchLater'])->name('watch-later');
Route::get('/festivals', [FestivalController::class, 'index'])->name('festivals.index');
Route::get('/festivals/{id}', [FestivalController::class, 'show'])->name('festivals.show');
Route::get('/plan', [SubscriptionController::class, 'plan'])->name('plan');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
