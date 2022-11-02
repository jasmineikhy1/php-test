<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ExpiredPasswordController;
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

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::middleware(['password_expired'])->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');

        Route::middleware(['role:customer|customer_admin'])->group(function () {
            Route::get('/customer', function () {
                return view('welcome.customer');
            })->name('welcome.customer');
        });

        Route::middleware(['role:admin|customer_admin'])->group(function () {
            Route::get('/admin', function () {
                return view('welcome.admin');
            })->name('welcome.admin');
        });

        Route::middleware(['role:customer_admin'])->group(function () {
            Route::get('/customer-admin', function () {
                return view('welcome.customer-admin');
            })->name('welcome.customer-admin');
        });
    });

    Route::prefix('password')->group(function () {
        Route::get('/expired', [ExpiredPasswordController::class, 'expired'])->name('password.expired');
        Route::get('/post_expired', [ExpiredPasswordController::class, 'postExpired'])->name('password.post_expired');
    });
});
