<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteConstants;
use App\Models\Contact;
use App\Models\User;
use App\Models\Product;

class DasboardView extends Controller
{
    protected function get()
    {
    	$site=SiteConstants::all()[0];
    	$admins=User::where('role','admin')->count();
    	$employees=User::where('role','employee')->count();
    	$unread=Contact::where('is_read',false)->count();
    	$read=Contact::where('is_read',true)->count();
    	$messages=Contact::all()->count();
        $products=Product::all()->count();
    	return view('admin.home',['products'=>$products,'site'=>$site,'employees'=>$employees,'admins'=>$admins,'unread'=>$unread,'messages'=>$messages,'read'=>$read]);
    }
}
