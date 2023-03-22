<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index'])->middleware('web')->name('index');

Route::get('/get_offers', [IndexController::class, 'getOffers']);

//List all categories
Route::get('/categories', [ProductController::class, 'categories'])->middleware('web')->name
('categories');


//Products (should always have a 'category' condition)
Route::get('/products/{category:slug}', [ProductController::class, 'productsList'])->middleware('web')->name('products');

//View Product
Route::get('/products/{category:slug}/{product:stock_id}', [ProductController::class, 'viewProduct'])->middleware('web')->name('view_product');


//Product review helpfulness interaction
Route::post('/review_helpful', [ReviewController::class, 'submitReviewHelpfulness']);