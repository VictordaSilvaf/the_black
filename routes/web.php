<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/dashboard', function () {
    if (!auth()->user()->hasRole('Super-Admin')) {
        return redirect()->route('home');
    }

    return view('pages.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('schedule', ScheduleController::class);
    Route::resource('signature', SubscribeController::class);

    Route::group(['prefix' => 'checkout'], function () {
        Route::post('/', [App\Http\Controllers\SubscribeController::class, 'checkout'])->name('checkout');
        Route::get('/success', [App\Http\Controllers\SubscribeController::class, 'success'])->name('checkout.success');
        Route::get('/cancel', [App\Http\Controllers\SubscribeController::class, 'cancel'])->name('checkout.cancel');
        Route::get('/webhook', [App\Http\Controllers\SubscribeController::class, 'webhook'])->name('checkout.webhook');
    });

    Route::post('schedule/search', [ScheduleController::class, 'search'])->name('schedule.search');
});


Route::resource('portfolio', ScheduleController::class);
Route::get('about', fn() => view('pages.about'))->name('about.index');
