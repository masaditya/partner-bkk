<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/index');
});

Route::get('/admin', function () {
    return view('pages/admin');
});

Route::get('/login', function () {
    return view('auth.login');
});
