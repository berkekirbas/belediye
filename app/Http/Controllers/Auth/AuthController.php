<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Sentinel::authenticate($credentials)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->withErrors(['message' => 'Giriş başarısız. Lütfen bilgilerinizi kontrol edin.']);
        }
    }

    public function logout()
    {
        Sentinel::logout();
        return redirect()->route('login');
    }
}
