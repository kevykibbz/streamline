<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\Contact;
use App\Models\HomePage;
use Validator;
use App\Models\MiddlePartB;
use Illuminate\Support\Facades\File;

class MiddlePartTwoView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
    	return view('admin.homepage',['path'=>'middleparttwo','unread'=>$unread,'site'=>$site,'title'=>'Home middle part two section settings']);
    } 
    protected function edit(Request $request)
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $middlepartb=MiddlePartB::where('id',$request->id)->get()[0];
    	return view('admin.homepage',['path'=>'middleparttwo','middlepartb'=>$middlepartb,'unread'=>$unread,'site'=>$site,'title'=>'Home middle part two section settings']);
    } 

    protected function update(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
            'image_heading'=>'required|string',
            'image_text'=>'required|string',
            'video_link'=>'required|url',
            'item_name'=>'required|string'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	
            MiddlePartB::where('id',$request->id)->update(
            [
                'image_heading'=>$request->image_heading,
                'video_link'=>$request->video_link,
                'image_text'=>$request->image_text,
                'item_name'=>$request->item_name,
            ]);
	        return response()->json(['valid'=>true,'message'=>'Home  middle section part two Settings  updated  successfully.']);
        }
   	}

   	protected function save(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
	            'image_heading'=>'required|string',
	            'image_text'=>'required|string',
	            'video_link'=>'required|url',
	            'item_name'=>'required|string|unique:middle_part_b_s'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	MiddlePartB::insert(
            [
                'image_heading'=>$request->image_heading,
                'video_link'=>$request->video_link,
                'image_text'=>$request->image_text,
                'item_name'=>$request->item_name,
            ]);
            return response()->json(['valid'=>true,'message'=>'Home  middle part two section settings  created  successfully.']);
        }
   	}
}
