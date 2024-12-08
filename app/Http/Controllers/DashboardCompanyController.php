<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardCompanyController extends Controller
{
    public function companydashboard() {
        return view('company.companydashboard');
    }
}