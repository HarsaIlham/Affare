<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Seeker;
use App\Models\Province;
use App\Models\Company;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerseekerform(Request $request)
    {
        $provinces = Province::all();
        $cities = Kota::where('province_id', $request->id)->get();
        return view('auth.registerseeker',compact('provinces'));
    }
    public function registercompanyform(Request $request)
    {
        $provinces = Province::all();
        $cities = Kota::where('province_id', $request->id)->get();
        return view('auth.registercompany',compact('provinces'));
    }
    public function storeseeker(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'province_id' => 'required',
            'kota_id' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required|min:12',
            'pendidikan' => 'required',
            'status_bekerja' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg|file|max:2048',
            'cv' => 'nullable|file|mimes:pdf|max:5000',
            'portofolio' => 'nullable|file|mimes:pdf|max:5000',
            'linkedin' => 'nullable|url|max:255'

        ]);

        if ($request->hasFile('foto_profil')) {
            $validatedData['foto_profil'] = $request->file('foto_profil')->store('logo');
        }

        if ($request->hasFile('cv')) {
            $validatedData['cv'] = $request->file('cv')->store('cv');
        }

        if ($request->hasFile('portofolio')) {
            $validatedData['portofolio'] = $request->file('portofolio')->store('portofolio');
        }
        // dd($validatedData);
        $validatedData['password'] = bcrypt($validatedData['password']);
        Seeker::create($validatedData);
        return redirect()->route('loginseeker');
    }
    public function storecompany(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'province_id' => 'required',
            'kota_id' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required|min:12',
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|file|max:2048',
            'website' => 'nullable|url|max:255',
            'bio' => 'nullable',
            'linkedin' => 'nullable|url|max:255'
            
        ]);
        
        if ($request->hasFile('logo')) {
            $validatedData['logo'] = $request->file('logo')->store('logo');
        }
        $validatedData['password'] = bcrypt($validatedData['password']);
        Company::create($validatedData);

        return redirect()->route('logincompany');
    }
}
