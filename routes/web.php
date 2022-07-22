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
