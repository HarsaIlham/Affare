<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Province;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function getCitiesByProvince($province_id)
    {
        $cities = Kota::where('province_id', $province_id)->get();
        return response()->json($cities);
    }
}
