<?php

use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

Route::prefix('private')
    // ->middleware('auth:sanctum')
    ->group(function () {
        Route::controller(StatusController::class)->prefix('statuses')->group(function () {
            Route::get('', 'index');
        });
    });
