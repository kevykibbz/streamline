<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\Contact;
use Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Category;

class ContactView extends Controller
{
    protected function get(Request $request)
    {
        $site=SiteConstants::all()[0];
        $categories=Category::all();
        return view('contact',['site'=>$site,'path'=>'contact','categories'=>$categories]);
    }
    protected function save(Request $request)
    {
        $messages=[
            'first_name.required'=>'First name is required',
            'last_name.required'=>'Last name is required',
            'email.required'=>'Email address is required',
            'phone.required'=>'Phone is required',
            'subject.required'=>'Subject is required',
            'message.required'=>'Message is required',
        ];
        $validator=Validator::make($request->all(),
        [
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'message'=>'required',
            'email'=>'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'phone'=>'required|numeric',
            'subject'=>'required'
        ],$messages);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
            $contact=new Contact();
            $contact->first_name=$request->first_name;
            $contact->last_name=$request->last_name;
            $contact->email=$request->email;
            $contact->phone=$request->phone;
            $contact->subject=$request->subject;
            $contact->message=$request->message;
            $result=$contact->save();
            if($result)
            {
                Mail::to($request->email)->send(new ContactMail());
                return response()->json(['valid'=>true,'message'=>'Message has been recorded successfully.']);
            }
        }
    }
}
