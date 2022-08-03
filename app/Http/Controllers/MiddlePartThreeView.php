<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\Contact;
use App\Models\HomePage;
use Validator;
use App\Models\MiddlePartC;
use Illuminate\Support\Facades\File;

class MiddlePartThreeView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
    	return view('admin.homepage',['path'=>'middlepart3','unread'=>$unread,'site'=>$site,'title'=>'Home middle part three section settings']);
    } 
    protected function edit(Request $request)
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $middlepartc=MiddlePartC::where('id',$request->id)->get()[0];
    	return view('admin.homepage',['path'=>'middlepart3','middlepartc'=>$middlepartc,'unread'=>$unread,'site'=>$site,'title'=>'Home middle part three section settings']);
    } 

    protected function update(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
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
        	
            MiddlePartC::where('id',$request->id)->update(
            [
                'small_heading'=>$request->small_heading,
                'big_heading'=>$request->big_heading,
                'text'=>$request->text,
                'item_name'=>$request->item_name,
            ]);
	        return response()->json(['valid'=>true,'message'=>'Home  middle section part three Settings  updated  successfully.']);
        }
   	}

   	protected function save(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
	            'small_heading'=>'required|string',
	            'big_heading'=>'required|string',
	            'text'=>'required|string',
	            'item_name'=>'required|string|unique:middle_part_c_s'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	MiddlePartC::insert(
            [
                'small_heading'=>$request->small_heading,
                'big_heading'=>$request->big_heading,
                'text'=>$request->text,
                'item_name'=>$request->item_name,
            ]);
            return response()->json(['valid'=>true,'message'=>'Home  middle part three section settings  created  successfully.']);
        }
   	}
}
