<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Province;
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
    public function registerseekerform(Request $request)
    {
        $provinces = Province::all();
        $cities = Kota::where('province_id', $request->id)->get();
        return view('auth.registerseeker',compact('provinces','cities'));
    }
    public function registercompanyform(Request $request)
    {
        return view('auth.registercompany');
    }
}
