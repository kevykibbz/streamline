<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\Contact;
use App\Models\HomePage;
use Validator;
use App\Models\Developer;
use Illuminate\Support\Facades\File;

class DeveloperView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
    	return view('admin.homepage',['path'=>'developer','unread'=>$unread,'site'=>$site,'title'=>'Developers section settings']);
    } 
    protected function edit(Request $request)
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $developers=Developer::where('id',$request->id)->get()[0];
    	return view('admin.homepage',['path'=>'developer','developers'=>$developers,'unread'=>$unread,'site'=>$site,'title'=>'Developers section settings']);
    } 

    protected function update(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
            'image_420x466'=>'mimes:jpg,png,jpeg|dimensions:min_width=420,min_height=466,max_width=420,max_height=466',
            'name'=>'required|string',
            'title'=>'required|string',
            'item_name'=>'required|string'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	$home=Developer::where('id',$request->id)->get()[0];
        	if($request->hasFile('image_420x466'))
            {
            	if(File::exists(public_path().'/homepage/'.$home->image_420x466))
		        {
		        	File::delete(public_path().'/homepage/'.$home->image_420x466);
		        }
		        $image_420x466=$request->file('image_420x466');
	        	$newimage_420x466=date('YmdHi').'_1920x950_'.$image_420x466->getClientOriginalName();
	        	$image_420x466->move(public_path('homepage'),$newimage_420x466);
		        
            }

            Developer::where('id',$request->id)->update(
            [
                'image_270x300'=>isset($newimage_420x466) ? $newimage_420x466:$home->image_420x466,
                'name'=>$request->name,
                'title'=>$request->title,
                'item_name'=>$request->item_name,
                'preview'=>isset($newimage_420x466) ? $newimage_420x466:$home->image_420x466
            ]);
	        return response()->json(['valid'=>true,'message'=>'Developer updated  successfully.']);
        }
   	}

   	protected function save(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
	            'image_420x466'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=420,min_height=466,max_width=420,max_height=466',
	            'name'=>'required|string',
	            'title'=>'required|string',
	            'item_name'=>'required|string|unique:developers'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	if($request->hasFile('image_420x466'))
            {
                $image_420x466=$request->file('image_420x466');
                $newimage_420x466=date('YmdHi').'_420x466_'.$image_420x466->getClientOriginalName();
                $image_420x466->move(public_path('homepage'),$newimage_420x466);

		         Developer::insert(
	            [
	                'image_270x300'=>isset($newimage_420x466) ? $newimage_420x466:'',
	                'name'=>$request->name,
	                'title'=>$request->title,
	                'item_name'=>$request->item_name,
	                'preview'=>isset($newimage_420x466) ? $newimage_420x466:''
	            ]);
	            return response()->json(['valid'=>true,'message'=>'Developer created  successfully.']);
            }
        }
   	}
}
