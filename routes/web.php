<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FreeIssueController;

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
Route::get('customer-pdf', [CustomerController::class, 'customerPDF']);


Route::resources(['products' => ProductController::class,]);
Route::post('/get_product_list', [ProductController::class, 'getProductList']);
Route::get('product-pdf', [ProductController::class, 'productPDF']);


Route::resources(['freeissues' => FreeIssueController::class,]);
Route::post('/get_freeissue_list', [FreeIssueController::class, 'getFreeIssueList']);
Route::get('freeissue-pdf', [FreeIssueController::class, 'freeissuePDF']);
