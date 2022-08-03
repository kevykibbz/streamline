<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\Contact;
use App\Models\HomePage;
use Validator;
use App\Models\Middle;
use App\Models\MiddlePartOne;
use App\Models\MiddlePartB;
use Illuminate\Support\Facades\File;
use App\Models\MiddlePartC;
use App\Models\Developer;
use App\Models\Review;
use App\Models\Memory;
use App\Models\Featured;

class AboutView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
    	return view('admin.aboutpage',['path'=>'memory','unread'=>$unread,'site'=>$site,'title'=>'About page  settings']);
    } 
    protected function edit(Request $request)
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $memory=Memory::where('id',$request->id)->get()[0];
    	return view('admin.aboutpage',['path'=>'memory','memory'=>$memory,'unread'=>$unread,'site'=>$site,'title'=>'About page  settings']);
    } 
    protected function view()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $memory=Memory::all();
        $featured=Featured::all();
    	return view('admin.aboutview',[
    		'unread'=>$unread,
    		'site'=>$site,
    		'title'=>'About page settings',
            'memory'=>$memory,
            'featured'=>$featured,
    	]);
    }

    protected function update(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
           'image_175x51'=>'mimes:jpg,png,jpeg|dimensions:min_width=175,min_height=51,max_width=175,max_height=51',
           'image_494x702'=>'mimes:jpg,png,jpeg|dimensions:min_width=494,min_height=702,max_width=494,max_height=702',
            'small_heading'=>'required|string',
            'big_heading'=>'required|string',
            'text'=>'required|string',
            'item_name'=>'required|string'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	$home=Memory::where('id',$request->id)->get()[0];
        	if($request->hasFile('image_175x51'))
            {
            	if(File::exists(public_path().'/homepage/'.$home->image_175x51))
		        {
		        	File::delete(public_path().'/homepage/'.$home->image_175x51);
		        }
		        $image_175x51=$request->file('image_175x51');
	        	$newimage_175x51=date('YmdHi').'_175x51_'.$image_175x51->getClientOriginalName();
	        	$image_175x51->move(public_path('homepage'),$newimage_175x51);
		        
            }
        	if($request->hasFile('image_494x702'))
            {
            	if(File::exists(public_path().'/homepage/'.$home->image_494x702))
		        {
		        	File::delete(public_path().'/homepage/'.$home->image_494x702);
		        }
		        $image_494x702=$request->file('image_494x702');
	        	$newimage_494x702=date('YmdHi').'_100x50_'.$image_494x702->getClientOriginalName();
	        	$image_494x702->move(public_path('homepage'),$newimage_494x702);
		        
            }

            Memory::where('id',$request->id)->update(
            [
                'image_175x51'=>isset($newimage_175x51) ? $newimage_175x51:$home->image_175x51,
                'image_494x702'=>isset($newimage_494x702) ? $newimage_494x702:$home->image_494x702,
                'small_heading'=>$request->small_heading,
                'big_heading'=>$request->big_heading,
                'text'=>$request->text,
                'item_name'=>$request->item_name,
                'preview'=>isset($newimage_494x702) ? $newimage_494x702:$home->image_494x702
            ]);
	        return response()->json(['valid'=>true,'message'=>'About page memory section setting updated  successfully.']);
        }
   	}

   	protected function save(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
            'image_175x51'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=175,min_height=51,max_width=175,max_height=51',
            'image_494x702'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=494,min_height=702,max_width=494,max_height=702',
            'small_heading'=>'required|string',
            'big_heading'=>'required|string',
            'text'=>'required|string',
            'item_name'=>'required|string|unique:memories'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	if($request->hasFile('image_175x51') and $request->hasFile('image_494x702'))
            {
            	/* slider 100x50*/
                $image_175x51=$request->file('image_175x51');
                $newimage_175x51=date('YmdHi').'_175x51_'.$image_175x51->getClientOriginalName();
                $image_175x51->move(public_path('aboutpage'),$newimage_175x51);

                /* slider 1920x950*/
                $image_494x702=$request->file('image_494x702');
                $newimage_494x702=date('YmdHi').'_494x702_'.$image_494x702->getClientOriginalName();
                $image_494x702->move(public_path('aboutpage'),$newimage_494x702);

	           Memory::insert(
	            [
	                'image_175x51'=>isset($newimage_175x51) ? $newimage_175x51:'',
	                'image_494x702'=>isset($newimage_494x702) ? $newimage_494x702:'',
	                'small_heading'=>$request->small_heading,
	                'big_heading'=>$request->big_heading,
	                'text'=>$request->text,
	                'item_name'=>$request->item_name,
	                'preview'=>isset($newimage_494x702) ? $newimage_494x702:''
	            ]);
	            return response()->json(['valid'=>true,'message'=>'About page memory section setting created  successfully.']);
            }
        }
   	}
}
