<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashflowsController;
use App\Http\Controllers\StocksController;
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
Route::post('/register/auth', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/staff/logout', [AuthController::class, 'logoutStaff']);
Route::post('/updatestatus', [AuthController::class, 'updateStatus']);
Route::post('/staff/login/auth', [AuthController::class, 'loginStaff']);


// USER ROUTE
// Dashboard
Route::get('/dashboard', [UserController::class, 'index'])->middleware('auth');

// Finance
Route::get('/finance',  [UserController::class, 'showFinance'])->middleware('auth');
Route::post('/addfinance',  [CashflowsController::class, 'store']);
Route::get('/detailfinance', [CashflowsController::class, 'detail']);
Route::post('/deletefinance', [CashflowsController::class, 'delete']);
Route::post('/updatefinance', [CashflowsController::class, 'update']);

// Setting
Route::get('/setting', [UserController::class, 'showSetting'])->middleware('auth');



// STAFF ROUTE
// Cashier
Route::get('/cashier/dashboard', [UserController::class, 'showCashier']);
Route::get('/cashier/history', function () {
    return view('staff/cashierhistory');
});

// stock
Route::get('/stock/dashboard', [UserController::class, 'showStock']);
Route::post('/add/stock', [StocksController::class, 'addStock']);
Route::get('/stock/detailstock', [StocksController::class, 'detail']);
Route::post('/stock/delete', [StocksController::class, 'delete']);
Route::post('/stock/update', [StocksController::class, 'update']);