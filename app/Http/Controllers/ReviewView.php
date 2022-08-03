<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\Contact;
use App\Models\HomePage;
use Validator;
use App\Models\Review;
use Illuminate\Support\Facades\File;

class ReviewView extends Controller
{
    protected function get()
    {
        $site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        return view('admin.homepage',['path'=>'review','unread'=>$unread,'site'=>$site,'title'=>'Customer reviews settings']);
    } 
    protected function edit(Request $request)
    {
        $site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $reviews=Review::where('id',$request->id)->get()[0];
        return view('admin.homepage',['path'=>'review','reviews'=>$reviews,'unread'=>$unread,'site'=>$site,'title'=>'Customer reviews settings']);
    } 

    protected function update(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
           'profile_300x300'=>'mimes:jpg,png,jpeg|dimensions:min_width=300,min_height=300,max_width=300,max_height=300',
            'name'=>'required|string',
            'title'=>'required|string',
            'review'=>'required|string',
            'item_name'=>'required|string'
        ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
            $home=Review::where('id',$request->id)->get()[0];
            if($request->hasFile('profile_300x300'))
            {
                if(File::exists(public_path().'/homepage/'.$home->profile_300x300))
                {
                    File::delete(public_path().'/homepage/'.$home->profile_300x300);
                }
                $profile_300x300=$request->file('profile_300x300');
                $newprofile_300x300=date('YmdHi').'_70x70_'.$profile_300x300->getClientOriginalName();
                $profile_300x300->move(public_path('homepage'),$newprofile_300x300);
                
            }

            Review::where('id',$request->id)->update(
            [
                'profile_300x300'=>isset($newprofile_300x300) ? $newprofile_300x300:$home->profile_300x300,
                'name'=>$request->name,
                'title'=>$request->title,
                'review'=>$request->review,
                'item_name'=>$request->item_name,
                'preview'=>isset($newprofile_300x300) ? $newprofile_300x300:$home->profile_300x300
            ]);
            return response()->json(['valid'=>true,'message'=>'Customer review  updated  successfully.']);
        }
    }

    protected function save(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
                'profile_300x300'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=300,min_height=300,max_width=300,max_height=300',
                'name'=>'required|string',
                'title'=>'required|string',
                'review'=>'required|string',
                'item_name'=>'required|string|unique:reviews'
        ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
            if($request->hasFile('profile_300x300'))
            {
                /* slider 100x50*/
                $profile_300x300=$request->file('profile_300x300');
                $newprofile_300x300=date('YmdHi').'_300x300_'.$profile_300x300->getClientOriginalName();
                $profile_300x300->move(public_path('homepage'),$newprofile_300x300);

               Review::insert(
                [
                    'profile_300x300'=>isset($newprofile_300x300) ? $newprofile_300x300:'',
                    'name'=>$request->name,
                    'title'=>$request->title,
                    'review'=>$request->review,
                    'item_name'=>$request->item_name,
                    'preview'=>isset($newprofile_300x300) ? $newprofile_300x300:''
                ]);
                return response()->json(['valid'=>true,'message'=>'Customer review created successfully.']);
            }
        }
    }
}
