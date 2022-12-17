<?php

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

Route::get('/', function () {return view('index');});
Route::get('/index', function () {return view('index');});
Route::resource('items', ItemController::class);
Route::get('/order', [OrderController::class, 'order']);
Route::get('/order/order', [OrderController::class, 'order']);
Route::get('/order/createOrder', [OrderController::class, 'createOrder']);


