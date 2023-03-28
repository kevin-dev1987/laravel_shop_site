<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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

//Leave a product review
Route::get('/products/{category:slug}/{product:stock_id}/review', [ProductController::class, 'showPurchaseReview'])->name('review_purchase');

Route::post('/products/{category:slug}/{product:stock_id}/create_review', [ReviewController::class, 'createReview'])->name('create_review');

//Product review helpfulness interaction
Route::post('/review_helpful', [ReviewController::class, 'submitReviewHelpfulness']);

//Report Review
Route::post('/review_report', [ReviewController::class, 'reportReview']);

// AUTH
Route::get('/register', [AuthController::class, 'showRegister'])->middleware('guest')->name('show_register');

Route::post('/create_user', [AuthController::class, 'createUser']);

Route::get('/login', [AuthController::class, 'showLogin'])->middleware('guest')->name('show_login');

Route::post('/authenticate', [AuthController::class, 'authenticate']);


//USERS

//Dashboard/Account
Route::get('/account', [UserController::class, 'account'])->middleware('auth')->name('account');