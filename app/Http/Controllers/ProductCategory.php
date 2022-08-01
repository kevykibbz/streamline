<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SiteConstants;
use App\Models\Category;
use App\Models\Review;


class ProductCategory extends Controller
{
    protected function get(Request $request)
    {
    	$site=SiteConstants::all()[0];
        $products=Product::where('category','like','%'.$request->category.'%')->get();
        $categories=Category::all();
        $title=Category::where('category','like','%'.$request->category.'%')->get()[0];
    	return view('products',['title'=>$title,'categories'=>$categories,'site'=>$site,'products'=>$products,'path'=>'product',]);
    }
    protected function description(Request $request)
    {
    	$site=SiteConstants::all()[0];
        $product=Product::where('product_id',$request->product_id)->get()[0];
        $categories=Category::all();
        $reviews=Review::orderBy('id','desc')->take(5)->get();
    	return view('description',['reviews'=>$reviews,'categories'=>$categories,'site'=>$site,'product'=>$product,'path'=>'product',]);
    }
}
