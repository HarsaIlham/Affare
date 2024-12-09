<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kota;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function companydashboard() {
        return view('company.companydashboard');
    }
}
