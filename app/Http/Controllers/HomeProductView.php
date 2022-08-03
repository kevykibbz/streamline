<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\Contact;
use App\Models\HomePage;
use Validator;
use App\Models\MiddlePartOne;
use Illuminate\Support\Facades\File;
use App\Models\HomeProduct;
use App\Models\Category;

class HomeProductView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $categories=Category::all();
    	return view('admin.homepage',['categories'=>$categories,'path'=>'product','unread'=>$unread,'site'=>$site,'title'=>'Home page products gallary section settings']);
    } 
    protected function edit(Request $request)
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $product=HomeProduct::where('id',$request->id)->get()[0];
        $categories=Category::all();
    	return view('admin.homepage',['categories'=>$categories,'path'=>'product','product'=>$product,'unread'=>$unread,'site'=>$site,'title'=>'Home page products gallary section settings']);
    } 

    protected function update(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
            'image_1200x810'=>'mimes:jpg,png,jpeg|dimensions:min_width=1200,min_height=810,max_width=1200,max_height=810',
            'category'=>'required|string',
            'title'=>'required|string',
            'text'=>'required|string',
            'item_name'=>'required|string'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	$home=HomeProduct::where('id',$request->id)->get()[0];
        	if($request->hasFile('image_1200x810'))
            {
            	if(File::exists(public_path().'/homepage/'.$home->image_1200x810))
		        {
		        	File::delete(public_path().'/homepage/'.$home->image_1200x810);
		        }
		        $image_1200x810=$request->file('image_1200x810');
	        	$newimage_1200x810=date('YmdHi').'_1200x810_'.$image_1200x810->getClientOriginalName();
	        	$image_1200x810->move(public_path('homepage'),$newimage_1200x810);
		        
            }

            HomeProduct::where('id',$request->id)->update(
            [
                'image_1200x810'=>isset($newimage_1200x810) ? $newimage_1200x810:$home->image_1200x810,
                'category'=>$request->category,
                'title'=>$request->title,
                'text'=>$request->text,
                'item_name'=>$request->item_name,
                'preview'=>isset($newimage_1200x810) ? $newimage_1200x810:$home->image_1200x810
            ]);
	        return response()->json(['valid'=>true,'message'=>'Home products gallary settings  updated  successfully.']);
        }
   	}

   	protected function save(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
            'image_1200x810'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=1200,min_height=810,max_width=1200,max_height=810',
            'category'=>'required|string',
            'title'=>'required|string',
            'text'=>'required|string',
            'item_name'=>'required|string|unique:home_products'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	if($request->hasFile('image_1200x810'))
            {
            	/* image icon 70x70*/
                $image_1200x810=$request->file('image_1200x810');
                $newimage_1200x810=date('YmdHi').'_1200x810_'.$image_1200x810->getClientOriginalName();
                $image_1200x810->move(public_path('homepage'),$newimage_1200x810);

	           HomeProduct::insert(
	            [
	                'image_1200x810'=>isset($newimage_1200x810) ? $newimage_1200x810:'',
	                'category'=>$request->category,
	                'title'=>$request->title,
	                'text'=>$request->text,
	                'item_name'=>$request->item_name,
	                'preview'=>isset($newimage_1200x810) ? $newimage_1200x810:''
	            ]);
	            return response()->json(['valid'=>true,'message'=>'Home products gallary settings  created  successfully.']);
            }
        }
   	}
}

