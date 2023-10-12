<?php

use App\Http\Controllers\CashflowsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



// Auth

// Display
Route::get('/register', function () {
    return view('/auth/register');
});
Route::get('/', function () {
    return view('auth/login');
})->name('login');
Route::get('/staff/login', function () {
    return view('auth/logintoken');
});

// Process
Route::post('/register/auth', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout']);
Route::post('/updatestatus', [UserController::class, 'updateStatus']);



// User Route
// Dashboard
Route::get('/dashboard', [UserController::class, 'index'])->middleware('auth');
Route::get('/finance',  [CashflowsController::class, 'show'])->middleware('auth');
Route::get('/setting', [UserController::class, 'showSetting'])->middleware('auth');

// Finance
Route::post('/addfinance',  [CashflowsController::class, 'store']);
Route::get('/detailfinance', [CashflowsController::class, 'detail']);
Route::post('/deletefinance', [CashflowsController::class, 'delete']);



// Staff Route 

Route::get('/cashier/dashboard', function () {
    return view('staff/cashierdashboard');
});
Route::get('/cashier/history', function () {
    return view('staff/cashierhistory');
});

// stock
Route::get('/stock/dashboard', function () {
    return view('staff/stockdashboard');
});
