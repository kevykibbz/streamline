<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\DasboardView;
use App\Http\Controllers\Admins\ProfileView;
use App\Http\Controllers\Admins\MessagesView;
use App\Http\Controllers\Admins\AdminsView;
use App\Http\Controllers\Admins\CategoryView;
use App\Http\Controllers\Admins\EmployeesView;
use App\Http\Controllers\Admins\SiteSettings;
use App\Http\Controllers\Admins\LoginView;
use App\Http\Controllers\ContactView;
use App\Http\Controllers\Installation;
use App\Models\SiteConstants;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;


Route::get('/', function ()
{
    $site=SiteConstants::all()[0];
    $categories=Category::all();
    return view('welcome',['site'=>$site,'path'=>'home','categories'=>$categories]);
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
    Route::get('/admins',[AdminsView::class,'get']);
    Route::get('/add/admins',[AdminsView::class,'add']);
    Route::get('/edit/admin/{id}',[AdminsView::class,'edit']);
    Route::get('/delete/admin/{id}',[AdminsView::class,'delete']);
    Route::post('/edit/admin/{id}',[AdminsView::class,'update']);
    Route::post('/add/admins',[AdminsView::class,'save']);
    Route::get('/employees',[EmployeesView::class,'get']);
    Route::get('/add/employees',[EmployeesView::class,'add']);
    Route::post('/add/employees',[EmployeesView::class,'save']);
    Route::get('/edit/employee/{id}',[EmployeesView::class,'edit']);
    Route::post('/edit/employee/{id}',[EmployeesView::class,'update']);
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
    Route::get('/categories',[CategoryView::class,'get']);
    Route::get('/add/category',[CategoryView::class,'add']);
    Route::post('/add/category',[CategoryView::class,'save']);
    Route::get('/edit/category/{id}',[CategoryView::class,'edit']);
    Route::post('/edit/category/{id}',[CategoryView::class,'update']);
    Route::get('/delete/category/{id}',[CategoryView::class,'delete']);
});

#installation
Route::get('/site/installation',[Installation::class,'get']);
Route::post('/site/installation',[Installation::class,'post']);
Route::get('/start',[Installation::class,'start']);
