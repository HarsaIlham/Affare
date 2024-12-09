<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileCompanyController extends Controller
{
    public function showcompanyProfile(Request $request)
    {
        return view('company.profile.user-company');
    }

    public function editcompanyProfile(Request $request)
    {
        return view('company.profile.edit-company');
    }
    public function changecompanyPassword(Request $request)
    {
        return view('company.profile.change-password-company');
    }

}
