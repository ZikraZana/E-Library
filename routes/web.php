<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DaftarBukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KelolaPenggunaController;

//================ AREA USER GUEST & ADMIN ================//
Route::get('/', function () {
    return view('welcome');
});
Route::get('/daftarbuku', [DaftarBukuController::class, 'tampilDataBukuDaftarBuku'] )->name('tampilDataBukuDaftarBuku');
Route::get('/home', [DaftarBukuController::class, 'tampilDataBukuHome'] )->name('tampilDataBukuHome');

//================ AREA GUEST ================//

// Login Register User
Route::get('loginregister', [UserController::class, 'index'])->name('loginregister')->middleware('guest');
Route::post('/loginregister', [UserController::class, 'store'])->name('loginregister.store');
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.authenticate');

// Logout User
Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');




//================ AREA USER ================//
Route::middleware(['auth'])->group(function () {

    Route::get('/historiuser', function () {
        return view('users.historiuser.historiuser');
    });

    Route::prefix('user')->name('users.')->group(function () {
    Route::resource('peminjaman', PeminjamanController::class);
    });

    Route::get('/peminjaman', function () {
       return view('users.peminjaman.peminjaman');
    })->name('peminjaman');

    Route::get('/profileuser', function () {
        return view('users.profileuser.profileuser');
    });

    // Proses Edit Profile User
    Route::put('/profileuser/{id}', [UserController::class, 'updateProfile'])->name('profileuser.update');
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

    Route::prefix('admin')->name('admins.')->group(function () {
    Route::resource('kelolapinjam', PeminjamanController::class);
    });
    //Route::resource('/admin/kelolapinjam', PeminjamanController::class);

    //Route::get('/admin/kelolapinjam', [PeminjamanController::class, 'index'])->name('peminjaman.index');

    //Route::get('/admin/kelolabuku', [DaftarBukuController::class, 'index'])->name('kelolabuku.index');
    //Route::post('/admin/kelolabuku', [DaftarBukuController::class, 'store'])->name('kelolabuku.store');

    Route::prefix('admin')->as('admins.')->group(function () {
        Route::get('/kelolabuku', [DaftarBukuController::class, 'index'])->name('kelolabuku.index');
        Route::post('/kelolabuku', [DaftarBukuController::class, 'store'])->name('kelolabuku.store');
        Route::put('/kelolabuku/{id}', [DaftarBukuController::class, 'update'])->name('kelolabuku.update');
        Route::delete('/kelolabuku/{id}', [DaftarBukuController::class, 'destroy'])->name('kelolabuku.destroy');
    });


    Route::get('/admin/profileadmin', function () {
        return view('admins.profileadmin.profileadmin');
    });

    Route::get('/admin/kelolapengguna', [KelolaPenggunaController::class, 'index'])->name('kelolapengguna.index');
    Route::delete('/admin/kelolapengguna/{id}', [KelolaPenggunaController::class, 'destroy'])->name('kelolapengguna.destroy');
});
