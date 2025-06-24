<?php

use App\Http\Controllers\Memory\FlashCardController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');


Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');


        Route::resource('flashcards', FlashCardController::class)->only(['store', 'index']);

});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
