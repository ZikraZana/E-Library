<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginRegisterController;



//================ AREA USER GUEST & ADMIN ================//
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('users.home.index');
});
Route::get('/daftarbuku', function () {
    return view('users.daftarbuku.index');
});

//================ AREA GUEST ================//

// Login Register User
Route::get('loginregister', [LoginRegisterController::class, 'index'])->name('loginregister')->middleware('guest');
Route::post('/loginregister', [LoginRegisterController::class, 'store'])->name('loginregister.store');
Route::get('/login', [LoginRegisterController::class, 'index'])->name('login');
Route::post('/login', [LoginRegisterController::class, 'login'])->name('login.authenticate');

// Logout User
Route::post('/logout', [LoginRegisterController::class, 'logout'])->name('logout')->middleware('auth');




//================ AREA USER ================//
Route::middleware(['auth'])->group(function () {

    Route::get('/historiuser', function () {
        return view('users.historiuser.historiuser');
    });

    Route::get('/peminjaman', function () {
        return view('users.peminjaman.peminjaman');
    });

    Route::get('/pengembalian', function () {
        return view('users.pengembalian.pengembalian');
    });

    Route::get('/profileuser', function () {
        return view('users.profileuser.profileuser');
    });

});


//================ AREA ADMIN ================//
// Login untuk admin
Route::get('/login/admin', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login/admin', [AdminController::class, 'login'])->name('admin.login.post');
// Logout untuk admin
Route::post('/logout/admin', [AdminController::class, 'logout'])->name('admin.logout')->middleware('admin');

// Area Admin
Route::middleware(['admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admins.dashboard.homeadmin');
    });

    Route::get('/admin/daftarpeminjaman', function () {
        return view('admins.daftarpeminjaman.daftarpeminjaman');
    });

    Route::get('/admin/detailpeminjaman', function () {
        return view('admins.daftarpeminjaman.detailpeminjaman');
    });

    Route::get('/admin/kelolabuku', function () {
        return view('admins.kelolabuku.kelolabuku');
    });

    Route::get('/admin/profileadmin', function () {
        return view('admins.profileadmin.profileadmin');
    });
});
