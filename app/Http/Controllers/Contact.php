<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Contact extends Controller
{
    public function get(Request $request)
    {
       return view('contact');
    }
}
