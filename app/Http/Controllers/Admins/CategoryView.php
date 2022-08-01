<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\Contact;
use App\Models\Category;
use Validator;

class CategoryView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $categories=Category::all();
    	return view('admin.category',['unread'=>$unread,'site'=>$site,'categories'=>$categories]);
    }

    protected function add()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
    	return view('admin.add_category',['unread'=>$unread,'site'=>$site,'title'=>'Add Category']);
    }

    protected function save(Request $request)
    {
    	$validator=Validator::make($request->all(),[
            'category'=>'required|string|unique:categories',
            'tagname'=>'required|string|unique:categories'
        ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
            Category::insert(
            [
                'category'=>$request->category,
                'tagname'=>$request->tagname
            ]);
            return response()->json(['valid'=>true,'message'=>'Category created  successfully.']);
        }
    }

    protected function edit(Request $request)
    {
    	$site=SiteConstants::all()[0];
    	try
    	{
    		$category=Category::where('id',$request->id)->get()[0];
            $unread=Contact::where('is_read',false)->count();
    		return view('admin.add_category',['unread'=>$unread,'site'=>$site,'title'=>'Edit category | '.$category->category,'category'=>$category]);
    	}
    	catch (Exception $e) 
    	{
    		abort(404);
    	}
    }

    protected function update(Request $request)
    {
    	$validator=Validator::make($request->all(),[
            'category'=>'required|string',
            'tagname'=>'required|string'
        ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
            Category::where('id',$request->id)->update(
            [
                'category'=>$request->category,
                'tagname'=>$request->tagname
            ]);
            return response()->json(['valid'=>true,'message'=>'Category updated  successfully.']);
        }
    }
    protected function delete(Request $request)
    {
    	Category::where('id',$request->id)->delete();
        return response()->json(['valid'=>true,'message'=>'Category deleted  successfully.']);
    } 
}
