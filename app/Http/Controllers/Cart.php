<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\Category;

class Cart extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
        $categories=Category::all();
    	return view('cart',['site'=>$site,'site'=>$site,'categories'=>$categories,'path'=>'product']);
    }
}
