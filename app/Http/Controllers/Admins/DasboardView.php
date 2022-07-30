<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteConstants;

class DasboardView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
    	return view('admin/home',['site'=>$site]);
    }
}
