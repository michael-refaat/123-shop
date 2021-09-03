<?php

use Illuminate\Support\Facades\Route;

// using controllers
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\http\Controllers\CreateProductController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/


//products page routes
Route::get('/', [ProductController::class, 'index']);
Route::post('/', [ProductController::class, 'store'])->middleware('auth');
Route::delete('/', [ProductController::class, 'destroy'])->middleware('auth');

//create product routes
Route::get('/create-product', [CreateProductController::class, 'index'])->middleware('auth');
Route::post('/create-product', [CreateProductController::class, 'store'])->middleware('auth');

//cart page routes
Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::get('/cart/{product_id?}', [CartController::class, 'destroy'])->middleware('auth');
Route::get('/clearcart', [CartController::class, 'destroyAll'])->middleware('auth');
Route::delete('/cart', [CartController::class, 'checkout'])->middleware('auth');


require __DIR__.'/auth.php';
