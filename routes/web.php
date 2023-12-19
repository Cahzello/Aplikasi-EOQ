<?php

use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoutingController;
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

Route::middleware('auth')->group(function () {

    Route::get('/', [RoutingController::class, 'homePage']);

    Route::get('/home', [RoutingController::class, 'homePage'])->name('homepage');

    Route::get('/userProfile', [RoutingController::class, 'userProfile']);

    Route::get('/input-data', [RoutingController::class, 'inputData']);

    Route::post('/input-data', [ProductController::class, 'store'])->name('store');

    Route::get('/user-list', [RoutingController::class, 'userPage']);

    Route::get('/data', [RoutingController::class, 'showData']);

    Route::get('/data/{data}', [RoutingController::class, 'listData'])->name('details');

    Route::get('/data/{data}/edit', [RoutingController::class, 'editPage'])->name('edit');

    Route::put('/data/{data}/edit', [ProductController::class, 'update'])->name('update');

    Route::delete('/data/{data}/delete', [ProductController::class, 'delete'])->name('delete');

    Route::post('/logout', [AutentikasiController::class, 'logout'])->name('logout');
});


Route::get('/login', [AutentikasiController::class, 'showLogin'])->name('showLogin')->middleware('guest');

Route::post('/login', [AutentikasiController::class, 'login'])->name('login')->middleware('guest');

Route::get('/register', [AutentikasiController::class, 'showRegister'])->name('showRegis');

Route::post('/register', [AutentikasiController::class, 'register'])->name('register');


Route::fallback(function () {
    return view('errors.404', [
        'active' => 'err'
    ]);
});

Route::any('{url}', function () {
    return  view('errors.nomatch');
})->where('url', '.*');
