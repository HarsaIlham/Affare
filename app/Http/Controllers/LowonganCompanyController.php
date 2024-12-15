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
    public function showLowonganCompany() {
        $company = auth('company')->user();
        $lowongans = $company->lowongans()->get();
        foreach ($lowongans as $lowongan) {
            $lowongan->jumlah_pelamar = $lowongan->lamarans()->count();
        }

        return view('company.lowongancompany', compact('lowongans'));
    }
    
    public function postlowongan() {
        $company = auth('company')->user();
        $provinces = Province::all();
        return view('company.postlowongan',compact('provinces', 'company'));
    }

    public function updatelowongan($id) {
        $provinces = Province::all();
        $lowongans = Lowongan::with(['company', 'kota', 'tipejob', 'jenisjob', 'province'])->findOrFail($id);
        return view('company.updatelowongan', compact('lowongans','provinces'));
    }
    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'jenis_job_id' => 'required',
            'tipe_job_id' => 'required',
            'gaji_min' => 'required',
            'gaji_max' => 'required',
            'provinsi_id' => 'required',
            'kota_id' => 'required',
            'pendidikan' => 'required|max:255',
            'deskripsi' => 'required',
            'kualifikasi' => 'required',
            'exp_date' => 'required|date',
        ]);
        Lowongan::where('id', $id)->update($validatedData);
        return redirect()->route('lowongancompany')->with('update_success', 'Lowongan updated successfully');
    }

    public function destroy($id) {
        Lowongan::destroy($id);
        return redirect()->route('lowongancompany')->with('delete_success', 'Lowongan deleted successfully');
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'jenis_job_id' => 'required',
            'tipe_job_id' => 'required',
            'gaji_min' => 'required',
            'gaji_max' => 'required',
            'provinsi_id' => 'required',
            'kota_id' => 'required',
            'pendidikan' => 'required|max:255',
            'deskripsi' => 'required',
            'kualifikasi' => 'required',
            'exp_date' => 'required|date',
        ]);
        $validatedData['company_id'] = auth('company')->user()->id;
        $validatedData['status'] = 1;
        Lowongan::create($validatedData);
        return redirect()->route('companydashboard')->with('post_success', 'Lowongan created successfully');
    }

}