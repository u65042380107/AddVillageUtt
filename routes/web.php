<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VillageController;

Route::get('/', [VillageController::class, 'index'])->name('villages.index');
Route::post('/villages', [VillageController::class, 'store'])->name('villages.store');
Route::get('/get-sub-districts/{district}', [VillageController::class, 'getSubDistricts']);

