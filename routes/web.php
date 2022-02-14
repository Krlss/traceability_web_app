<?php

use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\MaterialTypeController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::resource('provider', ProviderController::class)->names('dashboard.provides');

Route::resource('typematerials', MaterialTypeController::class)->names('dashboard.typematerials');

Route::resource('materials', MaterialController::class)->names('dashboard.materials');

Route::resource('clients', ClientController::class)->names('dashboard.clients');
