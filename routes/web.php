<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function ()
{
    return view('welcome');
});

Route::get('/about/us', function ()
{
    return view('about');
});

Route::get('/contact/us',function ()
{
    return view('contact');
});
Route::get('/services',function ()
{
    return view('services');
});
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