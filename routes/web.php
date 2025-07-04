<?php

use App\Http\Controllers\MaterialTypeController;
use App\Http\Controllers\SupplyManagementController;
use App\Http\Controllers\MachineController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    // supply management
    Route::get('/supply-management', [SupplyManagementController::class,'index'])->name('supply-management');
    // Masters
    // material type
    Route::resource('/material-type',MaterialTypeController::class);
    //machines
    Route::resource('/machines',MachineController::class);
});

