<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Company;
use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Province;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homepage () {
        $provinces = Province::all();
        $lowongans = Lowongan::with(['company', 'kota', 'tipejob', 'jenisjob', 'province'])->get();
        return view ('homepage',compact ('provinces', 'lowongans'));
    }
    public function perusahaan() {
        $companies = Company::all();
        return view ('perusahaan',compact ('companies'));
    }

    public function detaillowongan($id) {
        $lowongan = Lowongan::with(['company', 'kota', 'tipejob', 'jenisjob', 'province'])->find($id);
        return response()->json([
            'judul' => $lowongan->judul,
            'company' => $lowongan->company->nama,
            'provinsi' => $lowongan->province->nama,
            'kota' => $lowongan->kota->nama,
            'deskripsi' => $lowongan->deskripsi,
            'gaji_min' => $lowongan->gaji_min,
            'gaji_max' => $lowongan->gaji_max,
            'exp_date' => $lowongan->exp_date,
            'kualifikasi' => $lowongan->kualifikasi
        ]);
    }
    public function terdaftar() {
        $seeker = auth('seeker')->user();
        $lamarans = Lamaran::with(['lowongan', 'seeker'])->where('seeker_id', $seeker->id)->get();
        return view('terdaftar', compact('lamarans'));
    }
}
