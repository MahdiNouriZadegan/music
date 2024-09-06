<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SingerController as AdminSingerController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuContentController;
use App\Http\Controllers\PostContentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SingerController as UserSingerController;
use App\Http\Controllers\User\CommentController as UserCommentController;
use App\Http\Controllers\User\FavortieController;
use App\Http\Controllers\User\NewPostController;
use App\Http\Controllers\User\PanelController as UserPanelController;
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
    return view('app.index');
});


Route::middleware('guest')->group(function() {
    Route::group(['prefix'=>'login'], function() {
        Route::get('/', [AuthController::class , 'login'])->name('login');
        Route::post('/store', [AuthController::class , 'login_store'])->name('login_store');
    });
    Route::group(['prefix'=>'register'], function() {
        Route::get('/', [AuthController::class , 'register'])->name('register');
        Route::post('/store', [AuthController::class , 'register_store'])->name('register_store');
    });
});

Route::middleware('auth')->get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('admin')->prefix('admin')->group(function() {
    Route::get('/',[PanelController::class, 'index']);
    Route::resource('/posts', PostController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/singers', AdminSingerController::class);
    Route::resource('/comments', CommentController::class);
    
    Route::group(['prefix'=>'/users'],function() {
        Route::get('/', [UserController::class, 'index']);
        Route::delete('/delete/{id}', [UserController::class, 'delete']);
        Route::post('/permission', [UserController::class, 'permission']);
    });
});

Route::middleware('auth')->prefix('dashboard')->group(function() {
    Route::get('/', [UserPanelController::class, 'index']);
    Route::resource('/comments', UserCommentController::class);
    Route::get('/new', [NewPostController::class, 'index']);
    Route::group(['prefix'=>'/favorites'],function() {
        Route::get('/store', [FavortieController::class, 'index']);
        Route::delete('/delete/{id}', [FavortieController::class, 'delete']);
    });

    Route::group(['prefix'=>'/info'],function() {
        Route::get('/update', [FavortieController::class, 'index']);
    });
    
});

Route::get('/search', SearchController::class);
Route::get('/menu/{menu}', MenuContentController::class);
Route::get('/detail/{post}', PostContentController::class);
Route::get('/singer/{id}', UserSingerController::class);

/* this is just for login with id */
Route::get('login-id', function() {
    auth()->loginUsingId(1);
});