<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth/login');
});


// Staff
Route::get('/dashboard', function () {
    return view('staff/stockdashboard');
});
