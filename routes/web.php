<?php

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

Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//welcome
Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');

//login
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

//register
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

//logout
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
