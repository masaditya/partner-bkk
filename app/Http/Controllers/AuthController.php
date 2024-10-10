<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);

            // Ambil kredensial dari input
            $credentials = $request->only('email', 'password');

            // Coba login menggunakan guard admin
            if (Auth::guard('admin')->attempt($credentials)) {
                // Periksa apakah admin memiliki `is_partner = 0`
                if (Auth::guard('admin')->user()->is_partner == 0) {
                    // Jika is_partner = 0, redirect ke dashboard
                    return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
                } else {
                    // Jika is_partner bukan 0, logout dan kirimkan pesan error
                    Auth::guard('admin')->logout();
                    return redirect()->back()->withErrors([
                        'error' => 'Anda tidak diizinkan untuk login.',
                    ])->withInput($request->except('password'));
                }
            }

            // Jika login gagal, kirimkan pesan error
            return back()->withErrors([
                'error' => 'Email atau kata sandi salah.',
            ])->withInput($request->except('password'));
        } catch (\Exception $e) {
            // Tangkap error dan kirimkan pesan error ke view
            return back()->withErrors([
                'error' => 'Terjadi kesalahan saat proses login. Silakan coba lagi.'. $e->getMessage(),
            ])->withInput($request->except('password'));
        }
    }
    
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/login')->with('success', 'Berhasil logout!');
    }
}
