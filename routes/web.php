<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;

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
    return view('auth.login');
})->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::view('/home', 'home')->name('home.index');

    Route::get('/user/{user}', [UserController::class, 'index'])->name('user.index');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('email.update');
    Route::get('/password/{user}', [PasswordController::class, 'index'])->name('password.index');
    Route::put('/password/{user}', [PasswordController::class, 'update'])->name('password.update');
    Route::get('/delete', [UserController::class, 'destroy'])->name('user.destroy');
});
