<?php

use App\Http\Controllers\BackEnd\ArticleController;
use App\Http\Controllers\BackEnd\CategoryController;
use App\Http\Controllers\BackEnd\DashboardController;
use App\Http\Controllers\BackEnd\UserController;
use App\Http\Controllers\FrontEnd\FrontCategoryController;
use App\Http\Controllers\frontEnd\HomeController;
use App\Http\Controllers\FrontEnd\PostController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/posts', [PostController::class, 'index']);
Route::get('post/{slug}', [PostController::class, 'show']);
Route::post('articles/search', [PostController::class, 'index'])->name('search');
Route::get('/category/{slug}', [FrontCategoryController::class, 'index']);





Route::middleware('auth')->group(function() {


    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('/articles', ArticleController::class);

    Route::resource('/categories', CategoryController::class)->only([
        'index', 'store', 'update', 'destroy'
    ])->middleware('UserAccess:admin');

    Route::resource('/users', UserController::class);

});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
