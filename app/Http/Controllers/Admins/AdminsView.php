<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Models\Contact;



class AdminsView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
    	$admins=User::where('role','admin')->get();
        $unread=Contact::where('is_read',false)->count();
    	return view('admin.admins',['unread'=>$unread,'site'=>$site,'admins'=>$admins]);
    } 
    protected function delete(Request$request)
    {
    	User::where('id',$request->id)->delete();
        $site=SiteConstants::all()[0];
        return response()->json(['valid'=>true,'message'=>'Admin deleted  successfully.']);
    } 
    protected function add()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
    	return view('admin.add_admins',['unread'=.$unread,'site'=>$site,'title'=>'Add Admins']);
    }
    protected function edit(Request $request)
    {
    	$site=SiteConstants::all()[0];
    	try
    	{
    		$admin=User::where('id',$request->id)->get()[0];
            $unread=Contact::where('is_read',false)->count();
    		return view('admin.add_admins',['unread'=>$unread,'site'=>$site,'title'=>'Edit Admin | '.$admin->name,'admin'=>$admin]);
    	}
    	catch (Exception $e) 
    	{
    		abort(404);
    	}
    }
    
    protected function update(Request $request)
    {
    	$validator=Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'username'=>'required',
            'phone'=>'required|numeric',
        ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	if(!empty($request->profilepic))
        	{
        		$profile=$request->file('profilepic');
		        $newfile=date('YmdHi').'_'.$profile->getClientOriginalName();
		        $profile->move(public_path('profiles'),$newfile);
        	}
            User::where('id',$request->id)->update(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'username'=>$request->username,
                'profile'=>isset($newfile) ? $newfile : 'placeholder.jpg',
            ]);
            return response()->json(['valid'=>true,'message'=>'Admin updated  successfully.']);
        }
    } 
    protected function save(Request $request)
    {
    	$validator=Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email|unique:users|regex:/(.+)@(.+)\.(.+)/i',
            'username'=>'required|unique:users',
            'phone'=>'required|numeric|unique:users',
            'password'=>'required|min:6',
            'confirm_password'=>'required|min:6|required_with:password|same:password',
        ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	if(!empty($request->profilepic))
        	{
        		$profile=$request->file('profilepic');
		        $newfile=date('YmdHi').'_'.$profile->getClientOriginalName();
		        $profile->move(public_path('profiles'),$newfile);
        	}
            User::insert(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'username'=>$request->username,
                'role'=>'admin',
                'profile'=>isset($newfile) ? $newfile : 'placeholder.jpg',
                'password'=>Hash::make($request->password)
            ]);
            return response()->json(['valid'=>true,'message'=>'Admin created  successfully.']);
        }
    }
}
