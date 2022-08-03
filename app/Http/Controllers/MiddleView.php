<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\Contact;
use App\Models\HomePage;
use Validator;
use App\Models\Middle;
use Illuminate\Support\Facades\File;

class MiddleView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
    	return view('admin.homepage',['path'=>'middle','unread'=>$unread,'site'=>$site,'title'=>'Home middle section settings']);
    } 
    protected function edit(Request $request)
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $middle=Middle::where('id',$request->id)->get()[0];
    	return view('admin.homepage',['path'=>'middle','middle'=>$middle,'unread'=>$unread,'site'=>$site,'title'=>'Home middle section settings']);
    } 

    protected function update(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
            'image_text'=>'required|string',
            'item_name'=>'required|string',
            'image_420x420'=>'mimes:jpg,png,jpeg|dimensions:min_width=420,min_height=420,max_width=420,max_height=420',
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	$home=Middle::where('id',$request->id)->get()[0];
        	if($request->hasFile('image_420x420'))
            {
            	if(File::exists(public_path().'/homepage/'.$home->image_420x420))
		        {
		        	File::delete(public_path().'/homepage/'.$home->image_420x420);
		        }
		        $image_420x420=$request->file('image_420x420');
	        	$newimage_420x420=date('YmdHi').'_1920x950_'.$image_420x420->getClientOriginalName();
	        	$image_420x420->move(public_path('homepage'),$newimage_420x420);
		        
            }

            Middle::where('id',$request->id)->update(
            [
                'image_420x420'=>isset($newimage_420x420) ? $newimage_420x420:$home->image_420x420,
                'image_text'=>$request->image_text,
                'item_name'=>$request->item_name,
                'preview'=>isset($newimage_420x420) ? $newimage_420x420:$home->image_420x420
            ]);
	        return response()->json(['valid'=>true,'message'=>'Home  middle section Settings  updated  successfully.']);
        }
   	}

   	protected function save(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
	            'image_420x420'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=420,min_height=420,max_width=420,max_height=420',
	            'image_text'=>'required|string',
	            'item_name'=>'required|string|unique:middles'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	if($request->hasFile('image_420x420'))
            {
            	/* slider 100x50*/
                $image_420x420=$request->file('image_420x420');
                $newimage_420x420=date('YmdHi').'_100x50_'.$image_420x420->getClientOriginalName();
                $image_420x420->move(public_path('homepage'),$newimage_420x420);

	           Middle::insert(
	            [
	                'image_420x420'=>isset($newimage_420x420) ? $newimage_420x420:'',
	                'image_text'=>$request->image_text,
	                'item_name'=>$request->item_name,
	                'preview'=>isset($newimage_420x420) ? $newimage_420x420:''
	            ]);
	            return response()->json(['valid'=>true,'message'=>'Home  middle section settings  created  successfully.']);
            }
        }
   	}
}
