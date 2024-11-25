<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', function () {
    // Mengarahkan berdasarkan role
    if (Auth::check()) {
        $role = Auth::user()->role; // Asumsikan ada kolom 'role' pada tabel users
        if ($role == 'admin') {
            return redirect()->route('home'); // Ganti dengan route dashboard admin
        } elseif ($role == 'pemilik') {
            return redirect()->route('home-owner'); // Ganti dengan route dashboard pemilik
        }
    }
    return redirect()->route('home'); // Jika tidak ada login, atau tidak ada role yang sesuai
})->middleware('auth');

// Route untuk home (admin)
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Route untuk dashboard pemilik
Route::get('/home-owner', [HomeController::class, 'indexPemilik'])->name('home-owner')->middleware('auth');


Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'proses'])->name('login.proses');
Route::get('login/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('users', function() {
    return view('users.index');
})->name('users')->middleware('auth');

Route::get('mobils', function () {
    // Mengarahkan berdasarkan role
    if (Auth::check()) {
        $role = Auth::user()->role; 
        if ($role == 'admin') {
            return view('mobil.index');
        } else {
            return redirect()->route('mobil-owner'); 
        }
    }
})->name('mobil')->middleware('auth');

Route::get('/mobil-owner', function() {
    return view('mobil.indexOwner');
})->name('mobil-owner')->middleware('auth');

Route::get('transaksi', function () {
    // Mengarahkan berdasarkan role
    if (Auth::check()) {
        $role = Auth::user()->role; 
        if ($role == 'admin') {
            return view('transaksi.index');
        } else {
            return redirect()->route('transaksi-owner'); 
        }
    }
})->name('transaksi')->middleware('auth');

Route::get('/transaksi-owner', function() {
    return view('transaksi.indexOwner');
})->name('transaksi-owner')->middleware('auth');

Route::get('laporan', function () {
    // Mengarahkan berdasarkan role
    if (Auth::check()) {
        $role = Auth::user()->role; 
        if ($role == 'admin') {
            return view('laporan.index');
        } else {
            return redirect()->route('laporan-owner'); 
        }
    }
})->name('laporan')->middleware('auth');

Route::get('/laporan-owner', function() {
    return view('laporan.indexOwner');
})->name('laporan-owner')->middleware('auth');



