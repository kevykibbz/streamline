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
use App\Models\HomeProduct;

class HomeView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
    	return view('admin.homepage',['path'=>'banner','unread'=>$unread,'site'=>$site,'title'=>'Home banner slider  settings']);
    } 
    protected function edit(Request $request)
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $home=HomePage::where('id',$request->id)->get()[0];
    	return view('admin.homepage',['path'=>'banner','home'=>$home,'unread'=>$unread,'site'=>$site,'title'=>'Home banner slidersettings']);
    } 
    protected function view()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $home=HomePage::all();
        $middle=Middle::all();
        $middlepart=MiddlePartOne::all();
        $middleparttwo=MiddlePartB::all();
        $middlepart3=MiddlePartC::all();
        $developers=Developer::all();
        $reviews=Review::all();
        $product=HomeProduct::all();
    	return view('admin.homeview',[
    		'home'=>$home,
    		'middle'=>$middle,
    		'unread'=>$unread,
    		'site'=>$site,
    		'title'=>'Home page settings',
            'middlepart'=>$middlepart,
            'middleparttwo'=>$middleparttwo,
            'middlepart3'=>$middlepart3,
            'developers'=>$developers,
            'reviews'=>$reviews,
            'product'=>$product,
    	]);
    }

    protected function update(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
            'heading_strong'=>'required|string',
            'heading_plain'=>'required|string',
            'text'=>'required|string',
            'item_name'=>'required|string',
            'slider_100x50'=>'mimes:jpg,png,jpeg|dimensions:min_width=100,min_height=50,max_width=100,max_height=50',
            'slider_1920x950'=>'mimes:jpg,png,jpeg|dimensions:min_width=1920,min_height=950,max_width=1920,max_height=950',
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	$home=HomePage::where('id',$request->id)->get()[0];
        	if($request->hasFile('slider_1920x950'))
            {
            	if(File::exists(public_path().'/homepage/'.$home->slider_1920x950))
		        {
		        	File::delete(public_path().'/homepage/'.$home->slider_1920x950);
		        }
		        $slider_1920x950=$request->file('slider_1920x950');
	        	$newslider_1920x950=date('YmdHi').'_1920x950_'.$slider_1920x950->getClientOriginalName();
	        	$slider_1920x950->move(public_path('homepage'),$newslider_1920x950);
		        
            }
        	if($request->hasFile('slider_100x50'))
            {
            	if(File::exists(public_path().'/homepage/'.$home->slider_100x50))
		        {
		        	File::delete(public_path().'/homepage/'.$home->slider_100x50);
		        }
		        $slider_100x50=$request->file('slider_100x50');
	        	$newslider_100x50=date('YmdHi').'_100x50_'.$slider_100x50->getClientOriginalName();
	        	$slider_100x50->move(public_path('homepage'),$newslider_100x50);
		        
            }

            HomePage::where('id',$request->id)->update(
            [
                'slider_100x50'=>isset($newslider_100x50) ? $newslider_100x50:$home->slider_100x50,
                'slider_1920x950'=>isset($newslider_1920x950) ? $newslider_1920x950:$home->slider_1920x950,
                'heading_strong'=>$request->heading_strong,
                'heading_plain'=>$request->heading_plain,
                'text'=>$request->text,
                'item_name'=>$request->item_name,
                'preview'=>isset($newslider_1920x950) ? $newslider_1920x950:$home->slider_1920x950
            ]);
	        return response()->json(['valid'=>true,'message'=>'Home Banner Slider Settings  updated  successfully.']);
        }
   	}

   	protected function save(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
	            'slider_100x50'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=100,min_height=50,max_width=100,max_height=50',
	            'slider_1920x950'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=1920,min_height=950,max_width=1920,max_height=950',
	            'heading_strong'=>'required|string',
	            'heading_plain'=>'required|string',
	            'text'=>'required|string',
	            'item_name'=>'required|string|unique:home_pages'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	if($request->hasFile('slider_100x50') and $request->hasFile('slider_1920x950'))
            {
            	/* slider 100x50*/
                $slider_100x50=$request->file('slider_100x50');
                $newslider_100x50=date('YmdHi').'_100x50_'.$slider_100x50->getClientOriginalName();
                $slider_100x50->move(public_path('homepage'),$newslider_100x50);

                /* slider 1920x950*/
                $slider_1920x950=$request->file('slider_1920x950');
                $newslider_1920x950=date('YmdHi').'_1920x950_'.$slider_1920x950->getClientOriginalName();
                $slider_1920x950->move(public_path('homepage'),$newslider_1920x950);

	           HomePage::insert(
	            [
	                'slider_100x50'=>isset($newslider_100x50) ? $newslider_100x50:'',
	                'slider_1920x950'=>isset($newslider_1920x950) ? $newslider_1920x950:'',
	                'heading_strong'=>$request->heading_strong,
	                'heading_plain'=>$request->heading_plain,
	                'text'=>$request->text,
	                'item_name'=>$request->item_name,
	                'preview'=>isset($newslider_1920x950) ? $newslider_1920x950:''
	            ]);
	            return response()->json(['valid'=>true,'message'=>'Home Banner Slider Settings  created  successfully.']);
            }
        }
   	}
}
