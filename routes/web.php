<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Stores\StoreController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Dashboard\LandingController;
use App\Http\Controllers\Categories\CategoryController;
use App\Http\Controllers\Brands\BrandController;

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

Route::get('/', [LandingController::class, 'index'])->name('dashboard');

// Stores routes
Route::prefix('/stores/list')->name('stores.')->group(function () {
    Route::get('/',                 [StoreController::class, 'index'])->name('list');
    Route::get('/show/{store}',     [StoreController::class, 'show'])->name('show');
    // Route::group(['middleware' => 'auth'], function () {
    Route::get('/new/',             [StoreController::class, 'create'])->name('create');
    Route::post('/new/',            [StoreController::class, 'store'])->name('store');
    Route::get('/edit/{store}',     [StoreController::class, 'edit'])->name('edit');
    Route::post('/edit/{store}',    [StoreController::class, 'update'])->name('update');
    Route::patch('/remove/{store}', [StoreController::class, 'destroy'])->name('delete');
    // });
});

// Product Categories routes
Route::prefix('/products/categories/list')->name('categories.')->group(function () {
    Route::get('/',                     [CategoryController::class, 'index'])->name('list');
    Route::get('/show/{category}',      [CategoryController::class, 'show'])->name('show');
    // Route::group(['middleware' => 'auth'], function () {
    Route::get('/new/',                 [CategoryController::class, 'create'])->name('create');
    Route::post('/new/',                [CategoryController::class, 'store'])->name('store');
    Route::get('/edit/{category}',      [CategoryController::class, 'edit'])->name('edit');
    Route::post('/edit/{category}',     [CategoryController::class, 'update'])->name('update');
    Route::patch('/remove/{category}',  [CategoryController::class, 'destroy'])->name('delete');
    // });
});

// Brands routes
Route::prefix('/products/brands/list')->name('brands.')->group(function () {
    Route::get('/',                     [BrandController::class, 'index'])->name('list');
    Route::get('/show/{brand}',         [BrandController::class, 'show'])->name('show');
    // Route::group(['middleware' => 'auth'], function () {
    Route::get('/new/',                 [BrandController::class, 'create'])->name('create');
    Route::post('/new/',                [BrandController::class, 'store'])->name('store');
    Route::get('/edit/{brand}',         [BrandController::class, 'edit'])->name('edit');
    Route::post('/edit/{brand}',        [BrandController::class, 'update'])->name('update');
    Route::patch('/remove/{brand}',     [BrandController::class, 'destroy'])->name('delete');
    // });
});

// Product routes
Route::prefix('/products/list')->name('products.')->group(function () {
    Route::get('/',                     [ProductController::class, 'index'])->name('list');
    Route::get('/show/{product}',       [ProductController::class, 'show'])->name('show');
    // Route::group(['middleware' => 'auth'], function () {
    Route::get('/new/',                 [ProductController::class, 'create'])->name('create');
    Route::post('/new/',                [ProductController::class, 'store'])->name('store');
    Route::get('/edit/{product}',       [ProductController::class, 'edit'])->name('edit');
    Route::post('/edit/{product}',      [ProductController::class, 'update'])->name('update');
    Route::patch('/remove/{product}',   [ProductController::class, 'destroy'])->name('delete');
    // });
});
