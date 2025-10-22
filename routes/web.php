<?php

declare(strict_types = 1);

use App\Http\Controllers\Memory\FlashCardController;
use App\Http\Controllers\Onboarding\BillingController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn() => Inertia::render('Welcome'))->name('home');

Route::group(['middleware' => ['auth', 'verified']], function (): void {
    Route::get('dashboard', fn() => Inertia::render('Dashboard'))->name('dashboard');

    Route::resource('flashcards', FlashCardController::class)->only(['store', 'index']);

    // Group Onboarding
    Route::group(['prefix' => 'onboarding', 'as' => 'onboarding.'], function (): void {
        Route::resource('subscriptions', BillingController::class);
    });

});

require __DIR__ . '/settings.php';

require __DIR__ . '/auth.php';
