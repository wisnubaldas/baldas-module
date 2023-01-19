<?php
use Illuminate\Support\Facades\Route;
use Wisnubaldas\BaldasModule\App\Controllers\AuthController;

Route::middleware('auth:sanctum')->group( function () {
   Route::post('logout',[AuthController::class, 'logout']);
   Route::get('user', function(){
		return Auth::user();
   });
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

// Route::prefix('auth')->group(function () {
// 	Route::post('signup', [AuthController::class,'signup'])->name('auth.signup');
// 	Route::match(['get', 'post'],'login', [AuthController::class,'login'])->name('login');
// 	Route::post('logout', [AuthController::class,'logout'])->middleware('auth:sanctum')->name('auth.logout');
// 	Route::get('user', [AuthController::class,'getAuthenticatedUser'])->middleware('auth:sanctum')->name('auth.user');

// 	Route::post('/password/email', [AuthController::class,'sendPasswordResetLinkEmail'])->middleware('throttle:5,1')->name('password.email');
// 	Route::post('/password/reset', [AuthController::class,'resetPassword'])->name('password.reset');
// });
