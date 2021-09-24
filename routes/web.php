<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Stores\StoreController;
use App\Http\Controllers\Dashboard\LandingController;

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


Route::get('/stores/list-detail', [StoreController::class, 'index'])->name('stores.list');
Route::get('/stores/list-detail/show/{store}', [StoreController::class, 'show'])->name('stores.show');
Route::get('/stores/list-detail/edit/{store}', [StoreController::class, 'edit'])->name('stores.edit');
Route::post('/stores/list-detail/edit/{store}', [StoreController::class, 'update'])->name('stores.update');
Route::patch('/stores/list-detail/delete/{store}', [StoreController::class, 'destroy'])->name('stores.delete');
