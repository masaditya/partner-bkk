<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/index');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::put('admin/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::put('admin/update-password/{id}', [AdminController::class, 'updatePassword'])->name('admin.update.password');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

