<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use Illuminate\Http\Request;

class LamaranController extends Controller
{
    public function lamar($id)
    {
        $seeker = auth('seeker')->user();
        if (empty($seeker->cv) || empty($seeker->portofolio)) {
            return redirect()->route('homepage-seeker')->with('fail', 'Anda belum melengkapi CV dan Portofolio');
        }
        $existingLamaran = Lamaran::where('seeker_id', $seeker->id)->where('lowongan_id', $id)->first();
        if ($existingLamaran) {
            return redirect()->back()->with('error', 'Anda sudah melamar lowongan ini.');
        }
        Lamaran::create([
            'lowongan_id' => $id,
            'seeker_id' => $seeker->id,
            'status' => 'MENUNGGU'
        ]);
        return redirect()->route('homepage-seeker')->with('lamar_success', 'Lamaran berhasil dikirim');
    }
    public function updatestatus(Request $request){
        $validatedData = $request->validate([
            'applicationId' => 'required',
            'status' => 'required'
        ]);
        dd($validatedData['applicationId']);
        $lamaran = Lamaran::find($validatedData['applicationId']);
        $lamaran->update([
            'status' => $validatedData['status']
        ]);
        return redirect()->route('reviewlamaran')->with('update_status', 'Status Lamaran berhasil diubah');
    }
    public function destroy(Request $request) {
        $validatedData = $request->validate([
            'lamaran_id' => 'required'
        ]);
        Lamaran::destroy($validatedData['lamaran_id']);
        return redirect()->route('terdaftar')->with('delete_success', 'Lamaran deleted successfully');
    }
    
}
