<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

       if (Auth::attempt($credentials)) {
           $request->session()->regenerate();

           $user = Auth::user();

           if ($user->status !== 'approved') {
               Auth::logout();
               return back()->withErrors([
                   'email' => 'Akun Anda Masih Pending dan Masih Dalam Proses Verifikasi Oleh Admin.',
               ])->onlyInput('email');
            } else if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/athletes');
            }
        }

        return back()->withErrors([
            'email' => 'Email Atau Password Yang Anda Masukan Salah.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['status'] = 'pending';

        User::create($validatedData);

        return redirect('/login')->with('success', 'Daftar Akun Telah Berhasil!
        Harap Konfirmasi ke Panitia Bahwa anda Telah Mendaftar.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}