<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(fn() => Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'));

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('schedule', ScheduleController::class);
    Route::resource('signature', SubscribeController::class);

    Route::group(['prefix' => 'checkout'], function () {
        Route::post('/', [App\Http\Controllers\SubscribeController::class, 'checkout'])->name('checkout');
        Route::get('/success', [App\Http\Controllers\SubscribeController::class, 'success'])->name('checkout.success');
        Route::get('/cancel', [App\Http\Controllers\SubscribeController::class, 'cancel'])->name('checkout.cancel');
        Route::get('/webhook', [App\Http\Controllers\SubscribeController::class, 'webhook'])->name('checkout.webhook');
    });
});


Route::resource('portfolio', ScheduleController::class);
Route::get('about', fn() => view('pages.about'))->name('about.index');
