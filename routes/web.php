<?php

use App\Http\Controllers\BackEnd\ArticleController;
use App\Http\Controllers\BackEnd\CategoryController;
use App\Http\Controllers\BackEnd\DashboardController;
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
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('/articles', ArticleController::class);

Route::resource('/categories', CategoryController::class)->only([
    'index', 'store', 'update', 'destroy'
]);
