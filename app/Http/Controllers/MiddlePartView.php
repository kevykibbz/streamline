<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\Contact;
use App\Models\HomePage;
use Validator;
use App\Models\MiddlePartOne;
use Illuminate\Support\Facades\File;

class MiddlePartView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
    	return view('admin.homepage',['path'=>'middlepartone','unread'=>$unread,'site'=>$site,'title'=>'Home middle part one section settings']);
    } 
    protected function edit(Request $request)
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $middlepart=MiddlePartOne::where('id',$request->id)->get()[0];
    	return view('admin.homepage',['path'=>'middlepartone','middlepart'=>$middlepart,'unread'=>$unread,'site'=>$site,'title'=>'Home middle part one section settings']);
    } 

    protected function update(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
            'image_70x70'=>'mimes:jpg,png,jpeg|dimensions:min_width=70,min_height=70,max_width=70,max_height=70',
	        'image_heading'=>'required|string',
	        'image_text'=>'required|string',
	        'item_name'=>'required|string'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	$home=MiddlePartOne::where('id',$request->id)->get()[0];
        	if($request->hasFile('image_70x70'))
            {
            	if(File::exists(public_path().'/homepage/'.$home->image_70x70))
		        {
		        	File::delete(public_path().'/homepage/'.$home->image_70x70);
		        }
		        $image_70x70=$request->file('image_70x70');
	        	$newimage_70x70=date('YmdHi').'_70x70_'.$image_70x70->getClientOriginalName();
	        	$image_70x70->move(public_path('homepage'),$newimage_70x70);
		        
            }

            MiddlePartOne::where('id',$request->id)->update(
            [
                'image_70x70'=>isset($newimage_70x70) ? $newimage_70x70:$home->image_70x70,
                'image_heading'=>$request->image_heading,
	            'image_text'=>$request->image_text,
	            'item_name'=>$request->item_name,
	            'preview'=>isset($newimage_70x70) ? $newimage_70x70:$home->image_70x70
            ]);
	        return response()->json(['valid'=>true,'message'=>'Home  middle section part one Settings  updated  successfully.']);
        }
   	}

   	protected function save(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
	            'image_70x70'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=70,min_height=70,max_width=70,max_height=70',
	            'image_heading'=>'required|string',
	            'image_text'=>'required|string',
	            'item_name'=>'required|string|unique:middle_part_ones'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	if($request->hasFile('image_70x70'))
            {
            	/* image icon 70x70*/
                $image_70x70=$request->file('image_70x70');
                $newimage_70x70=date('YmdHi').'_70x70_'.$image_70x70->getClientOriginalName();
                $image_70x70->move(public_path('homepage'),$newimage_70x70);

	           MiddlePartOne::insert(
	            [
	                'image_70x70'=>isset($newimage_70x70) ? $newimage_70x70:'',
	                'image_heading'=>$request->image_heading,
	                'image_text'=>$request->image_text,
	                'item_name'=>$request->item_name,
	                'preview'=>isset($newimage_70x70) ? $newimage_70x70:''
	            ]);
	            return response()->json(['valid'=>true,'message'=>'Home  middle part one section settings  created  successfully.']);
            }
        }
   	}
}
