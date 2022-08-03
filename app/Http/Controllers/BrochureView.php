<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\Contact;
use App\Models\HomePage;
use Validator;
use App\Models\MiddlePartOne;
use Illuminate\Support\Facades\File;
use App\Models\Brochure;

class BrochureView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
    	return view('admin.brochure',['path'=>'brochure','unread'=>$unread,'site'=>$site,'title'=>'Brochure page settings']);
    } 
    protected function edit(Request $request)
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $brochure=Brochure::where('id',$request->id)->get()[0];
    	return view('admin.brochure',['path'=>'brochure','brochure'=>$brochure,'unread'=>$unread,'site'=>$site,'title'=>'Brochure page settings']);
    } 

    protected function view()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $brochure=!empty(Brochure::count())? Brochure::all()[0]:[];
    	return view('admin.brochurepage',[
    		'unread'=>$unread,
    		'site'=>$site,
    		'title'=>'Brochure page settings',
            'brochure'=>$brochure,
    	]);
    } 
    protected function update(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
           	'pdf'=>'required|mimes:pdf,doc,txt',
            'title'=>'string',
            'text'=>'string',
            'item_name'=>'required|string'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	$home=Brochure::where('id',$request->id)->get()[0];
        	if($request->hasFile('pdf'))
            {
            	if(File::exists(public_path().'/brochure/'.$home->pdf))
		        {
		        	File::delete(public_path().'/brochure/'.$home->pdf);
		        }
		        $pdf=$request->file('pdf');
	        	$newpdf=date('YmdHi').'_'.$pdf->getClientOriginalName();
	        	$pdf->move(public_path('brochure'),$newpdf);
		        
            }

            Brochure::where('id',$request->id)->update(
            [
                'pdf'=>isset($newpdf) ? $newpdf:$home->pdf,
                'title'=>$request->name,
                'text'=>$request->text,
                'item_name'=>$request->item_name,
                'preview'=>isset($newpdf) ? $newpdf:$home->pdf
            ]);
	        return response()->json(['valid'=>true,'message'=>'Brochure page  section setting updated  successfully.']);
        }
   	}


   	protected function save(Request $request)
   	{
	   	$validator=Validator::make($request->all(),
	    [
            'pdf'=>'required|mimes:pdf,doc,txt',
            'title'=>'string',
            'text'=>'string',
            'item_name'=>'required|string|unique:brochures'
	    ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	if($request->hasFile('pdf'))
            {
            	/*pdf*/
                $pdf=$request->file('pdf');
                $newpdf=date('YmdHi').'_'.$pdf->getClientOriginalName();
                $pdf->move(public_path('brochure'),$newpdf);


	           Brochure::insert(
	            [
	                'pdf'=>isset($newpdf) ? $newpdf:'',
	                'title'=>$request->name,
	                'text'=>$request->text,
	                'item_name'=>$request->item_name,
	                'preview'=>isset($newpdf) ? $newpdf:''
	            ]);
	            return response()->json(['valid'=>true,'message'=>'Brochure page  section setting created  successfully.']);
            }
        }
   	}
}
