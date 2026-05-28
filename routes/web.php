<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route(Auth::check() ? 'dashboard' : 'login');
});

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.store');
});

Route::middleware('auth')->group(function (): void {
    Route::get('/dashboard', function () {
        return Inertia::render('Home', [
            'platformName' => 'RideQ',
        ]);
    })->name('dashboard');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
