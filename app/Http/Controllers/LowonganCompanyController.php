<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JenisJob;
use App\Models\Lowongan;
use App\Models\Province;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class LowonganCompanyController extends Controller
{
    public function showLowonganCompany()
    {
        $currentPage = request()->get('halaman', 1);
        $perPage = 5;
        $company = auth('company')->user();
        Lowongan::where('exp_date', '<', now())->where('status', '1')->update(['status' => '0']);
        $lowongans = $company->lowongans()->paginate($perPage, ['*'], 'halaman', $currentPage);
        foreach ($lowongans as $lowongan) {
            $lowongan->jumlah_pelamar = $lowongan->lamarans()->count();
        }

        return view('company.lowongancompany', compact('lowongans'));
    }

    public function postlowongan()
    {
        $company = auth('company')->user();
        $provinces = Province::all();
        return view('company.postlowongan', compact('provinces', 'company'));
    }

    public function updatelowongan($id)
    {
        $provinces = Province::all();
        $lowongans = Lowongan::with(['company', 'kota', 'tipejob', 'jenisjob', 'province'])->findOrFail($id);
        return view('company.updatelowongan', compact('lowongans', 'provinces'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'judul' => 'required|max:255',
                'jenis_job_id' => 'required',
                'tipe_job_id' => 'required',
                'gaji_min' => 'required|min:0',
                'gaji_max' => 'required|min:0',
                'provinsi_id' => 'required',
                'kota_id' => 'required',
                'pendidikan' => 'required|max:255',
                'deskripsi' => 'required',
                'kualifikasi' => 'required',
                'exp_date' => 'required|date',
            ],
            [
                'gaji_max.min' => 'Gaji tidak boleh negatif',
            ]
        );
        if ($request->gaji_max < $request->gaji_min) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['gaji_max' => 'Gaji maksimum tidak boleh lebih kecil dari gaji minimum.']);
        }
        Lowongan::where('id', $id)->update($validatedData);

        if ($validatedData['exp_date'] > now()) {
            Lowongan::where('id', $id)->update(['status' => '1']);
        }

        return redirect()->route('lowongancompany')->with('update_success', 'Lowongan updated successfully');
    }

    public function destroy($id)
    {
        Lowongan::destroy($id);
        return redirect()->route('lowongancompany')->with('delete_success', 'Lowongan deleted successfully');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'judul' => 'required|max:255',
                'jenis_job_id' => 'required',
                'tipe_job_id' => 'required',
                'gaji_min' => 'required|min:0',
                'gaji_max' => 'required|min:0',
                'provinsi_id' => 'required',
                'kota_id' => 'required',
                'pendidikan' => 'required|max:255',
                'deskripsi' => 'required',
                'kualifikasi' => 'required',
                'exp_date' => 'required|date',
            ],
            [
                'gaji_max.min' => 'Gaji tidak boleh negatif',
            ]
        );

        if ($request->gaji_max < $request->gaji_min) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['gaji_max' => 'Gaji maksimum tidak boleh lebih kecil dari gaji minimum.']);
        }

        $validatedData['company_id'] = auth('company')->user()->id;
        $validatedData['status'] = 1;
        Lowongan::create($validatedData);
        return redirect()->route('companydashboard')->with('post_success', 'Lowongan created successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('search');
        $currentPage = request()->get('halaman', 1);
        $perPage = 9;
        $provinces = Province::all();
        Lowongan::where('exp_date', '<', now())->where('status', '1')->update(['status' => '0']);
        $banyaklowongan = Lowongan::where('status', '1')->where('judul', 'like', "%{$query}%")->count();
        $lowongans = Lowongan::where('judul', 'like', "%{$query}%")
            ->where('status', '1')
            ->paginate(9);

        return view('homepage', compact('lowongans', 'query', 'provinces', 'banyaklowongan'));
    }
    public function searchcompanydashboard(Request $request)
    {
        $query = $request->input('search');
        $currentPage = request()->get('halaman', 1);
        $perPage = 5;
        $company = auth('company')->user();
        $totalpelamar = $company->lamarans()->count();
        Lowongan::where('exp_date', '<', now())->where('status', '1')->update(['status' => '0']);
        $lowongans = $company->lowongans()->where('judul', 'like', "%{$query}%")->paginate($perPage, ['*'], 'halaman', $currentPage);
        foreach ($lowongans as $lowongan) {
            $lowongan->jumlah_pelamar = $lowongan->lamarans()->count();
        }
        $banyaklowongan = $company->lowongans()->where('judul', 'like', "%{$query}%")->count();
        return view('company.companydashboard', compact('lowongans', 'banyaklowongan', 'totalpelamar', 'company', 'query'));
    }
    public function searchlowongan(Request $request)
    {
        $query = $request->input('search');
        $currentPage = request()->get('halaman', 1);
        $perPage = 5;
        $company = auth('company')->user();
        $totalpelamar = $company->lamarans()->count();
        Lowongan::where('exp_date', '<', now())->where('status', '1')->update(['status' => '0']);
        $lowongans = $company->lowongans()->where('judul', 'like', "%{$query}%")->paginate($perPage, ['*'], 'halaman', $currentPage);
        foreach ($lowongans as $lowongan) {
            $lowongan->jumlah_pelamar = $lowongan->lamarans()->count();
        }
        $banyaklowongan = $company->lowongans()->where('judul', 'like', "%{$query}%")->count();
        return view('company.lowongancompany', compact('lowongans', 'banyaklowongan', 'totalpelamar', 'company', 'query'));
    }
    public function filter(Request $request)
    {
        $jenis = $request->input('jenis_job');
        $tipe = $request->input('tipe_job');
        $lokasi = $request->input('lokasi');
        $urutan = $request->input('urutan');
        $query = $request->input('search');
        $currentPage = request()->get('halaman', 1);
        $perPage = 9;
        $provinces = Province::all();
        Lowongan::where('exp_date', '<', now())->where('status', '1')->update(['status' => '0']);
        $lowongans = Lowongan::query();
        if ($jenis) {
            $lowongans->where('jenis_job_id', $jenis);
        }
        
        // Filter berdasarkan tipe
        if ($tipe) {
            $lowongans->where('tipe_job_id', $tipe);
        }
        
        // Filter berdasarkan lokasi
        if ($lokasi) {
            $lowongans->where('provinsi_id', $lokasi);
        }
        
        // Filter berdasarkan gaji
        
        // Urutkan berdasarkan waktu posting
        if ($urutan === 'terbaru') {
            $lowongans->orderBy('created_at', 'desc');
        } elseif ($urutan === 'terlama') {
            $lowongans->orderBy('created_at', 'asc');
        } elseif ($urutan === 'tertinggi') {
            $lowongans->orderBy('gaji_max', 'desc');
        }
        $banyaklowongan = $lowongans->count();
        $lowongans = $lowongans->paginate($perPage, ['*'], 'halaman', $currentPage);
        return view('homepage', compact('lowongans', 'query', 'provinces', 'banyaklowongan', 'lokasi', 'tipe', 'jenis', 'urutan'));
    }
}
