<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstallerController;

Route::get('/install', [InstallerController::class, 'index'])->name('install.index');
Route::post('/install/store', [InstallerController::class, 'store'])->name('install.store')->middleware(['web']);
Route::post('/install/verify', [InstallerController::class, 'verify'])->name('install.verify')->middleware(['web']);
Route::post('/install/migrate', [InstallerController::class, 'migrate'])->name('install.migrate')->middleware(['web']);
Route::get('/install/info', [InstallerController::class, 'show'])->name('install.info');
Route::get('/install/congratulations', [InstallerController::class, 'show'])->name('install.congratulations');