<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::resource('user', UserController::class);
Route::apiResource('country', CountryController::class);

require __DIR__.'/auth.php';
