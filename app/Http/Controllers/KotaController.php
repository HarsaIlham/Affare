<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Province;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function getKotas($province_id)
    {
        // Ambil data kota berdasarkan ID provinsi
        $cities = Kota::where('province_id', $province_id)->get();

        // Return response JSON
        return response()->json($cities);
    }

    public function getCities($province_id)
    {
        // Ambil data kota berdasarkan province_id
        $cities = Kota::where('province_id', $province_id)->get();

        // Return data dalam format JSON
        return response()->json($cities);
    }
}
