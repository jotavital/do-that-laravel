<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('register', 'register');
        Route::post('login', 'login');

        Route::get('send-authentication-code', 'sendAuthenticationCode');
    });

    require 'v1/privateRoutes.php';
});

Route::get('/users', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
