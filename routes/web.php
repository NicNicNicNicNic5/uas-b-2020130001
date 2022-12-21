<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {return view('index');});
// Route::get('/index', function () {return view('index');});

Route::get('/index', [AppController::class, 'index']);
Route::resource('items', ItemController::class);
Route::resource('orders', OrderController::class);

// Route::get('/order', [OrderController::class, 'order']);
// Route::get('/order/order', [OrderController::class, 'order']);
// Route::get('/order/createOrder', [OrderController::class, 'createOrder']);


// Route::get(AppController::class)->group(function () {
//     Route::get('/index', 'index');
//     // Route::post('/orders', 'store');
// });
// Route::controller(AppController::class)->group(function () {
//     Route::get('/index', 'index');
//     // Route::post('/orders', 'store');
// });
