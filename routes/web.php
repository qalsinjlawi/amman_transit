<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BusLineController;
use App\Http\Controllers\BusStopController;
use App\Http\Controllers\LineStopController;
use App\Http\Controllers\BusScheduleController;
use App\Http\Controllers\ChatMessageController;
use App\Http\Controllers\StopImageController;
use Illuminate\Support\Facades\Route;

// الصفحة الرئيسية (اختياري)
Route::get('/', function () {
    return view('welcome');
});

// مسارات الموارد (Resources) لكل كنترولر
Route::resource('users', UserController::class);
Route::resource('bus_lines', BusLineController::class);
Route::resource('bus_stops', BusStopController::class);
Route::resource('line_stops', LineStopController::class);
Route::resource('bus_schedules', BusScheduleController::class);
Route::resource('chat_messages', ChatMessageController::class);
Route::resource('stop_images', StopImageController::class);