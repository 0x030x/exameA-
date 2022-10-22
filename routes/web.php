<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\dashboard\dashboardController;

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
    return redirect()->route('login');
});

Route::group(['middleware' => ['Guest']], function () {
    Route::get('/register', [registerController::class, 'index'])->name('register.index');
    Route::post('/register', [registerController::class, 'create'])->name('register.post');

    Route::get('/login', [loginController::class, 'index'])->name('login');
    Route::post('/login', [loginController::class, 'login'])->name('login.post');
});

Route::group(['middleware' => ['auth']], function () {
    Route::post('/update/cv', [dashboardController::class, 'update'])->name('update.cv');

    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/logout', [loginController::class, 'logout'])->name('dashboard.logout');
});
