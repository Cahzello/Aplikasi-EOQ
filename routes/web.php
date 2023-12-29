<?php

use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\RekapanController;
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

    // homepage

    Route::get('/', [RoutingController::class, 'homePage']);

    Route::get('/home', [RoutingController::class, 'homePage'])->name('homepage');

    // user profile

    Route::get('/user-profile', [RoutingController::class, 'userProfile']);

    Route::post('/user-profile/update-username', [UserController::class, 'updateUsername'])->name('update_username');

    Route::post('/user-profile/update-password', [UserController::class, 'updatePassword'])->name('update_password');

    Route::delete('/user-profile/delete', [UserController::class, 'delete_acc'])->name('delete_acc');

    // input data 

    Route::get('/input-data', [RoutingController::class, 'inputData']);
    
    Route::post('/input-data', [ItemController::class, 'store'])->name('store');

    // rekapan data

    Route::get('/rekapan-bulanan', [RoutingController::class, 'rekapan']);

    Route::get('/rekapan-bulanan/data/{data}', [RoutingController::class, 'details'])->name('detail_rekapan');
    
    // CRU rekapan data

    Route::get('/rekapan-bulanan/create/{data_item}', [RekapanController::class, 'view_store'])->name('rekapan_view_store');

    Route::post('/rekapan-bulanan/create/{data_item}', [RekapanController::class, 'store'])->name('rekapan_store');

    Route::get('/rekapan-bulanan/edit/{record}', [RekapanController::class, 'view_edit'])->name('rekapan_view_edit');

    Route::post('/rekapan-bulanan/edit/{record}', [RekapanController::class, 'edit'])->name('rekapan_edit');

    //CRUD data hasil perhitungan

    Route::get('/rekapan-bulanan/eoq/{data}', [PerhitunganController::class, 'store'])->name('perhitungan.store');


    // Edit nama bahan baku, hapus bahan baku
    
    Route::get('/rekapan-bulanan/edit-bahanbaku/{item}', [ItemController::class, 'view_edit'])->name('item_view_edit');

    Route::post('/rekapan-bulanan/edit-bahanbaku/{item}', [ItemController::class, 'edit'])->name('item_edit');

    Route::delete('/rekapan-bulanan/delete/{item}', [ItemController::class, 'destroy'])->name('item_delete');

    // list of user 

    Route::get('/user-list', [RoutingController::class, 'userPage']);

    Route::get('/user-list/{data}', [UserController::class, 'show_data'])->name('show_data');

    Route::post('/user-list/{data}/edit-role', [UserController::class, 'editRole'])->name('edit_role');

    Route::delete('/user-list/{data}/delete', [UserController::class, 'delete_acc_admin_priv'])->name('delete_acc_by_admin');

    // showing the data

    Route::get('/data', [RoutingController::class, 'showData']);

    Route::get('/data/{data}', [RoutingController::class, 'listData'])->name('details');

    Route::get('/data/{data}/edit', [RoutingController::class, 'editPage'])->name('edit');

    Route::delete('/data/eoq/{item}', [PerhitunganController::class, 'delete'])->name('perhitungan.delete');
    
    // logout 

    Route::post('/logout', [AutentikasiController::class, 'logout'])->name('logout');

    
});

Route::fallback(function () {
    return view('errors.404', [
        'active' => 'err'
    ]);
});

Route::get('/', [AutentikasiController::class, 'login'])->name('showLogin')->middleware('guest');

Route::get('/login', [AutentikasiController::class, 'login'])->name('login')->middleware('guest');

Route::post('/login', [AutentikasiController::class, 'login_validate'])->name('login_validate')->middleware('guest');

Route::get('/register', [AutentikasiController::class, 'showRegister'])->name('showRegis');

Route::post('/register', [AutentikasiController::class, 'register'])->name('register');

