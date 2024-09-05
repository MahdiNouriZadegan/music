<?php

use App\Http\Controllers\AuthController;
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
    return view('app.panel.index');
});


Route::middleware('guest')->group(function() {
    Route::group(['prefix'=>'login'], function() {
        Route::get('/', [AuthController::class , 'login'])->name('login');
        Route::get('/store', [AuthController::class , 'login_store'])->name('login_store');
    });
    Route::group(['prefix'=>'register'], function() {
        Route::get('/', [AuthController::class , 'register'])->name('register');
        Route::get('/store', [AuthController::class , 'register_store'])->name('register_store');
    });
});