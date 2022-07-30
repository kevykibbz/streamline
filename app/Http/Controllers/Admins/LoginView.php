<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteConstants;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;

class LoginView extends Controller
{
    public function get()
    {
    	$count=SiteConstants::count();
    	if ($count ==0 )
    	{
    		return Redirect::to('/site/installation');
    	}
    	else
    	{
    		$site=SiteConstants::all()[0];
    		return view('auth/login',['site'=>$site]);
    	}
    }

    public function Logout(Request $request)
    {
       Auth::logout();
       echo"<script>window.location='/management/login';</script>";
    }

    protected function Check(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'email'=>'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'password'=>'required'
        ]);

        $remember_me=(!empty($request->remember_me))?true:false;
        if(!$validator->passes())
        {
            return response()->json(['valid'=>false, 'login'=>false,'message'=>'wrong login credentials','errors'=>$validator->errors()->toarray()]);
        }
        else
        {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
    	    {
                $user=User::where('email',$request->email)->first();
                Auth::login($user,$remember_me);
                return response()->json(['valid'=>true,'login'=>true,'message'=>'Logged in successfully']);
            }
            else
            {
                return response()->json(['valid'=>false, 'login'=>false,'message'=>'wrong login credentials']);
            }
        }
     }
}
