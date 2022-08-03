<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\SiteConstants;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Category;
use Validator;
use Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;


class ProductView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $products=Product::all();
    	return view('admin.products',['unread'=>$unread,'site'=>$site,'products'=>$products]);
    }

    protected function add()
    {
    	$site=SiteConstants::all()[0];
        $unread=Contact::where('is_read',false)->count();
        $categories=Category::all();
    	return view('admin.add_product',['unread'=>$unread,'site'=>$site,'title'=>'Add product','categories'=>$categories]);
    }

    protected function edit(Request $request)
    {
    	$site=SiteConstants::all()[0];
    	try
    	{
    		$product=Product::where('product_id',$request->product_id)->get()[0];
            $unread=Contact::where('is_read',false)->count();
            $categories=Category::all();
    		return view('admin.add_product',['categories'=>$categories,'unread'=>$unread,'site'=>$site,'title'=>'Edit product | '.$product->product_name,'product'=>$product]);
    	}
    	catch (Exception $e) 
    	{
    		abort(404);
    	}
    }

    protected function customized(Request $request)
    {
    	$site=SiteConstants::all()[0];
    	if(!isset($request->product_id))
    	{
    		return Redirect::to('/site/products');
    	}
    	try
    	{
    		$product=Product::where('product_id',$request->product_id)->get()[0];
            $unread=Contact::where('is_read',false)->count();
    		return view('admin.customized',['unread'=>$unread,'site'=>$site,'title'=>'Add customized image','product'=>$product]);
    	}
    	catch (Exception $e) 
    	{
    		abort(404);
    	}
    }
    protected function delete(Request $request)
    {
    	$product=Product::where('product_id',$request->product_id)->get()[0];
    	if(File::exists(public_path().'/products/'.$product->image_300))
        {
        	File::delete(public_path().'/products/'.$product->image_300);
        }
        if(File::exists(public_path().'/products/'.$product->image_1000))
        {
        	File::delete(public_path().'/products/'.$product->image_1000);
        }
        if(File::exists(public_path().'/products/'.$product->image_768))
        {
        	File::delete(public_path().'/products/'.$product->image_768);
        }
        if(File::exists(public_path().'/products/'.$product->image_600))
        {
        	File::delete(public_path().'/products/'.$product->image_600);
        }
        if(File::exists(public_path().'/products/'.$product->image_150))
        {
        	File::delete(public_path().'/products/'.$product->image_150);
        }
        $product->delete();
        return response()->json(['valid'=>true,'message'=>'product deleted  successfully.']);
    } 

    protected function custompost(Request $request)
    {
    	$validator=Validator::make($request->all(),[
            'image_1000'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=1000,min_height=1000',
            'image_768'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=768,min_height=768',
            'image_600'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=600,min_height=600',
            'image_300'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=300,min_height=300',
            'image_150'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=150,min_height=150',
            'image_100'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=100,min_height=100',
        ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	$product=Product::where('product_id',$request->product_id)->get()[0];
        	if(File::exists(public_path().'/products/'.$product->image_300))
	        {
	        	File::delete(public_path().'/products/'.$product->image_300);
	        }
        	$uploaded_300=$request->file('image_300');
        	$newimage_300=date('YmdHi').'_300x300_'.$uploaded_300->getClientOriginalName();
        	$uploaded_300->move(public_path('products'),$newimage_300);

	        if(File::exists(public_path().'/products/'.$product->image_1000))
	        {
	        	File::delete(public_path().'/products/'.$product->image_1000);
	        }
	        $uploaded_1000=$request->file('image_1000');
        	$newimage_1000=date('YmdHi').'_1000x1000_'.$uploaded_1000->getClientOriginalName();
        	$uploaded_1000->move(public_path('products'),$newimage_1000);

	        if(File::exists(public_path().'/products/'.$product->image_768))
	        {
	        	File::delete(public_path().'/products/'.$product->image_768);
	        }
	        $uploaded_768=$request->file('image_768');
        	$newimage_768=date('YmdHi').'_768x768_'.$uploaded_768->getClientOriginalName();
        	$uploaded_768->move(public_path('products'),$newimage_768);

	        if(File::exists(public_path().'/products/'.$product->image_600))
	        {
	        	File::delete(public_path().'/products/'.$product->image_600);
	        }
	        $uploaded_600=$request->file('image_600');
        	$newimage_600=date('YmdHi').'_600x600_'.$uploaded_600->getClientOriginalName();
        	$uploaded_600->move(public_path('products'),$newimage_600);

	        if(File::exists(public_path().'/products/'.$product->image_150))
	        {
	        	File::delete(public_path().'/products/'.$product->image_150);
	        }
	        $uploaded_150=$request->file('image_150');
        	$newimage_150=date('YmdHi').'_150x150_'.$uploaded_150->getClientOriginalName();
        	$uploaded_150->move(public_path('products'),$newimage_150);

        	if(File::exists(public_path().'/products/'.$product->image_100))
	        {
	        	File::delete(public_path().'/products/'.$product->image_100);
	        }
	        $uploaded_100=$request->file('image_100');
        	$newimage_100=date('YmdHi').'_150x150_'.$uploaded_100->getClientOriginalName();
        	$uploaded_100->move(public_path('products'),$newimage_100);

        	$results=Product::where('product_id',$request->product_id)->update(
            [
                'image_1000'=>isset($newimage_1000)? $newimage_1000:$files->image_1000,
                'image_768'=>isset($newimage_768)? $newimage_768:$files->image_768,
                'image_600'=>isset($newimage_600)? $newimage_600:$files->image_600,
                'image_300'=>isset($newimage_300)? $newimage_300:$files->image_300,
                'image_150'=>isset($newimage_150)? $newimage_150:$files->image_150,
                'image_100'=>isset($newimage_100)? $newimage_100:$files->image_100,
            ]);
            if($results)
            {
            	return response()->json(['valid'=>true,'message'=>'Product images updated  successfully.']);
            }
        }
    }

    protected function update(Request $request)
	{
		$validator=Validator::make($request->all(),[
          'product_name'=>'required|string',
            'category'=>'required|string',
            'tagname'=>'required|string',
            'image_1000'=>'mimes:jpg,png,jpeg|dimensions:min_width=1000,min_height=1000,max_width=1000,max_height=1000', 
            'image_768'=>'mimes:jpg,png,jpeg|dimensions:min_width=768,min_height=768,max_width=768,max_height=768', 
            'image_600'=>'mimes:jpg,png,jpeg|dimensions:min_width=600,min_height=600,max_width=600,max_height=600', 
            'image_300'=>'mimes:jpg,png,jpeg|dimensions:min_width=300,min_height=300,max_width=300,max_height=300',
            'image_150'=>'mimes:jpg,png,jpeg|dimensions:min_width=150,min_height=150,max_width=150,max_height=150',
            'image_100'=>'mimes:jpg,png,jpeg|dimensions:min_width=100,min_height=100,max_width=100,max_height=100',
        ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
        	$files=Product::where('product_id',$request->product_id)->get()[0];
        	if($request->hasFile('logo'))
            {
                if(File::exists(public_path().'/products/logos/'.$files->logo))
                {
                    File::delete(public_path().'/products/logos/'.$files->logo);
                }
                $logo=$request->file('logo');
                $newlogo=date('YmdHi').'_'.$logo->getClientOriginalName();
                $logo->move(public_path('products/logos'),$newlogo);
            }

            /*300x300*/
            if($request->hasFile('image_300'))
            {
                $image_300=$request->file('image_300');
                $newimage_300=date('YmdHi').'_300x300_'.$image_300->getClientOriginalName();
                if(File::exists(public_path().'/products/'.$files->image_300))
                {
                    File::delete(public_path().'/products/'.$files->image_300);
                }
                $image_300->move(public_path('products'),$newimage_300);
            }
            /*600x600*/
            if($request->hasFile('image_600'))
            {
                $image_600=$request->file('image_600');
                $newimage_600=date('YmdHi').'_600x600_'.$image_600->getClientOriginalName();
                if(File::exists(public_path().'/products/'.$files->image_600))
                {
                    File::delete(public_path().'/products/'.$files->image_600);
                }
                $image_600->move(public_path('products'),$newimage_600);
            }
            /*1000x1000*/
            if($request->hasFile('image_1000'))
            {
                $image_1000=$request->file('image_1000');
                $newimage_1000=date('YmdHi').'_1000x1000_'.$image_1000->getClientOriginalName();
                if(File::exists(public_path().'/products/'.$files->image_1000))
                {
                    File::delete(public_path().'/products/'.$files->image_1000);
                }
                $image_1000->move(public_path('products'),$newimage_1000);
            }   
            /*100x100*/
            if($request->hasFile('image_100'))
            {
                $image_100=$request->file('image_100');
                $newimage_100=date('YmdHi').'_100x100_'.$image_100->getClientOriginalName();
                if(File::exists(public_path().'/products/'.$files->image_100))
                {
                    File::delete(public_path().'/products/'.$files->image_100);
                }
                $image_100->move(public_path('products'),$newimage_100);
            }

            /*150x150*/
            if($request->hasFile('image_150'))
            {
                $image_150=$request->file('image_150');
                $newimage_150=date('YmdHi').'_150x150_'.$image_150->getClientOriginalName();
                if(File::exists(public_path().'/products/'.$files->image_150))
                {
                    File::delete(public_path().'/products/'.$files->image_150);
                }
                $image_150->move(public_path('products'),$newimage_150);
            }
            /*768x768*/
            if($request->hasFile('image_768'))
            {
                $image_768=$request->file('image_768');
                $newimage_768=date('YmdHi').'_768x768_'.$image_768->getClientOriginalName();
                if(File::exists(public_path().'/products/'.$files->image_768))
                {
                    File::delete(public_path().'/products/'.$files->image_768);
                }
                $image_768->move(public_path('products'),$newimage_768);
            }

          

            $results=Product::where('product_id',$request->product_id)->update(
            [
                'product_name'=>$request->product_name,
                'category'=>$request->category,
                'tagname'=>$request->tagname,
                'weight'=>$request->weight,
                'dimension'=>$request->dimension,
                'color'=>$request->color,
                'logo'=>$request->logo,
                'description'=>$request->description,
                'logo'=>isset($newlogo)? $newlogo:'',
                'image_1000'=>isset($newimage_1000)? $newimage_1000:$files->image_1000,
                'image_768'=>isset($newimage_768)? $newimage_768:$files->image_768,
                'image_600'=>isset($newimage_600)? $newimage_600:$files->image_600,
                'image_300'=>isset($newimage_300)? $newimage_300:$files->image_300,
                'image_150'=>isset($newimage_150)? $newimage_150:$files->image_150,
                'image_100'=>isset($newimage_100)? $newimage_100:$files->image_100,
            ]);
            if($results)
            {
            	return response()->json(['valid'=>true,'message'=>'Product updated  successfully.']);
            }
        }
	}



    protected function save(Request $request)
    {
    	$validator=Validator::make($request->all(),[
            'product_name'=>'required|string',
            'category'=>'required|string',
            'tagname'=>'required|string',
            'image_1000'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=1000,min_height=1000,max_width=1000,max_height=1000', 
            'image_768'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=768,min_height=768,max_width=768,max_height=768', 
            'image_600'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=600,min_height=600,max_width=600,max_height=600', 
            'image_300'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=300,min_height=300,max_width=300,max_height=300',
            'image_150'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=150,min_height=150,max_width=150,max_height=150',
            'image_100'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=100,min_height=100,max_width=100,max_height=100',
        ]);

        if(!$validator->passes())
        {
            return response()->json(['valid'=>false,'errors'=>$validator->errors()->toarray()]);
        }
        else
        {
           if($request->hasFile('logo'))
           {
           	 	$logo=$request->file('logo');
                $newlogo=date('YmdHi').'_'.$logo->getClientOriginalName();
                $logo->move(public_path('products/logos'),$newlogo);
           }

           if($request->hasFile('image_1000'))
           {
                /*300x300 resize*/
           	 	$image_300=$request->file('image_300');
                $newimage_300=date('YmdHi').'_300x300_'.$image_300->getClientOriginalName();
                $image_300->move(public_path('products'),$newimage_300);

                /*1000x1000 resize*/
                $image_1000=$request->file('image_1000');
                $newimage_1000=date('YmdHi').'_1000x1000_'.$image_1000->getClientOriginalName();
                $image_1000->move(public_path('products'),$newimage_1000);

                /*768x768 resize*/
                $image_768=$request->file('image_768');
                $newimage_768=date('YmdHi').'_768x768_'.$image_768->getClientOriginalName();
                $image_768->move(public_path('products'),$newimage_768);

                /*600x600 resize*/
                $image_600=$request->file('image_600');
                $newimage_600=date('YmdHi').'_600x600_'.$image_600->getClientOriginalName();
                $image_600->move(public_path('products'),$newimage_600);

                /*150x150 resize*/
                $image_150=$request->file('image_150');
                $newimage_150=date('YmdHi').'_150x150_'.$image_150->getClientOriginalName();
                $image_150->move(public_path('products'),$newimage_150); 

                /*100x100 resize*/
                $image_100=$request->file('image_100');
                $newimage_100=date('YmdHi').'_100x100_'.$image_100->getClientOriginalName();
                $image_100->move(public_path('products'),$newimage_100);
                
                $results=Product::insert(
	            [
	                'product_id'=>Str::random(20),
	                'product_name'=>$request->product_name,
	                'category'=>$request->category,
	                'tagname'=>$request->tagname,
	                'weight'=>$request->weight,
	                'dimension'=>$request->dimension,
	                'color'=>$request->color,
	                'logo'=>$request->logo,
	                'description'=>$request->description,
	                'logo'=>isset($newlogo)? $newlogo:'',
	                'image_1000'=>isset($newimage_1000)? $newimage_1000:'',
	                'image_768'=>isset($newimage_768)? $newimage_768:'',
	                'image_600'=>isset($newimage_600)? $newimage_600:'',
	                'image_300'=>isset($newimage_300)? $newimage_300:'',
	                'image_150'=>isset($newimage_150)? $newimage_150:'',
	                'image_100'=>isset($newimage_100)? $newimage_100:'',
	            ]);
	            if($results)
	            {
	            	return response()->json(['valid'=>true,'message'=>'Product added  successfully.']);
	            }
           }


        }
    }
}
