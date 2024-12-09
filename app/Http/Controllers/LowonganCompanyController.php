<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class LowonganCompanyController extends Controller
{
    public function showLowonganCompany() {
        return view('company.lowongancompany');
    }
    
    public function postlowongan() {
        $provinces = Province::all();
        return view('company.postlowongan',compact('provinces'));
    }

    public function updatelowongan() {
        return view('company.updatelowongan');
    }

    public function deletelowongan() {
        
    }

}