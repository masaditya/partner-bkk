<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PartnerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/index');
});

Route::get('/login', function () {
    return view('auth.login');
});

// 
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::put('admin/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::put('admin/update-password/{id}', [AdminController::class, 'updatePassword'])->name('admin.update.password');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
// 

// 
Route::get('/partner', [PartnerController::class, 'index'])->name('partner.index');
Route::post('/partner/store', [PartnerController::class, 'store'])->name('partner.store');
Route::put('partner/{id}', [PartnerController::class, 'update'])->name('partner.update');
Route::put('partner/update-password/{id}', [PartnerController::class, 'updatePassword'])->name('partner.update.password');
Route::delete('/partner/{id}', [PartnerController::class, 'destroy'])->name('partner.destroy');
// 
