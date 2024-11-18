<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginform(Request $request)
    {
        return view('auth.login');
    }
    public function roleform(Request $request)
    {
        return view('auth.role');
    }
    public function registerform(Request $request)
    {
        return view('auth.register');
    }
}
