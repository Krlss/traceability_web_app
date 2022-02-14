<?php

use App\Http\Controllers\ProviderController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::resource('provider', ProviderController::class)->names('dashboard.provides');