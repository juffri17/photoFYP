<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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
    return redirect(route('frontPage'));
});

Route::get('/account-login', function () {
    return view('/auth/login');
});

Route::get('/account-register', function () {
    return view('/auth/register');
});

Auth::routes();

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('/services',[ServicesController::class,'index'])->name('services');
Route::get('/services/create',[ServicesController::class,'create'])->name('services.create');
Route::post('/services/store',[ServicesController::class,'store'])->name('services.store');
Route::get('/services/edit/{id}',[ServicesController::class,'edit'])->name('services.edit');
Route::post('/services/update',[ServicesController::class,'update'])->name('services.update');
Route::post('/services/delete',[ServicesController::class,'delete'])->name('services.delete');
Route::post('/services/view',[ServicesController::class,'view'])->name('services.view');

Route::get('/bookings',[App\Http\Controllers\BookingsController::class,'index'])->name('bookings');
Route::post('/bookings/store',[App\Http\Controllers\BookingsController::class,'store'])->name('bookings.store');
Route::post('/bookings/cancel',[App\Http\Controllers\BookingsController::class,'cancel'])->name('bookings.cancel');
Route::post('/bookings/progress',[App\Http\Controllers\BookingsController::class,'progress'])->name('bookings.progress');
Route::post('/bookings/payment',[App\Http\Controllers\BookingsController::class,'payment'])->name('bookings.payment');

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//welcome
Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
//logout
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/frontPage', [App\Http\Controllers\FrontPageController::class, 'index'])->name('frontPage');
Route::get('/frontGallery', [App\Http\Controllers\FrontPageController::class, 'gallery'])->name('frontGallery');
Route::get('/frontAbout', [App\Http\Controllers\FrontPageController::class, 'about'])->name('frontAbout');
Route::get('/frontContact', [App\Http\Controllers\FrontPageController::class, 'contact'])->name('frontContact');
