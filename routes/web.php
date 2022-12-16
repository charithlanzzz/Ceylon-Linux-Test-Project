<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;

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
    return view('layout');
});


Route::resources(['customers' => CustomerController::class,]);
Route::post('/get_customer_list', [CustomerController::class, 'getCustomerList']);
Route::resources(['products' => ProductController::class,]);
Route::get('customer-pdf', [CustomerController::class, 'customerPDF']);
