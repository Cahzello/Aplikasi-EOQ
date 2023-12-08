<?php

use App\Http\Controllers\EoqController;
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


Route::post('/calculate', [EoqController::class, 'calculate'])->name('calculate');

Route::get('/', function () {
    return view('homepage', [
        'active' => 'homepage'
    ]);
});

Route::get('/home', function () {
    return view('homepage', [
        'active' => 'homepage'
    ]);
});

Route::get('/input-data', function () {
    return view('inputdata', [
        'active' => 'Input'
    ]);
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('login');
