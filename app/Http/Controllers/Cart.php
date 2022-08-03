<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\Category;

class Cart extends Controller
{
    protected function get(Request $request)
    {
    	$site=SiteConstants::all()[0];
        $categories=Category::all();
        $product=Product::where('product_id',$request->product_id)->get()[0];
    	return view('cart',['site'=>$site,'site'=>$site,'categories'=>$categories,'path'=>'product']);
    }
}
