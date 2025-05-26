<?php

use App\Http\Controllers\LoginRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home.home');
})->middleware('auth');

Route::get('/daftarbuku', function () {
    return view('daftarbuku.daftarbuku');
})->middleware('auth');

Route::resource('/loginregister', LoginRegisterController::class)->names([
    'index' => 'login',
])->middleware('guest');

Route::get('/login', [LoginRegisterController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginRegisterController::class, 'login'])->name('login.authenticate');
Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout')->middleware('auth');
