<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BusLineController;
use App\Http\Controllers\BusStopController;
use App\Http\Controllers\LineStopController;
use App\Http\Controllers\BusScheduleController;
use App\Http\Controllers\ChatMessageController;
use App\Http\Controllers\StopImageController;
use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// الصفحة الرئيسية (اختياري)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/faq', [HomeController::class, 'faq'])->name('home.faq');
Route::get('/home/stations', [HomeController::class, 'stations'])->name('home.stations');
Route::get('/home/lines', [HomeController::class, 'lines'])->name('home.lines');
Route::get('/home/schedules', [HomeController::class, 'schedules'])->name('home.schedules');
Route::get('/home/line-stops', [HomeController::class, 'lineStops'])->name('home.lineStops');

Route::post('/api/search', [HomeController::class, 'quickSearch']);
Route::post('/contact/send', [HomeController::class, 'sendContactMessage'])->name('contact.send');


// مسارات الموارد (Resources) لكل كنترولر
Route::resource('users', UserController::class);
Route::resource('bus_lines', BusLineController::class);
Route::resource('bus_stops', BusStopController::class);
Route::resource('line_stops', LineStopController::class);
Route::resource('bus_schedules', BusScheduleController::class);
Route::resource('chat_messages', ChatMessageController::class);
Route::resource('stop_images', StopImageController::class);
Route::get('/login', function () {
    return view('auth.login'); // استبدل باسم العرض المناسب لتسجيل الدخول
});

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
/*
|--------------------------------------------------------------------------
| Stations Routes (New Unified Routes)
|--------------------------------------------------------------------------
*/
// في ملف routes/web.php
Route::get('/stations', [StationController::class, 'index'])->name('stations.index');
Route::get('/stations/{station}', [StationController::class, 'show'])->name('stations.show');
Route::get('/stations/{station}/edit', [StationController::class, 'edit'])->name('stations.edit');