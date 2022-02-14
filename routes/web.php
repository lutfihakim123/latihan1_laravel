<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CustomersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('/');


 // auth Conntroller 
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

// Items Controller
Route::get('/items', [ItemsController::class, 'index'])->middleware('auth');
Route::get('/items/add_items', [ItemsController::class, 'create'])->middleware('auth');
Route::post('/items/add_items', [ItemsController::class, 'store'])->middleware('auth');
Route::get('items/edit_items/{id}', [ItemsController::class, 'edit']);
Route::put('items/update_items/{id}', [ItemsController::class, 'update']);
Route::delete('items/delete_items/{id}', [ItemsController::class, 'destroy']);



// Customers Controller 
Route::get('/customers', [CustomersController::class, 'index'])->middleware('auth');
Route::get('/customers/add_customers', [CustomersController::class, 'create'])->middleware('auth');
Route::post('/customers/add_customers', [CustomersController::class, 'store'])->middleware('auth');
Route::get('customers/edit_customers/{id}', [CustomersController::class, 'edit']);
Route::put('customers/update_customers/{id}', [CustomersController::class, 'update']);
Route::delete('customers/delete_customers/{id}', [CustomersController::class, 'destroy']);


// Sales Controller 


Route::get('/sales', [SalesController::class, 'index'])->middleware('auth');
Route::get('/sales/add_sales', [SalesController::class, 'create'])->middleware('auth');
Route::post('/sales/add_sales', [SalesController::class, 'store'])->middleware('auth');
Route::get('sales/edit_sales/{code_transaksi}', [SalesController::class, 'edit']);
Route::put('sales/update_sales/{id}', [SalesController::class, 'update']);
Route::delete('sales/delete_sales/{id}', [SalesController::class, 'destroy']);
Route::get('/findPrice',[SalesController::class, 'findprice']);