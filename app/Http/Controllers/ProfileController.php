<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfile(Request $request)
    {
        return view('profile.user');
    }

    public function editProfile(Request $request)
    {
        return view('profile.edit');
    }
    public function changePassword(Request $request)
    {
        return view('profile.change-password');
    }
}
