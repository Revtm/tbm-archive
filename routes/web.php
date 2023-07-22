<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\AmalYaumiController;
use App\Http\Controllers\SettingController;
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
Route::post('/user/logout/auth' , [LoginController::class ,'logout'])->middleware('auth');

Route::get('/user/{username}', [UserController::class ,'index'])->name('user')->middleware('auth');
Route::get('/user/{username}/archive/edit/{archiveId}', [UserController::class ,'editArchive'])->middleware('auth');

Route::get('/setting', [SettingController::class ,'index'])->name('setting')->middleware('auth');
Route::post('/setting', [SettingController::class ,'saveSetting'])->middleware('auth');

Route::get('/amalyaumi', [AmalYaumiController::class ,'index'])->name('amalYaumi')->middleware('auth');
Route::post('/amalyaumi', [AmalYaumiController::class ,'saveAmalYaumi'])->middleware('auth');

Route::post('/user/archive', [ArchiveController::class ,'archivePost'])->middleware('auth');
Route::post('/user/archive/edit/t/{archiveType}/i/{archiveId}', [ArchiveController::class ,'editArchive'])->middleware('auth');
Route::post('/user/archive/del/t/{archiveType}/i/{archiveId}', [ArchiveController::class ,'deleteArchive'])->middleware('auth');
