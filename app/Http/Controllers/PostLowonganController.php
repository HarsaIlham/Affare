<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostLowonganController extends Controller
{
    public function postlowongan() {
        return view('company.postlowongan');
    }
}