<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConstants;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class Installation extends Controller
{
    protected function get()
    {
    	return view('installation/index');
    }
    protected function start()
    {
    	$count=SiteConstants::count();
    	return view('installation/start',['count'=>$count]);
    }
    protected function post(Request $request)
    {
    	$messages=[
    		'first_name.required'=>'First name is required',
    		'last_name.required'=>'Last name is required',
    		'email.required'=>'Email address is required',
    		'username.required'=>'Username is required',
    		'phone.required'=>'Phone is required',
    		'site_name.required'=>'Site name is required',
    		'site_url.required'=>'Site URL is required',
            'password2.required'=>'Confirm password is required',
            'password2.same'=>'Password mismatch'
        ];
    	$validator=Validator::make($request->all(),
    	[
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'required|email|unique:users|regex:/(.+)@(.+)\.(.+)/i',
            'username'=>'required|unique:users',
            'phone'=>'required|numeric',
            'site_name'=>'required',
            'site_url'=>'required|url',
            'password'=>'required|min:6',
            'password2'=>'required|min:6|required_with:password|same:password'
        ],$messages);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	$user=User::insert(
        	[
                'name'=>$request->first_name .' '.$request->last_name,
                'email'=>$request->email,
                'username'=>$request->username,
                'phone'=>$request->phone,
                'is_superuser'=>true,
                'role'=>'superuser',
                'password'=>Hash::make($request->password)
            ]);
            if($user)
            {
            	$site=new SiteConstants();
	            $site->name=$request->first_name .''.$request->last_name;
	            $site->email=$request->email;
	            $site->phone=$request->phone;
	            $site->site_name=$request->site_name;
	            $site->site_url=$request->site_url;
	            $result=$site->save();
	            if($result)
	            {
	                return response()->json(['valid'=>true,'message'=>'Site installed successfully.']);
	            }
            }
        }

    }
}
