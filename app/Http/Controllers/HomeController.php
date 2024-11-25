<?php

namespace App\Http\Controllers;

use App\Models\mobil;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $data['user'] = User::count();
        $data['mobil'] = mobil::count();
        $data['transaksi'] = transaksi::where('status', 'Finish')->sum('total');
        return view('home', $data);
    }

    public function indexPemilik() {
        // Halaman home untuk pemilik, hanya data mobil dan transaksi miliknya
        $userId = auth()->id(); // Mendapatkan ID pengguna yang sedang login (pemilik)
        
        $data['mobil'] = mobil::where('user_id', $userId)->count(); // Hanya mobil milik pemilik
        $data['transaksi'] = transaksi::where('user_id', $userId)
                                        ->where('status', 'Finish')
                                        ->sum('total'); // Hanya transaksi milik pemilik yang selesai

        return view('owner.home', $data);
    }
}

