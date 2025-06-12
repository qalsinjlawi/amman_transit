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


/*
|--------------------------------------------------------------------------
| Bus Stops Routes
|--------------------------------------------------------------------------
*/
Route::get('/bus-stops', [BusStopController::class, 'index'])->name('bus_stops.index');
Route::get('/bus-stops/{busStop}', [BusStopController::class, 'show'])->name('bus_stops.show');

/*
|--------------------------------------------------------------------------
| Bus Lines Routes
|--------------------------------------------------------------------------
*/
Route::get('/bus-lines', [BusLineController::class, 'index'])->name('bus_lines.index');
Route::get('/bus-lines/{busLine}', [BusLineController::class, 'show'])->name('bus_lines.show');

// Bus Schedules 
Route::get('/schedules', [BusScheduleController::class, 'index'])->name('bus_schedules.index');
Route::get('/schedules/{busSchedule}', [BusScheduleController::class, 'show'])->name('bus_schedules.show');

// Line Stops 
Route::get('/line-stops', [LineStopController::class, 'index'])->name('line_stops.index');
Route::get('/line-stops/{lineStop}', [LineStopController::class, 'show'])->name('line_stops.show');

// Stop Images 
Route::get('/gallery', [StopImageController::class, 'index'])->name('stop_images.index');
Route::get('/gallery/{stopImage}', [StopImageController::class, 'show'])->name('stop_images.show');