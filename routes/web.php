<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SingerController as AdminSingerController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebsettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuContentController;
use App\Http\Controllers\PostContentController;
use App\Http\Controllers\ReactionController;
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
Route::get('/', HomeController::class);


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
    Route::resource('/tags', TagController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/singers', AdminSingerController::class);
    Route::resource('/websetting', WebsettingController::class);
    // comments
    Route::resource('/comments', CommentController::class);
    Route::get('/comments/change-status/{id}', [CommentController::class, 'change_status']);
    // musics
    Route::resource('/musics', PostController::class);
    Route::group(['prefix'=>'/musics'],function() {
        Route::post('/change-status', [PostController::class, 'change_status']);    
    });

    Route::group(['prefix'=>'/users'],function() {
        Route::get('/', [UserController::class, 'index']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
        Route::get('/permission/{id}', [UserController::class, 'permission']);
    });
});

Route::middleware('auth')->prefix('dashboard')->group(function() {
    Route::get('/', [UserPanelController::class, 'index']);
    Route::resource('/comments', UserCommentController::class);
    Route::get('/new', [NewPostController::class, 'index']);
    Route::group(['prefix'=>'/favorites'],function() {
        Route::get('/store/{id}', [FavortieController::class, 'store']);
        Route::get('/delete/{id}', [FavortieController::class, 'delete']);
    });

    Route::group(['prefix'=>'/info'],function() {
        Route::get('/update', [FavortieController::class, 'index']);
    });
    
});

Route::get('/search', SearchController::class);
Route::post('/reaction/{id}', ReactionController::class);
Route::get('/menu/{menu}', MenuContentController::class);
Route::get('/detail/{post}', PostContentController::class);
Route::get('/singer/{id}', UserSingerController::class);
// control your comments
Route::middleware('auth')->post('comment/store/{id}', [UserCommentController::class,'store']);
Route::post('comment/feedback/{comment_id}', [UserCommentController::class,'store_feedback']);

/* this is just for login with id */
Route::get('login-id', function() {
    auth()->loginUsingId(1);
});