<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\DashboardController;

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

Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('services',[ServicesController::class,'index'])->name('services');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//welcome
Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
//logout
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/frontPage', [App\Http\Controllers\FrontPageController::class, 'index'])->name('frontPage');
Route::get('/frontGallery', [App\Http\Controllers\FrontPageController::class, 'gallery'])->name('frontGallery');
