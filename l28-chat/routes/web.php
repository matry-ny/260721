<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(static function () {
    Route::get('register', fn () => view('guest.register'));
    Route::get('login', fn () => view('guest.login'));

    Route::post('register', [GuestController::class, 'register']);
    Route::post('login', [GuestController::class, 'login']);
});

Route::middleware('auth')->group(static function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('logout', [UserController::class, 'logout']);
});
