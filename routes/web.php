<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\ProductView;
use App\Http\Controllers\Admins\DasboardView;
use App\Http\Controllers\Admins\ReviewView;
use App\Http\Controllers\Admins\ProfileView;
use App\Http\Controllers\Cart;
use App\Http\Controllers\Admins\MessagesView;
use App\Http\Controllers\Admins\AdminsView;
use App\Http\Controllers\Admins\CategoryView;
use App\Http\Controllers\ProductCategory;
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
    $site = SiteConstants::all()[0];
    $categories = Category::all();
    return view('welcome', [
        'site' => $site,
        'path' => 'home',
        'categories' => $categories,
    ]);
});

Route::get('/about', function () 
{
    $site = SiteConstants::all()[0];
    $categories = Category::all();
    return view('about', [
        'site' => $site,
        'path' => 'about',
        'categories' => $categories,
    ]);
});

Route::get('/contact', [ContactView::class, 'get']);
Route::post('/contact', [ContactView::class, 'save']);

Route::get('/services', function () 
{
    $site = SiteConstants::all()[0];
    $categories = Category::all();
    return view('services', [
        'site' => $site,
        'path' => 'services',
        'categories' => $categories,
    ]);
});





Route::get('/checkout', function () {

    $site = SiteConstants::all()[0];
    $categories = Category::all();
    return view('checkout', [
        'site' => $site,
        'path' => 'about',
        'categories' => $categories,
    ]);
});

Route::get('/management/login', [
    'as' => 'login',
    function () {
        $count = SiteConstants::count();
        if ($count == 0) {
            return Redirect::to('/site/installation');
        } else {
            $site = SiteConstants::all()[0];
            return view('auth/login', ['site' => $site]);
        }
    },
]);
Route::get('/logout', [LoginView::class, 'Logout']);
Route::post('/management/login', [LoginView::class, 'Check']);
Route::get('/products/{category}', [ProductCategory::class, 'get']);
Route::get('/product/description/{product_id}', [ProductCategory::class,'description']);
Route::get('/cart/{product_id}', [Cart::class,'get']);
Route::post('/product/review/{product_id}', [ReviewView::class, 'save']);

#admin
Route::group(['middleware' => 'auth'], function () {
    Route::get('/messages', [MessagesView::class, 'get']);
    Route::get('/admins', [AdminsView::class, 'get']);
    Route::get('/add/admins', [AdminsView::class, 'add']);
    Route::get('/edit/admin/{id}', [AdminsView::class, 'edit']);
    Route::get('/delete/admin/{id}', [AdminsView::class, 'delete']);
    Route::post('/edit/admin/{id}', [AdminsView::class, 'update']);
    Route::post('/add/admins', [AdminsView::class, 'save']);
    Route::get('/employees', [EmployeesView::class, 'get']);
    Route::get('/add/employees', [EmployeesView::class, 'add']);
    Route::post('/add/employees', [EmployeesView::class, 'save']);
    Route::get('/edit/employee/{id}', [EmployeesView::class, 'edit']);
    Route::post('/edit/employee/{id}', [EmployeesView::class, 'update']);
    Route::get('/view/message/{id}', [MessagesView::class, 'viewMessage']);
    Route::get('/delete/message/{id}', [MessagesView::class, 'deleteMessage']);
    Route::post('/reply/message/{id}', [MessagesView::class, 'reply']);
    Route::get('/management/dashboard', [DasboardView::class, 'get']);
    Route::get('/management/site/settings', [SiteSettings::class, 'get']);
    Route::post('/management/site/settings', [SiteSettings::class, 'update']);
    Route::post('/management/contactinfo', [SiteSettings::class, 'contact']);
    Route::post('/working/days', [SiteSettings::class, 'working']);
    Route::post('/social/links', [SiteSettings::class, 'links']);
    Route::get('/management/{username}', [ProfileView::class, 'get']);
    Route::post('/management/{username}', [ProfileView::class, 'update']);
    Route::post('/management/changepassword', [
        ProfileView::class,
        'userchangepassword',
    ]);
    Route::post('/management/profile/image', [
        ProfileView::class,
        'profilepic',
    ]);
    Route::get('/categories', [CategoryView::class, 'get']);
    Route::get('/add/category', [CategoryView::class, 'add']);
    Route::post('/add/category', [CategoryView::class, 'save']);
    Route::get('/edit/category/{id}', [CategoryView::class, 'edit']);
    Route::post('/edit/category/{id}', [CategoryView::class, 'update']);
    Route::get('/delete/category/{id}', [CategoryView::class, 'delete']);
    Route::get('/site/products', [ProductView::class, 'get']);
    Route::get('/add/product', [ProductView::class, 'add']);
    Route::post('/add/product', [ProductView::class, 'save']);
    Route::get('/edit/product/{product_id}', [ProductView::class, 'edit']);
    Route::post('/edit/product/{product_id}', [ProductView::class, 'update']);
    Route::get('/delete/product/{product_id}', [ProductView::class, 'delete']);
    Route::get('/customized/product/images/{product_id}', [
        ProductView::class,
        'customized',
    ]);
    Route::post('/customized/product/images/{product_id}', [
        ProductView::class,
        'custompost',
    ]);
});

#installation
Route::get('/site/installation', [Installation::class, 'get']);
Route::post('/site/installation', [Installation::class, 'post']);
Route::get('/start', [Installation::class, 'start']);

Route::get('/phpinfo', function () {
    return phpinfo();
});
