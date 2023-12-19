<?php

use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\UserController;
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

    Route::get('/user-profile', [RoutingController::class, 'userProfile']);

    Route::post('/user-profile/update-username', [UserController::class, 'updateUsername'])->name('update_username');

    Route::post('/user-profile/update-password', [UserController::class, 'updatePassword'])->name('update_password');

    Route::delete('/user-profile/delete', [UserController::class, 'delete_acc'])->name('delete_acc');

    Route::get('/input-data', [RoutingController::class, 'inputData']);

    Route::post('/input-data', [ProductController::class, 'store'])->name('store');

    Route::get('/user-list', [RoutingController::class, 'userPage']);

    Route::get('/user-list/{data}', [UserController::class, 'show_data'])->name('show_data');

    Route::post('/user-list/{data}/edit-role', [UserController::class, 'editRole'])->name('edit_role');

    Route::delete('/user-list/{data}/delete', [UserController::class, 'delete_acc_admin_priv'])->name('delete_acc_by_admin');

    Route::get('/data', [RoutingController::class, 'showData']);

    Route::get('/data/{data}', [RoutingController::class, 'listData'])->name('details');

    Route::get('/data/{data}/edit', [RoutingController::class, 'editPage'])->name('edit');

    Route::put('/data/{data}/edit', [ProductController::class, 'update'])->name('update');

    Route::delete('/data/{data}/delete', [ProductController::class, 'delete'])->name('delete');

    Route::post('/logout', [AutentikasiController::class, 'logout'])->name('logout');

    Route::fallback(function () {
        return view('errors.404', [
            'active' => 'err'
        ]);
    });
});

Route::get('/', [AutentikasiController::class, 'showLogin'])->name('showLogin')->middleware('guest');

Route::get('/login', [AutentikasiController::class, 'showLogin'])->name('showLogin')->middleware('guest');

Route::post('/login', [AutentikasiController::class, 'login'])->name('login')->middleware('guest');

Route::get('/register', [AutentikasiController::class, 'showRegister'])->name('showRegis');

Route::post('/register', [AutentikasiController::class, 'register'])->name('register');


Route::any('/{url}', [RoutingController::class, 'no_match'])->where('url', '.*')->middleware('guest');
