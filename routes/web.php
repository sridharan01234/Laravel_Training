<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HttpController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PasswordController;

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

Route::get('/laravel/test', function () {
    return view('test');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        return 'User Profile';
    });
});

Route::get('user/login', [UserController::class,'login']);

Route::get('user/profile', [UserController::class, 'profile']);

Route::get('/user/{id}', function ($id) {
    return view('user', ['id' => $id]);
});

Route::get('hello', function () {
    return response()
            ->view('hello', [], 200)
            ->header('Content-Type', 'view');
});