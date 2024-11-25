<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
       
    public function proses(Request $request){
        $credential = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.required'=>'The email field is required',
            'email.email'=>'The email field must be a valid email',
            'password.required'=>'The password field is required'
        ]);
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
    
            // Dapatkan role pengguna yang sedang login
            $userRole = Auth::user()->role;
    
            // Arahkan ke halaman yang sesuai berdasarkan role
            if ($userRole === 'owner') {
                return redirect()->route('home-owner'); // Rute khusus pemilik
            }  else {
                return redirect()->route('home'); // Rute default
            }
        }
    
        // Jika autentikasi gagal
        return back()->withErrors([
            'email' => 'Invalid email or password',
        ])->onlyInput('email');
    }
    public function logout(Request $request){  
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
