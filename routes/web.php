<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth
Route::get('/login', function () {
    return view('auth/login');
});


// Staff Route 
Route::get('/cashier/dashboard', function () {
    return view('staff/cashierdashboard');
});
Route::get('/cashier/history', function () {
    return view('staff/cashierhistory');
});
Route::get('/stock/dashboard', function () {
    return view('staff/stockdashboard');
});
