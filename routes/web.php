<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HttpController;

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

Route::get('/products', 'ProductController@index');
Route::get('/products/{id}', 'ProductController@show');

Route::resource('products', 'ProductController');

Route::get('/products', 'ProductController@index')->name('products.index');

Route::get('/users/{id}', function ($id) {
    return 'User ' . $id;
})->where('id', '[0-9]+');