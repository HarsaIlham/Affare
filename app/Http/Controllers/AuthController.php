<?php

namespace App\Http\Controllers;

use App\Models\Seeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class AuthController extends Controller
{
    public function loginseeker(Request $request)
    {
        return view('auth.loginseeker');
    }
    public function logincompany(Request $request)
    {
        return view('auth.logincompany');
    }
    public function authenticateseeker(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('seeker')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/homepage')->with('success', 'Login Berhasil');
        }
        
        return back()->withErrors([
            'email' => 'Email atau password anda salah',
        ])->onlyInput('email');
    }
    public function authenticatecompany(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('company')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('companydashboard')->with('success', 'Login Berhasil');
        }
        
        return back()->withErrors([
            'email' => 'Email atau password anda salah',
        ])->onlyInput('email');
    }
    public function roleregister(Request $request)
    {
        return view('role.role-register');
    }
    public function rolelogin(Request $request)
    {
        return view('role.role-login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('logout_success', 'Logout Berhasil');
    }
}
