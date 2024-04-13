<?php

use App\Http\Controllers\StatusController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::prefix('private')
    // ->middleware('auth:sanctum')
    ->group(function () {
        Route::controller(StatusController::class)->prefix('statuses')->group(function () {
            Route::get('', 'index');
        });

        Route::controller(TaskController::class)->prefix('tasks')->group(function () {
            Route::get('', 'getTasksByStatus');

            Route::prefix('{task}')->group(function () {
                Route::put('move', 'moveTask');
            });
        });
    });
