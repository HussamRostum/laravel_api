<?php

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Buyer\BuyerController;
use App\Http\Controllers\Buyer\BuyerTransactionController;
use App\Http\Controllers\Buyer\BuyerProductController;
use App\Http\Controllers\Buyer\BuyerSellerControllerr;
use App\Http\Controllers\Buyer\BuyerCategoryController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Seller\SellerTransactionController;
use App\Http\Controllers\Seller\SellerCategoryController;
use App\Http\Controllers\Seller\SellerBuyerController;
use App\Http\Controllers\Seller\SellerProductController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Category\CategoryProductController;
use App\Http\Controllers\Category\CategorSellerController;
use App\Http\Controllers\Category\CategorTransactionController;
use App\Http\Controllers\Category\CategorBuyerController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\ProductBuyerTransactionController;
use App\Http\Controllers\Product\ProductTransactionController;
use App\Http\Controllers\Product\ProductCategoryController;
use App\Http\Controllers\Product\ProductBuyerController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Controllers\Transaction\TransactionCategoyController;
use App\Http\Controllers\Transaction\TransactionSellerController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Buyers
 */
Route::resource('buyers', BuyerController::class, ['only' => ['index', 'show']]);
Route::resource('buyers.sellers', BuyerSellerControllerr::class, ['only' => ['index']]);
Route::resource('buyers.products', BuyerProductController::class, ['only' => ['index']]);
Route::resource('buyers.categories', BuyerCategoryController::class, ['only' => ['index']]);
Route::resource('buyers.transactions', BuyerTransactionController::class, ['only' => ['index']]);

/**
 * Categories
 */
Route::resource('categories', CategoryController::class);
Route::resource('categories.buyers', CategorBuyerController::class, ['only' => ['index']]);
Route::resource('categories.sellers', CategorSellerController::class, ['only' => ['index']]);
Route::resource('categories.products', CategoryProductController::class, ['only' => ['index']]);
Route::resource('categories.transactions', CategorTransactionController::class, ['only' => ['index']]);

/**
 * Products
 */
Route::resource('products', ProductController::class);
Route::resource('products.buyers', ProductBuyerController::class, ['only' => ['index']]);
Route::resource('products.categories', ProductCategoryController::class, ['only' => ['index', 'update', 'destroy']]);
Route::resource('products.transactions', ProductTransactionController::class, ['only' => ['index']]);
Route::resource('products.buyers.transactions', ProductBuyerTransactionController::class, ['only' => ['store']]);

/**
 * Sellers
 */
Route::resource('sellers', SellerController::class, ['only' => ['index', 'show']]);
Route::resource('sellers.buyers',SellerBuyerController::class, ['only' => ['index']]);
Route::resource('sellers.products', SellerProductController::class, ['except' => ['create', 'show', 'edit']]);
Route::resource('sellers.categories', SellerCategoryController::class, ['only' => ['index']]);
Route::resource('sellers.transactions', SellerTransactionController::class, ['only' => ['index']]);

/**
 * Transactions
 */
Route::resource('transactions', TransactionController::class);
Route::resource('transactions.categories', TransactionCategoyController::class, ['only' => ['index']]);
Route::resource('transactions.sellers', TransactionSellerController::class, ['only' => ['index']]);

/**
 * Users
 */
Route::name('me')->get('users/me', 'User\UserController@me');
Route::resource('users', UserController::class);
Route::name('verify')->get('users/verify/{token}', 'User\UserController@verify');
Route::name('resend')->get('users/{user}/resend', 'User\UserController@resend');

Route::post('oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');

