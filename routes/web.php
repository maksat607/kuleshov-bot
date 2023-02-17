<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\TelegramController;

Route::post(env('TELEGRAM_BOT_TOKEN'), [TelegramController::class, 'handle']);
Route::post('/telegram-bot', 'TelegramController@start');

Route::middleware('splade')->group(function () {
    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('customer/{customer}/chat', [\App\Http\Controllers\CustomerController::class, 'messages'])->name('messages');
    Route::post('/message', [\App\Http\Controllers\MessageController::class,'handleWebhook']);
    Route::middleware('auth')->group(function () {
        Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users');
        Route::get('chat', [\App\Http\Controllers\CustomerController::class, 'chat'])->name('chat');
        Route::get('event', [\App\Http\Controllers\CustomerController::class, 'event']);
        Route::view('page1','page1');
        Route::view('page2','page2');

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['verified'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__ . '/auth.php';
});
