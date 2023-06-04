<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\SignUpController;
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

Route::get('/home', [HomeController::class ,'index'])->name('home')->middleware('auth');
Route::get('/', [LoginController::class ,'index'])->name('login');
Route::get('/register', [SignUpController::class ,'index'])->name('registerWeb');
Route::post('/register', [SignUpController::class ,'signUpWeb']);
Route::post('/user/login/auth', [LoginController::class ,'authenticate']);
Route::post('/user/logout/auth' , [LoginController::class ,'logout']);

Route::get('/user/profile/{username}', [UserController::class ,'index'])->name('user')->middleware('auth');
Route::post('/user/archive', [ArchiveController::class ,'archivePost'])->middleware('auth');
