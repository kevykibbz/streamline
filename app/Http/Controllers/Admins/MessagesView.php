<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResponseMail;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\Contact;

class MessagesView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
    	$messages=Contact::all();
        $unread=Contact::where('is_read',false)->count();
    	return view('admin/messages',['unread'=>$unread,'site'=>$site,'messages'=>$messages]);
    }
    protected function viewMessage(Request $request)
    {
    	$site=SiteConstants::all()[0];
    	$message=Contact::where('id',$request->id)->get()[0];
        $unread=Contact::where('is_read',false)->count();
    	return view('admin/view_message',['unread'=>$unread,'site'=>$site,'message'=>$message]);
    } 

    protected function reply(Request $request)
    {
    	$messages=[
            'reply.required'=>'Response is required'
        ];
        $validator=Validator::make($request->all(),
        [
            'reply'=>'required'
        ],$messages);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	$data=Contact::where('id',$request->id)->get()[0];
        	$results=Contact::where('id',$request->id)->update(
        	[
        		'reply'=>$request->reply,
        		'is_read'=>1
        	]);
        	if($results)
        	{
        		Mail::to($data->email)->send(new ResponseMail($data));
            	return response()->json(['valid'=>true,'message'=>'Message sent successfully.']);
        	}
        }
    }

    protected function deleteMessage(Request $request)
    {
        Contact::where('id',$request->id)->delete();
        $site=SiteConstants::all()[0];
        $messages=Contact::all();
        return Redirect::to('/messages');
    }
}
