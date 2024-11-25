<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\WidgetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/farms', [FarmController::class, 'index'])->name('farms');
Route::get('/devices', [DeviceController::class, 'index'])->name('devices');
Route::get('/widgets/{farm_idx?}', [WidgetController::class, 'index'])->name('widgets')->where(['farm_idx' => '[0-9]+']);
