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

            // Menetapkan expires_at untuk token
            $accessToken = $user->createToken('authToken', ['*'], now()->addWeeks(1))->plainTextToken;

// return $user->role->name;

            // Pengalihan berdasarkan role user
            switch ($user->role->name) {
                case 'AdminKedinasan':
                    return redirect('/dashboard-pasar');
                case 'Admin':
                    return redirect('/dashboard');
                case 'AdminSampah':
                    return redirect('/dashboard-sampah');
                case 'Bendahara':
                    return redirect('/dashboard-Bendahara');
                case 'AdminKabupaten':
                    return redirect('/dashboard-kabupaten');
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
