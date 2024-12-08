<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile(Request $request)
    {
        $user = auth('seeker')->user();
        $status = $user->status_bekerja;
        if ($status == 1) {
            $status = "Sudah Bekerja";
        } else {
            $status = "Belum Bekerja";
        }
        $province = Province::find($user->province_id);
        $namaprovince = $province->nama;
        $kota = Kota::find($user->kota_id);
        $namakota = $kota->nama;
        return view('Profile.user',compact('user', 'status', 'namaprovince', 'namakota'));
    }

    public function editProfile(Request $request)
    {
        $user = Auth::user();
        $provinces = Province::all();
        $province = Province::find($user->province_id);
        $namaprovince = $province->nama;
        $kota = Kota::find($user->kota_id);
        $namakota = $kota->nama;
        $status = $user->status_bekerja;
        if ($status == 1) {
            $status = "Sudah Bekerja";
        } else {
            $status = "Belum Bekerja";
        }
        return view('Profile.edit',compact('user', 'provinces', 'namaprovince', 'namakota', 'status'));
    }
    public function changePassword(Request $request)
    {
        $user = auth('seeker')->user();
        return view('Profile.change-password', compact('user'));
    }
    public function CVandPortofolio(Request $request) {
        $user = auth('seeker')->user();
        return view('Profile.cv-and-portofolio',compact('user'));
    }
}
