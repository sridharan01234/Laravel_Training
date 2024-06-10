<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HttpController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return 'About Us Page';
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return 'User Profile';
    });
});

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{id}/edit', [ProductController::class,'edit']);

Route::get('/products/{id}/delete', [ProductController::class,'delete']);

Route::get('/products/create', [ProductController::class,'create']);

Route::get('/products/store', [ProductController::class,'store']);

Route::get('/products/update', [ProductController::class,'update']);

Route::get('/products/destroy', [ProductController::class,'destroy']);

Route::get('products/sendmail', [ProductController::class,'sendEmail']);
