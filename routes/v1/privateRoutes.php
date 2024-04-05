<?php

use Illuminate\Support\Facades\Route;

Route::prefix('private')->middleware('auth:sanctum')->group(function () {
    Route::get('example', function () {
        return response()->json('helo');
    });
});
