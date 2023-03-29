<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clients', ClientController::class);

Route::resource('users', UserController::class);
Route::get('login', [UserController::class, 'loginForm'])->name('loginForm');
Route::post('login-process', [UserController::class, 'login'])->name('login.process');

Route::get('signout', [UserController::class, 'signOut'])->name('signout');
 