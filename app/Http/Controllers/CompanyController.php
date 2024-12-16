<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Seeker;
use App\Models\Company;
use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function companydashboard()
    {
        $currentPage = request()->get('halaman', 1);
        $perPage = 5; 
        $company = auth('company')->user();
        $totalpelamar = $company->lamarans()->count();
        Lowongan::where('exp_date', '<', now())->where('status', '1')->update(['status' => '0']);
        $lowongans = $company->lowongans()->paginate($perPage, ['*'], 'halaman', $currentPage);
        foreach ($lowongans as $lowongan) {
            $lowongan->jumlah_pelamar = $lowongan->lamarans()->count();
        }
        $banyaklowongan = $company->lowongans()->count();
        return view('company.companydashboard', compact('lowongans', 'banyaklowongan', 'totalpelamar', 'company'));
    }

    public function reviewlamaran()
    {
        $companyid = auth('company')->user()->id;
        $lamarans = Lamaran::with(['lowongan', 'seeker'])
            ->whereHas('lowongan', function ($query) use ($companyid) {
                $query->where('company_id', $companyid);
            })->get();
        foreach ($lamarans as $lamaran) {
            if ($lamaran->seeker->status_bekerja == '1') {
                $lamaran->seeker->status = 'Sedang Bekerja';
            } else {
                $lamaran->seeker->status = 'Belum Bekerja';
            }
        }
        return view('company.review-lamaran', compact('lamarans'));
    }

    public function updatebio(Request $request, Company $user)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'province_id' => 'required',
            'kota_id' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required|min:12',
            'email' => 'required|email:dns',
            'bio' => 'nullable',
            'linkedin' => 'nullable|url|max:255',
            'website' => 'nullable|url|max:255'
        ]);
        $user->update($validatedData);
        return redirect()->route('user-company')->with('update_bio_success', 'Profile updated successfully');
    }

    public function updatelogo(Request $request, Company $user)
    {
        $validatedData = $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|file|max:2048'
        ]);
        if ($user->logo) {
            Storage::delete($user->logo);
        }
        $user->logo = $validatedData['logo']->store('logo');
        $user->update([
            "logo" => $user->logo
        ]);
        $user->save();

        return redirect()->back()->with('update_logo', 'Profile updated successfully');
    }

    public function updatepassword(Request $request, Company $user)
    {
        $validatedData = $request->validate([
            'confirm_password' => 'required|min:8|same:new_password',
            'new_password' => 'required|min:8'
        ]);
        if (Hash::check($request->current_password, $user->password)) {
            $hashedPassword = bcrypt($validatedData['confirm_password']);
            $user->update([
                "password" => $hashedPassword
            ]);
            return redirect()->route('user-company')->with('update_password', 'Password updated successfully');
        } elseif (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('change-password-company')->with('update_password_fail', 'Password salah');
        }
    }
}
