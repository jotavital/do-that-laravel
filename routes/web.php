<?php

use App\Mail\SendAuthenticationCode;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('mailable')->group(function () {
    Route::get('authentication-code', function () {
        $user = User::first();

        return new SendAuthenticationCode($user, '123456');
    });
});
