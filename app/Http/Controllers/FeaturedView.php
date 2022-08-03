<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\Contact;
use App\Models\HomePage;
use Validator;
use App\Models\MiddlePartOne;
use Illuminate\Support\Facades\File;
use App\Models\Featured;

class FeaturedView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
    	return view('admin.aboutpage',['path'=>'feature','unread'=>$unread,'site'=>$site,'title'=>'About page products section settings']);
    } 
    protected function edit(Request $request)
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $feature=Featured::where('id',$request->id)->get()[0];
    	return view('admin.aboutpage',['path'=>'feature','feature'=>$feature,'unread'=>$unread,'site'=>$site,'title'=>'About page products section settings']);
    } 

     protected function update(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
           'image_480x430'=>'mimes:jpg,png,jpeg|dimensions:min_width=480,min_height=430,max_width=480,max_height=430',
            'heading'=>'required|string',
            'name'=>'required|string',
            'text'=>'required|string',
            'item_name'=>'required|string'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	$home=Featured::where('id',$request->id)->get()[0];
        	if($request->hasFile('image_480x430'))
            {
            	if(File::exists(public_path().'/homepage/'.$home->image_480x430))
		        {
		        	File::delete(public_path().'/homepage/'.$home->image_480x430);
		        }
		        $image_480x430=$request->file('image_480x430');
	        	$newimage_480x430=date('YmdHi').'_480x430_'.$image_480x430->getClientOriginalName();
	        	$image_480x430->move(public_path('homepage'),$newimage_480x430);
		        
            }

            Featured::where('id',$request->id)->update(
            [
                'image_480x430'=>isset($newimage_480x430) ? $newimage_480x430:$home->image_480x430,
                'heading'=>$request->heading,
                'title'=>$request->name,
                'text'=>$request->text,
                'item_name'=>$request->item_name,
                'preview'=>isset($newimage_480x430) ? $newimage_480x430:$home->image_480x430
            ]);
	        return response()->json(['valid'=>true,'message'=>'About page products section setting updated  successfully.']);
        }
   	}


   	protected function save(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
            'image_480x430'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=480,min_height=430,max_width=480,max_height=430',
            'heading'=>'required|string',
            'name'=>'required|string',
            'text'=>'required|string',
            'item_name'=>'required|string|unique:featureds'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	if($request->hasFile('image_480x430'))
            {
            	/* slider 100x50*/
                $image_480x430=$request->file('image_480x430');
                $newimage_480x430=date('YmdHi').'_480x430_'.$image_480x430->getClientOriginalName();
                $image_480x430->move(public_path('aboutpage'),$newimage_480x430);


	           Featured::insert(
	            [
	                'image_480x430'=>isset($newimage_480x430) ? $newimage_480x430:'',
	                'heading'=>$request->heading,
	                'title'=>$request->name,
	                'text'=>$request->text,
	                'item_name'=>$request->item_name,
	                'preview'=>isset($newimage_480x430) ? $newimage_480x430:''
	            ]);
	            return response()->json(['valid'=>true,'message'=>'About page products section setting created  successfully.']);
            }
        }
   	}
}
