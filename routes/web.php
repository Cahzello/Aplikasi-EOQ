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

Route::get('/home', [RoutingController::class, 'homePage']);

Route::get('/input-data', [RoutingController::class, 'inputData']);

Route::get('/user-list', [RoutingController::class, 'userPage']);

Route::get('/data', [RoutingController::class, 'showData']);

Route::post('/calculate', [ProductController::class, 'product'])->name('product');

Route::get('/calculate', [ProductController::class, 'redirect'])->name('redirect');

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
