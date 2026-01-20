<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function form()
    {
        return view('auth.login');
    }

public function authenticate(Request $request)
{
    $credentials = $request->validate([
        'nim_nik' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        if (auth()->user()->role === 'kaprodi') {
            return redirect()->route('kaprodi.dashboard');
        }

        if (auth()->user()->role === 'dosen') {
            return redirect()->route('dosen.dashboard');
        }

        if (auth()->user()->role === 'mahasiswa') {
            return redirect()->route('mahasiswa.dashboard');
        }
    }

    return back()->withErrors([
        'nim_nik' => 'Login gagal',
    ]);
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
