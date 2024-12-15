<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileCompanyController extends Controller
{
    public function showcompanyProfile(Request $request)
    {
        $company = auth('company')->user();
        $province = Province::find($company->province_id);
        $namaprovince = $province->nama;
        $kota = Kota::find($company->kota_id);
        $namakota = $kota->nama;
        return view('company.profile.user-company', compact('company', 'namaprovince', 'namakota'));
    }

    public function editcompanyProfile(Request $request)
    {
        $company = Auth::user();
        $province = Province::find($company->province_id);
        $namaprovince = $province->nama;
        $kota = Kota::find($company->kota_id);
        $namakota = $kota->nama;
        $provinces = Province::all();
        return view('company.profile.edit-company', compact('company', 'namaprovince', 'namakota', 'provinces'));
    }
    public function changecompanyPassword(Request $request)
    {
        $company = auth('company')->user();
        return view('company.profile.change-password-company', compact('company'));
    }

}
