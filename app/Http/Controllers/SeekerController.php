<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Seeker;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\ElseIf_;

class SeekerController extends Controller
{
    public function updatefoto(Request $request, Seeker $user)
    {
        if ($user->foto_profil) {
            Storage::delete($user->foto_profil);
        }
        $user->foto_profil = $request->file('foto_profil')->store('logo');
        $user->save();

        $user->update([
            "foto_profil" => $user-> foto_profil]);
        return redirect()->back()->with('update_foto', 'Profile updated successfully');
    }
    public function updatebio(Request $request, Seeker $user) {
        
        $validatedData = $request->validate([
            'nama' => 'required',
            'province_id' => 'required',
            'kota_id' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required|min:12',
            'pendidikan' => 'required',
            'status_bekerja' => 'required',
            'email' => 'required|email:dns',
            'linkedin' => 'nullable|url|max:255'

        ]);
        $user->update($validatedData);

        return redirect()->route('profile-seeker')->with('update_bio_success', 'Profile updated successfully');
    }

    public function updatecv(Request $request, Seeker $user) {
        if ($user->cv) {
            Storage::delete($user->cv);
        }
        $user->cv = $request->file('cv')->store('cv');
        $user->save();

        $user->update([
            "cv" => $user-> cv
        ]);
        return redirect()->route('cv-and-portofolio')->with('update_success', 'CV updated successfully');
    }

    public function updateportofolio(Request $request, Seeker $user) {
        if ($user->portofolio) {
            Storage::delete($user->portofolio);
        }
        $user->portofolio = $request->file('portofolio')->store('portofolio');
        $user->save();

        $user->update([
            "portofolio" => $user-> portofolio
        ]);
        return redirect()->back()->with('update_portofolio', 'Portofolio updated successfully');
    }

    public function updatepassword(Request $request, Seeker $user) {
        $validatedData = $request->validate([
            'confirm_password' => 'required|min:8|same:new_password',
            'new_password' => 'required|min:8'
        ]);
        if (Hash::check($request->current_password, $user->password)) {
            $hashedPassword = bcrypt($validatedData['confirm_password']);
            $user->update([
                "password" => $hashedPassword
            ]);
            return redirect()->route('profile-seeker')->with('update_password', 'Password updated successfully');
            
        }
        elseif (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('change-password')->with('update_password_fail', 'Password salah');
        }
    }
}
