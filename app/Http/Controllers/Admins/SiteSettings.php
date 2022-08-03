<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteConstants;
use Validator;
use App\Models\Contact;


class SiteSettings extends Controller
{
    protected function get()
	{
		$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
    	return view('admin/settings',['unread'=>$unread,'site'=>$site]);
	}

	protected function update(Request $request)
	{
		$validator=Validator::make($request->all(),[
            'name'=>'required|string',
            'site_url'=>'required|url',
            'theme_color'=>'required',
            'site_descreption'=>'required',
            'favicon'=>'mimes:svg,ico,jgp,jpeg,png,gif'
        ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
            if($request->hasFile('favicon'))
            {
                $favicon=$request->file('favicon');
                $newfile=date('YmdHi').'_'.$favicon->getClientOriginalName();
                $favicon->move(public_path('logos'),$newfile);
            }
            SiteConstants::where('id',1)->update(
            [
                'site_name'=>$request->name,
                'site_keywords'=>$request->keywords,
                'site_url'=>$request->site_url,
                'theme_color'=>$request->theme_color,
                'site_descreption'=>$request->site_descreption,
                'favicon'=>isset($newfile) ? $newfile : 'favicon.ico',
            ]);
            return response()->json(['valid'=>true,'message'=>'Site settings updated successfully.']);
        	
        }
	}

	protected function contact(Request $request)
	{
		$validator=Validator::make($request->all(),[
            'email'=>'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'email_two'=>'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'location'=>'required',
            'site_address'=>'required',
            'phone'=>'required',
        ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	SiteConstants::where('id',1)->update(
            [
                'email'=>$request->email,
                'email_two'=>$request->email_two,
                'site_location'=>$request->location,
                'site_address'=>$request->site_address,
                'phone'=>$request->phone,
            ]);
            return response()->json(['valid'=>true,'message'=>'Site settings updated successfully.']);
        }
	}

	protected function working(Request $request)
	{
		$validator=Validator::make($request->all(),[
            'working_days'=>'required',
            'working_hours'=>'required',
        ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	SiteConstants::where('id',1)->update(
            [
                'working_hours'=>$request->working_hours,
                'working_hours'=>$request->working_hours
            ]);
            return response()->json(['valid'=>true,'message'=>'Site settings updated successfully.']);
        }
	}

	protected function links(Request $request)
	{
		$validator=Validator::make($request->all(),[
            'facebook'=>'required|url',
            'twitter'=>'required|url',
            'linkedin'=>'required|url',
            'instagram'=>'required|url',
            'youtube'=>'required|url',
            'whatsapp'=>'required|url',
        ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	SiteConstants::where('id',1)->update(
            [
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'linkedin'=>$request->linkedin,
                'instagram'=>$request->instagram,
                'youtube'=>$request->youtube,
                'whatsapp'=>$request->whatsapp
            ]);
            return response()->json(['valid'=>true,'message'=>'Site settings updated successfully.']);
        }
	}
}
