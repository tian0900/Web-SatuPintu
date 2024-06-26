<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginview()
    {
        return view('auth.login');
    }

    public function loginCheck(Request $request)
    {
        
        try {
            $loginData = $request->validate([
                'name' => 'required',
                'password' => 'required'
            ]);

            if (!auth()->attempt($loginData)) {
                return redirect()->back()->withErrors(['message' => 'Username/Password anda Salah']);
            }

            $user = auth()->user();
            // dd($user->role->name);
            $accessToken = $user->createToken('authToken')->plainTextToken;

            if ($user->role->name === 'AdminKedinasan') {
                return redirect('/dashboard-pasar');
            } elseif ($user->role->name  === 'Admin') {
                return redirect('/dashboard');
            } elseif ($user->role->name  === 'AdminSampah') {
                return redirect('/dashboard-sampah');
            } elseif ($user->role->name  === 'Bendahara') {
                return redirect('/dashboard-bendahara');
            } elseif ($user->role->name  === 'AdminKabupaten') {
                return redirect('/dashboard-kabupaten');
            } else {
                // Jika peran tidak diketahui, ganti return redirect sesuai kebutuhan
                return redirect('/kontrak')->withErrors(['pesan' => 'Input yang Anda masukkan salah']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }


    public function logout()
    {
        auth()->user()->tokens()->delete();

        return redirect('/login');
    }
}
