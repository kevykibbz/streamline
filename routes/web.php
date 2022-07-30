<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\DasboardView;
use App\Http\Controllers\Admins\ProfileView;
use App\Http\Controllers\Admins\MessagesView;
use App\Http\Controllers\Admins\SiteSettings;
use App\Http\Controllers\Admins\LoginView;
use App\Http\Controllers\ContactView;
use App\Http\Controllers\Installation;
use App\Models\SiteConstants;
use Illuminate\Support\Facades\Redirect;


Route::get('/', function ()
{
    $site=SiteConstants::all()[0];
    return view('welcome',['site'=>$site,'path'=>'home']);
});

Route::get('/about', function ()
{
    $site=SiteConstants::all()[0];
    return view('about',['site'=>$site,'path'=>'about']);
});

Route::get('/contact',[ContactView::class,'get']);
Route::post('/contact',[ContactView::class,'save']);

Route::get('/services',function ()
{
    $site=SiteConstants::all()[0];
    return view('services',['site'=>$site,'path'=>'services']);
});

#variables
Route::get('/bath/furniture',function ()
{

    return view('bath');
});


Route::get('/hot/tubs',function ()
{
    return view('tubs');
});

Route::get('/faucets',function ()
{
    return view('faucets');
});

Route::get('/wash/basin',function ()
{
    return view('wash');
});

Route::get('/saunas',function ()
{
    return view('saunas');
});

Route::get('/showers',function ()
{
    return view('showers');
});
Route::get('/description',function ()
{
    return view('description');
});

Route::get('/out/of/stock',function ()
{
    return view('out_of_stock');
});

Route::get('/cart',function ()
{
    return view('cart');
});
Route::get('/checkout',function ()
{
    return view('checkout');
});

Route::get('/management/login',array('as'=>'login',function()
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
}));
Route::get('/logout',[LoginView::class,'Logout']);
Route::post('/management/login',[LoginView::class,'Check']);

#admin
Route::group(['middleware' => 'auth'], function ()
{
    Route::get('/messages',[MessagesView::class,'get']);
    Route::get('/view/message/{id}',[MessagesView::class,'viewMessage']);
    Route::get('/delete/message/{id}',[MessagesView::class,'deleteMessage']);
    Route::post('/reply/message/{id}',[MessagesView::class,'reply']);
    Route::get('/management/dashboard',[DasboardView::class,'get']);
    Route::get('/management/site/settings',[SiteSettings::class,'get']);
    Route::post('/management/site/settings',[SiteSettings::class,'update']);
    Route::post('/management/contactinfo',[SiteSettings::class,'contact']);
    Route::post('/working/days',[SiteSettings::class,'working']);
    Route::post('/social/links',[SiteSettings::class,'links']);
    Route::get('/management/{username}',[ProfileView::class,'get']);
    Route::post('/management/{username}',[ProfileView::class,'update']);
    Route::post('/management/changepassword',[ProfileView::class,'userchangepassword']);
    Route::post('/management/profile/image',[ProfileView::class,'profilepic']);
});

#installation
Route::get('/site/installation',[Installation::class,'get']);
Route::post('/site/installation',[Installation::class,'post']);
Route::get('/start',[Installation::class,'start']);
