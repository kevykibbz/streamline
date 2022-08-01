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
            'prev_price'=>'required|numeric',
            'price'=>'required|numeric',
            'image'=>'mimes:jpg,png,jpeg|dimensions:min_width=100,min_height=100'
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
           	 	$logo=$request->file('logo');
                $newlogo=date('YmdHi').'_'.$logo->getClientOriginalName();
                $logo->move(public_path('products/logos'),$newlogo);
           	}

           	if($request->hasFile('image'))
           	{
           	 	$image=$request->file('image');
           	 	/*300x300 resize*/
                $newimage300=date('YmdHi').'_300x300_'.$image->getClientOriginalName();
                $image_resize=Image::make($image->getRealPath());
                $image_resize->resize(300,300);
                if(File::exists(public_path().'/products/'.$files->image_300))
	            {
	            	File::delete(public_path().'/products/'.$files->image_300);
	            }
                $image_resize->save(public_path('products/'.$newimage300));

                /*1000x1000 resize*/
                $newimage1000=date('YmdHi').'_1000x1000_'.$image->getClientOriginalName();
                $image_resize=Image::make($image->getRealPath());
                $image_resize->resize(1000,1000);
                if(File::exists(public_path().'/products/'.$files->image_1000))
	            {
	            	File::delete(public_path().'/products/'.$files->image_1000);
	            }
                $image_resize->save(public_path('products/'.$newimage1000));

                /*768x768 resize*/
                $newimage768=date('YmdHi').'_768x768_'.$image->getClientOriginalName();
                $image_resize=Image::make($image->getRealPath());
                $image_resize->resize(768,768);
                if(File::exists(public_path().'/products/'.$files->image_768))
	            {
	            	File::delete(public_path().'/products/'.$files->image_768);
	            }
                $image_resize->save(public_path('products/'.$newimage768));

                /*600x600 resize*/
                $newimage600=date('YmdHi').'_600x600_'.$image->getClientOriginalName();
                $image_resize=Image::make($image->getRealPath());
                $image_resize->resize(600,600);
                if(File::exists(public_path().'/products/'.$files->image_600))
	            {
	            	File::delete(public_path().'/products/'.$files->image_600);
	            }
                $image_resize->save(public_path('products/'.$newimage600));

                /*150x150 resize*/
                $newimage150=date('YmdHi').'_150x150_'.$image->getClientOriginalName();
                $image_resize=Image::make($image->getRealPath());
                $image_resize->resize(150,150);
                if(File::exists(public_path().'/products/'.$files->image_150))
	            {
	            	File::delete(public_path().'/products/'.$files->image_150);
	            }
                $image_resize->save(public_path('products/'.$newimage150));

                /*100x100 resize*/
                $newimage100=date('YmdHi').'_100x100_'.$image->getClientOriginalName();
                $image_resize=Image::make($image->getRealPath());
                $image_resize->resize(100,100);
                if(File::exists(public_path().'/products/'.$files->image_100))
	            {
	            	File::delete(public_path().'/products/'.$files->image_100);
	            }
                $image_resize->save(public_path('products/'.$newimage100));
	        }

          

            $results=Product::where('product_id',$request->product_id)->update(
            [
                'product_name'=>$request->product_name,
                'category'=>$request->category,
                'tagname'=>$request->tagname,
                'price'=>$request->price,
               	'prev_price'=>$request->prev_price,
                'weight'=>$request->weight,
                'dimension'=>$request->dimension,
                'color'=>$request->color,
                'logo'=>$request->logo,
                'description'=>$request->description,
                'logo'=>isset($newlogo)? $newlogo:'',
                'image_1000'=>isset($newimage1000)? $newimage1000:$files->image_1000,
                'image_768'=>isset($newimage768)? $newimage768:$files->image_768,
                'image_600'=>isset($newimage600)? $newimage600:$files->image_600,
                'image_300'=>isset($newimage300)? $newimage300:$files->image_300,
                'image_150'=>isset($newimage150)? $newimage150:$files->image_150,
                'image_100'=>isset($newimage100)? $newimage100:$files->image_100,
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
            'price'=>'required|numeric',
            'prev_price'=>'required|numeric',
            'image'=>'required|mimes:jpg,png,jpeg|dimensions:min_width=100,min_height=100'
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

           if($request->hasFile('image'))
           {
           	 	$image=$request->file('image');
           	 	/*300x300 resize*/
                $newimage300=date('YmdHi').'_300x300_'.$image->getClientOriginalName();
                $image_resize=Image::make($image->getRealPath());
                $image_resize->resize(300,300);
                $image_resize->save(public_path('products/'.$newimage300));

                /*1000x1000 resize*/
                $newimage1000=date('YmdHi').'_1000x1000_'.$image->getClientOriginalName();
                $image_resize=Image::make($image->getRealPath());
                $image_resize->resize(1000,1000);
                $image_resize->save(public_path('products/'.$newimage1000));

                /*768x768 resize*/
                $newimage768=date('YmdHi').'_768x768_'.$image->getClientOriginalName();
                $image_resize=Image::make($image->getRealPath());
                $image_resize->resize(768,768);
                $image_resize->save(public_path('products/'.$newimage768));

                /*600x600 resize*/
                $newimage600=date('YmdHi').'_600x600_'.$image->getClientOriginalName();
                $image_resize=Image::make($image->getRealPath());
                $image_resize->resize(600,600);
                $image_resize->save(public_path('products/'.$newimage600));

                /*150x150 resize*/
                $newimage150=date('YmdHi').'_150x150_'.$image->getClientOriginalName();
                $image_resize=Image::make($image->getRealPath());
                $image_resize->resize(150,150);
                $image_resize->save(public_path('products/'.$newimage150)); 

                /*100x100 resize*/
                $newimage100=date('YmdHi').'_100x100_'.$image->getClientOriginalName();
                $image_resize=Image::make($image->getRealPath());
                $image_resize->resize(100,100);
                $image_resize->save(public_path('products/'.$newimage100));
                
                $results=Product::insert(
	            [
	                'product_id'=>Str::random(20),
	                'product_name'=>$request->product_name,
	                'category'=>$request->category,
	                'tagname'=>$request->tagname,
	                'price'=>$request->price,
	                'prev_price'=>$request->prev_price,
	                'weight'=>$request->weight,
	                'dimension'=>$request->dimension,
	                'color'=>$request->color,
	                'logo'=>$request->logo,
	                'description'=>$request->description,
	                'logo'=>isset($newlogo)? $newlogo:'',
	                'image_1000'=>isset($newimage1000)? $newimage1000:'',
	                'image_768'=>isset($newimage768)? $newimage768:'',
	                'image_600'=>isset($newimage600)? $newimage600:'',
	                'image_300'=>isset($newimage300)? $newimage300:'',
	                'image_150'=>isset($newimage150)? $newimage150:'',
	                'image_100'=>isset($newimage100)? $newimage100:'',
	            ]);
	            if($results)
	            {
	            	return response()->json(['valid'=>true,'message'=>'Product added  successfully.']);
	            }
           }


        }
    }
}
