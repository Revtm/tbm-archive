<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class ,'index'])->name('home');
Route::get('/user/login', [LoginController::class ,'index'])->name('login');
Route::post('/user/login/auth', [LoginController::class ,'authenticate'])->name('login');

Route::get('/user/profile/{username}', [UserController::class ,'index'])->name('user')->middleware('auth');
