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
            $accessToken = $user->createToken('authToken')->plainTextToken;

            if ($user->name === 'Admin') {
                return redirect('/item');
            } elseif ($user->name === 'Bendahara') {
                return redirect('/tagihan');
            }else {
                // Jika peran tidak diketahui, ganti return redirect sesuai kebutuhan
                return redirect('/kontrak')->withErrors(['pesan' => 'Input yang Anda masukkan salah']);;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return redirect('/login');
    }
}
