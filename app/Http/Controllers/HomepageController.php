<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
class HomepageController extends Controller
{
    public function homepage () {
        $provinces = Province::all();
        return view ('homepage',compact ('provinces'));
    }
}
