<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LowonganCompanyController extends Controller
{
    public function showLowonganCompany() {
        return view('company.lowongancompany');
    }
    
    public function postlowongan() {
        return view('company.postlowongan');
    }

    public function updatelowongan() {
        return view('company.updatelowongan');
    }

    public function deletelowongan() {
        
    }

}