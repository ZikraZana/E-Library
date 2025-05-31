<?php

use App\Http\Controllers\LoginRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('users.home.index');
});

Route::get('/daftarbuku', function () {
    return view('users.daftarbuku.index');
})->middleware('auth');


// Login Register User
Route::get('loginregister', [LoginRegisterController::class, 'index'])->name('loginregister')->middleware('guest');
Route::post('/loginregister', [LoginRegisterController::class, 'store'])->name('loginregister.store');

Route::get('/login', [LoginRegisterController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginRegisterController::class, 'login'])->name('login.authenticate');
Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout')->middleware('auth');
