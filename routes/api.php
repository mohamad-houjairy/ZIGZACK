<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ContentCreatorController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\PaymentController;
// Route::post("register", [AuthController::class, "register"]);

// Route::get("login",[AuthController::class,"login"]);
// Route::apiResource("users", UserController::class);
// Route::apiResource("videos", VideoController::class);
// Route::apiResource("subscriptions", SubscriptionController::class);
// Route::apiResource("content-creators", ContentCreatorController::class);
// Route::apiResource("reviews", ReviewController::class);
// Route::apiResource("payments", PaymentController::class);
// Route::apiResource("categories", CategoryController::class);
// Route::apiResource("actors", ActorController::class);
