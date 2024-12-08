<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobsCompanyController extends Controller
{
    public function jobscompany() {
        return view('company.jobscompany');
    }
}