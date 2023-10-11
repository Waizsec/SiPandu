<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

// Auth
Route::get('/login', function () {
    return view('auth/login');
});


// User Route
Route::get('/dashboard', function () {
    return view('user/dashboard');
});
Route::get('/finance', function () {
    return view('user/finance');
});
Route::get('/setting', function () {
    return view('user/setting');
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
