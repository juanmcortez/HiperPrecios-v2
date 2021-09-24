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

// Stores routes
Route::prefix('/stores/list')->name('stores.')->group(function () {
    Route::get('/',                 [StoreController::class, 'index'])->name('list');
    Route::get('/show/{store}',     [StoreController::class, 'show'])->name('show');
    Route::get('/edit/{store}',     [StoreController::class, 'edit'])->name('edit');
    Route::post('/edit/{store}',    [StoreController::class, 'update'])->name('update');
    Route::patch('/edit/{store}',   [StoreController::class, 'destroy'])->name('delete');
});
