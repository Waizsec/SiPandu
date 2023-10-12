<?php

use App\Http\Controllers\CashflowsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

// Auth
Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/staff/login', function () {
    return view('auth/logintoken');
});



// User Route
Route::get('/dashboard', function () {
    return view('user/dashboard');
});
Route::get('/finance',  [CashflowsController::class, 'show']);
Route::get('/setting', function () {
    return view('user/setting');
});

Route::post('/addfinance',  [CashflowsController::class, 'store']);



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
