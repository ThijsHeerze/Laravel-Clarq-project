<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| The Route::resource method is a RESTful Controller that generates all the basic routes required for an application and can be easily handled using the controller class
| A RESTful resource controller sets up some default routes for you and even names them
*/

Route::resource('tasks', TaskController::class);
Route::resource('users', UserController::class);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('post-login', [LoginController::class, 'postLogin'])->name('login.post');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::resource('categories', CatagoryController::class);
//Route::get('categories', [CategoryController::class, 'index'])->name('categories');
