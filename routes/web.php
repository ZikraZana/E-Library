<?php

use App\Http\Controllers\LoginRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home.home');
});

Route::get('/daftarbuku', function () {
    return view('daftarbuku.daftarbuku');
});

Route::resource('/loginregister', LoginRegisterController::class);