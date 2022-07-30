<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteConstants;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;


class ProfileView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
    	return view('admin/profile',['site'=>$site]);
    }

    protected function update(Request $request)
    {
    	$validator=Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'username'=>'required',
            'phone'=>'required|numeric'
        ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
            User::where('id',Auth::user()->id)->update(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'username'=>$request->username,
            ]);
            return response()->json(['valid'=>true,'message'=>'Profile  updated successfully.']);
        }
    }


    protected function userchangepassword(Request $request)
    {
    	$messages=[
            'cpassword.required'=>'Confirm password is required',
            'cnewpassword.same'=>'Password mismatch'
        ];
        $validator=Validator::make($request->all(),[
            'oldpassword'=>['required', new MatchOldPassword],
            'newpassword'=>'required|min:6',
            'cnewpassword'=>'required|min:6|required_with:newpassword|same:newpassword',
        ],$messages);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
            User::where('id',Auth::user()->id)->update(
            [
               'password'=>Hash::make($request->password)
           	]);
            return response()->json(['status'=>1,'message'=>'Password changed successfully']);
        }
    }
    protected function profilepic(Request $request)
    {
    	$profile=$request->file('profilepic');
        $newfile=date('YmdHi').'_'.$profile->getClientOriginalName();
        if($profile->move(public_path('profiles'),$newfile))
        {
            $result=User::where('id',Auth::user()->id)->update(['profile'=>$newfile]);
            if($result)
            {
                $path=url('profiles').'/'.$newfile;
                return response()->json(['valid'=>true,'message'=>'Profile picture saved  successfully.','profile'=>$path]);
            }
        }
    }
}
