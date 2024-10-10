<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyIndustryController;
use App\Http\Controllers\MajorController;
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

// 
Route::get('/master/industry', [CompanyIndustryController::class, 'index'])->name('master.industry.index');
Route::post('/master/industry/store', [CompanyIndustryController::class, 'store'])->name('master.industry.store');
Route::put('master/industry/{id}', [CompanyIndustryController::class, 'update'])->name('master.industry.update');
Route::delete('/master/industry/{id}', [CompanyIndustryController::class, 'destroy'])->name('master.industry.destroy');
//

// 
Route::get('/master/major', [MajorController::class, 'index'])->name('master.major.index');
Route::post('/master/major/store', [MajorController::class, 'store'])->name('master.major.store');
Route::put('master/major/{id}', [MajorController::class, 'update'])->name('master.major.update');
Route::delete('/master/major/{id}', [MajorController::class, 'destroy'])->name('master.major.destroy');
//