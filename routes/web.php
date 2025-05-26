<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/loginregister', function () {
    return view('loginregister.loginregister');
});

Route::get('/home', function () {
    return view('home.home');
});

Route::get('/daftarbuku', function () {
    return view('daftarbuku.daftarbuku');
});