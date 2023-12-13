<?php

use App\Http\Controllers\CalculateController;
use App\Http\Controllers\EoqController;
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

Route::get('/', [RoutingController::class, 'homePage']);

Route::get('/home', [RoutingController::class, 'homePage'])->name('homepage');

Route::get('/input-data', [RoutingController::class, 'inputData']);

Route::post('/input-data', [ProductController::class, 'store'])->name('store');

Route::get('/user-list', [RoutingController::class, 'userPage']);

Route::get('/data', [RoutingController::class, 'showData']);

Route::get('/data/{data}/edit', [RoutingController::class, 'editPage'])->name('edit');

Route::put('/data/{data}/edit', [ProductController::class, 'update'])->name('update');

Route::delete('/data/{data}/delete', [ProductController::class, 'delete'])->name('delete');


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('login');

Route::fallback(function () {
    return view('errors.404', [
        'active' => 'err'
    ]);
});
