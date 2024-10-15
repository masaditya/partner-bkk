<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyIndustryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\EmploymentStatusesController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\OccupationsController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {

        Route::get('/', [DefaultController::class, 'index']);

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // chart stats Alumni
        Route::get('/getIndustryData', [DashboardController::class, 'getIndustryData']);
        Route::get('/getStatusData', [DashboardController::class, 'getStatusData']);
        Route::get('/getPartnerIndustryData', [DashboardController::class, 'getPartnerIndustryData']);
        // Chart Stats umum
        Route::get('/user-growth-data', [DashboardController::class, 'getUserGrowthData']);
        Route::get('/education-data', [DashboardController::class, 'getEducationData']);
        Route::get('/applicants-data', [DashboardController::class, 'getApplicantsData']);
        Route::get('/gender-distribution', [DashboardController::class, 'getGenderDistribution']);

        Route::get('/profile', function () {
            return view('pages.profile');
        })->name('profile');

        Route::post('/profile/update', [AdminProfileController::class, 'update'])->name('profile.update');
        Route::post('/profile/update-password', [AdminProfileController::class, 'updatePassword'])->name('update.password');

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
        Route::get('partners/export-excel', [PartnerController::class, 'exportExcel'])->name('partners.export.excel');
        Route::get('partners/export-pdf', [PartnerController::class, 'exportPDF'])->name('partners.export.pdf');
        // 

        // 
        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
        Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('user/update-password/{id}', [UserController::class, 'updatePassword'])->name('user.update.password');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('user/export-excel', [UserController::class, 'exportExcel'])->name('user.export.excel');
        Route::get('user/export-pdf', [UserController::class, 'exportPDF'])->name('user.export.pdf');
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

        // 
        Route::get('/master/status', [EmploymentStatusesController::class, 'index'])->name('master.status.index');
        Route::post('/master/status/store', [EmploymentStatusesController::class, 'store'])->name('master.status.store');
        Route::put('master/status/{id}', [EmploymentStatusesController::class, 'update'])->name('master.status.update');
        Route::delete('/master/status/{id}', [EmploymentStatusesController::class, 'destroy'])->name('master.status.destroy');
        //

        // 
        Route::get('/master/category', [CategoryController::class, 'index'])->name('master.category.index');
        Route::post('/master/category/store', [CategoryController::class, 'store'])->name('master.category.store');
        Route::put('master/category/{id}', [CategoryController::class, 'update'])->name('master.category.update');
        Route::delete('/master/category/{id}', [CategoryController::class, 'destroy'])->name('master.category.destroy');
        //

        // 
        Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
        Route::put('/setting/{id}', [SettingController::class, 'update'])->name('setting.update');
        //

        // 
        Route::get('/occupation', [OccupationsController::class, 'index'])->name('occupation.index');
        Route::get('occupation/create', [OccupationsController::class, 'create'])->name('occupation.create');
        Route::post('/occupation/store', [OccupationsController::class, 'store'])->name('occupation.store');
        Route::put('occupation/{id}', [OccupationsController::class, 'update'])->name('occupation.update');
        Route::get('/occupation/{id}/edit', [OccupationsController::class, 'edit'])->name('occupation.edit');
        Route::put('occupation/update-password/{id}', [OccupationsController::class, 'updatePassword'])->name('occupation.update.password');
        Route::delete('/occupation/{id}', [OccupationsController::class, 'destroy'])->name('occupation.destroy');
        Route::get('occupation/export-excel', [OccupationsController::class, 'exportExcel'])->name('occupation.export.excel');
        Route::get('occupation/export-pdf', [OccupationsController::class, 'exportPDF'])->name('occupation.export.pdf');
        // 

        // 
        Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
        Route::get('article/create', [ArticleController::class, 'create'])->name('article.create');
        Route::post('/article/store', [ArticleController::class, 'store'])->name('article.store');
        Route::put('article/{id}', [ArticleController::class, 'update'])->name('article.update');
        Route::get('/article/{id}/edit', [ArticleController::class, 'edit'])->name('article.edit');
        Route::delete('/article/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
        // 

        // 
        Route::get('/applicant', [ApplicantController::class, 'index'])->name('applicant.index');
        Route::get('/applicant/{id}/detail', [ApplicantController::class, 'detail'])->name('applicant.detail');
        Route::get('applicant/export-excel', [ApplicantController::class, 'exportExcel'])->name('applicant.export.excel');
        Route::get('applicant/export-pdf', [ApplicantController::class, 'exportPDF'])->name('applicant.export.pdf');
        // 
    });
