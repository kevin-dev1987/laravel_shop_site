<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
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
Route::get('/categories', [ProductController::class, 'categories'])->name('categories');

//Products (should always have a 'category' condition)
Route::get('/products', [ProductController::class, 'productsList'])->name('products');