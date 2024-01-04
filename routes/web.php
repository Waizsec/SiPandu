<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CashflowsController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\UserController;
use Inertia\Inertia;


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
Route::post('/rating', [AuthController::class, 'rating']);


// USER ROUTE
// Dashboard
Route::get('/dashboard', [UserController::class, 'index'])->middleware('auth');

// Finance
Route::get('/finance',  [UserController::class, 'showFinance'])->middleware('auth');
Route::post('/addfinance',  [CashflowsController::class, 'store']);
Route::get('/detailfinance', [CashflowsController::class, 'detail']);
Route::post('/deletefinance', [CashflowsController::class, 'delete']);
Route::post('/updatefinance', [CashflowsController::class, 'update']);

// Report
Route::get('/generate/report', [CashflowsController::class, 'generateReport']);

// Setting
Route::get('/setting', [UserController::class, 'showSetting'])->middleware('auth');



// STAFF ROUTE
// Cashier
Route::get('/cashier/dashboard', [UserController::class, 'showCashier']);
Route::get('/cashier/history', [UserController::class, 'ShowCashierHistory']);
Route::post('/cashier/dashboard/add', [UserController::class, 'updateCart']);
Route::post('/cashier/invoice/reset', [UserController::class, 'resetCart']);
Route::post('/cashier/invoice/create', [InvoiceController::class, 'createInvoice']);

// Invoice 
Route::post('/invoice/delete', [InvoiceController::class, 'deleteInvoice']);
Route::get('/invoice/detail', [InvoiceController::class, 'showDetail']);

// stock
Route::get('/stock/dashboard', [UserController::class, 'showStock']);
Route::post('/add/stock', [StocksController::class, 'addStock']);
Route::get('/stock/detailstock', [StocksController::class, 'detail']);
Route::post('/stock/delete', [StocksController::class, 'delete']);
Route::post('/stock/update', [StocksController::class, 'update']);

// ADMIN ROUTE
Route::get('/admin', [UserController::class, 'getAdmin'])->middleware('auth');;


// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

require __DIR__.'/auth.php';
