<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagessController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }
}
