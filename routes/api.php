<?php

use App\Http\Controllers\JobsController;
use App\Http\Controllers\PlaceController;
use Illuminate\Support\Facades\Route;

Route::prefix('/data')->group(function () {
    Route::get('/', [PlaceController::class, 'list']);
    Route::put('/', [PlaceController::class, 'update']);
    Route::delete('/', [PlaceController::class, 'delete']);
});

Route::get('/jobs', [JobsController::class, 'list']);
