<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\ProductView;
use App\Http\Controllers\Admins\DasboardView;
use App\Http\Controllers\Admins\ProfileView;

use App\Http\Controllers\HomeView;
use App\Http\Controllers\AboutView;
use App\Http\Controllers\MiddleView;
use App\Http\Controllers\MiddlePartView;
use App\Http\Controllers\MiddlePartTwoView;
use App\Http\Controllers\MiddlePartThreeView;
use App\Http\Controllers\DeveloperView;
use App\Http\Controllers\ReviewView;
use App\Http\Controllers\MemoryView;
use App\Http\Controllers\FeaturedView;
use App\Http\Controllers\HomeProductView;
use App\Http\Controllers\BrochureView;

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
use App\Models\HomePage;
use App\Models\Middle;
use App\Models\MiddlePartOne;
use App\Models\MiddlePartB;
use App\Models\MiddlePartC;
use App\Models\Developer;
use App\Models\Review;
use App\Models\Memory;
use App\Models\Featured;
use App\Models\HomeProduct;
use App\Models\Brochure;
use App\Models\Product;


Route::get('/', function () 
{
    $site = SiteConstants::all()[0];
    $categories = Category::all();
    $homedata=HomePage::all();
    $middle=Middle::all();
    $middlepart=MiddlePartOne::all();
    $middlepartb=!empty(MiddlePartB::count())? MiddlePartB::all()[0]:[];
    $middlepartc=!empty(MiddlePartC::count())? MiddlePartC::all()[0]:[];
    $developers=Developer::all();
    $reviews=Review::all();
    $product=HomeProduct::all();
    return view('welcome', [
        'site' => $site,
        'path' => 'home',
        'categories' => $categories,
        'homedata'=>$homedata,
        'middle'=>$middle,
        'middlepart'=>$middlepart,
        'middlepartb'=>$middlepartb,
        'middlepartc'=>$middlepartc,
        'developers'=>$developers,
        'reviews'=>$reviews,
        'product'=>$product,
    ]);
});

Route::get('/about', function () 
{
    $site = SiteConstants::all()[0];
    $categories = Category::all();
    $developers=Developer::all();
    $middlepartc=!empty(MiddlePartC::count())? MiddlePartC::all()[0]:[];
    $reviews=Review::all();
    $memory=!empty(Memory::count())? Memory::all()[0]:[];
    $featured=Featured::all();
    return view('about', [
        'site' => $site,
        'path' => 'about',
        'developers'=>$developers,
        'reviews'=>$reviews,
        'middlepartc'=>$middlepartc,
        'categories' => $categories,
        'memory'=>$memory,
        'featured'=>$featured,
    ]);
});

Route::get('/contact', [ContactView::class, 'get']);
Route::post('/contact', [ContactView::class, 'save']);

Route::get('/privacy/policy', function () 
{
    $site = SiteConstants::all()[0];
    $categories = Category::all();
    return view('privacy', [
        'site' => $site,
        'path' => 'privacy',
        'categories' => $categories,
    ]);
});


Route::get('/pages/brochure', function () 
{
    $site = SiteConstants::all()[0];
    $categories = Category::all();
    $brochure=!empty(Brochure::count())? Brochure::all()[0]:[];
    return view('brochure', [
        'site' => $site,
        'path' => 'brochure',
        'categories' => $categories,
        'brochure'=>$brochure,
    ]);
});

Route::get('/pages/products', function () 
{
    $site = SiteConstants::all()[0];
    $categories = Category::all();
    $products=!empty(Product::count())? Product::all():[];
    return view('site_products', [
        'site' => $site,
        'path' => 'product',
        'categories' => $categories,
        'products'=>$products,
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


    #pages
    Route::get('/home/page', [
        HomeView::class,
        'get',
    ]); 
    Route::get('/home/settings', [
        HomeView::class,
        'view',
    ]);
     
    Route::get('/edit/banner/setting/{id}', [
        HomeView::class,
        'edit',
    ]); 
    Route::post('/edit/banner/setting/{id}', [
        HomeView::class,
        'update',
    ]);
    Route::post('/home/page', [
        HomeView::class,
        'save',
    ]);
    Route::get('/middle/section', [
        MiddleView::class,
        'get',
    ]);
    Route::post('/middle/section', [
        MiddleView::class,
        'save',
    ]); 
    Route::get('/edit/middle/setting/{id}', [
        MiddleView::class,
        'edit',
    ]);
    Route::post('/edit/middle/setting/{id}', [
        MiddleView::class,
        'update',
    ]);  

    Route::get('/middle/part/one', [
        MiddlePartView::class,
        'get',
    ]); 
    Route::get('/edit/partone/setting/{id}', [
        MiddlePartView::class,
        'edit',
    ]);  
    Route::post('/edit/partone/setting/{id}', [
        MiddlePartView::class,
        'update',
    ]);
    Route::post('/middle/part/one', [
        MiddlePartView::class,
        'save',
    ]);


    Route::get('/middle/part/two', [
        MiddlePartTwoView::class,
        'get',
    ]); 
    Route::post('/middle/part/two', [
        MiddlePartTwoView::class,
        'save',
    ]);
    Route::get('/edit/parttwo/setting/{id}', [
        MiddlePartTwoView::class,
        'edit',
    ]);  
    Route::post('/edit/parttwo/setting/{id}', [
        MiddlePartTwoView::class,
        'update',
    ]); 


    
    Route::get('/middle/part/three', [
        MiddlePartThreeView::class,
        'get',
    ]); 
    Route::post('/middle/part/three', [
        MiddlePartThreeView::class,
        'save',
    ]);
    Route::get('/edit/partthree/setting/{id}', [
        MiddlePartThreeView::class,
        'edit',
    ]);  
    Route::post('/edit/partthree/setting/{id}', [
        MiddlePartThreeView::class,
        'update',
    ]);

    

    Route::get('/developers', [
        DeveloperView::class,
        'get',
    ]); 
    Route::post('/developers', [
        DeveloperView::class,
        'save',
    ]);
    Route::get('/edit/developers/setting/{id}', [
        DeveloperView::class,
        'edit',
    ]);  
    Route::post('/edit/developers/setting/{id}', [
        DeveloperView::class,
        'update',
    ]);

    #ReviewView
    Route::get('/add/reviews', [
        ReviewView::class,
        'get',
    ]); 
    Route::post('/add/reviews', [
        ReviewView::class,
        'save',
    ]);
    Route::get('/edit/review/setting/{id}', [
        ReviewView::class,
        'edit',
    ]);  
    Route::post('/edit/review/setting/{id}', [
        ReviewView::class,
        'update',
    ]);

    #MemoryView
     Route::get('/add/memory', [
        MemoryView::class,
        'get',
    ]); 
    Route::post('/add/memory', [
        MemoryView::class,
        'save',
    ]);
    Route::get('/edit/memory/setting/{id}', [
        MemoryView::class,
        'edit',
    ]);  
    Route::post('/edit/memory/setting/{id}', [
        MemoryView::class,
        'update',
    ]);

    #about page
    Route::get('/about/settings', [
        AboutView::class,
        'view',
    ]);
    Route::get('/about/page', [
        AboutView::class,
        'get',
    ]); 
    Route::post('/about/page', [
        AboutView::class,
        'save',
    ]);

    #FeaturedView
    Route::get('/add/featured', [
        FeaturedView::class,
        'get',
    ]);
    Route::post('/add/featured', [
        FeaturedView::class,
        'save',
    ]);
     Route::get('/edit/featured/setting/{id}', [
        FeaturedView::class,
        'edit',
    ]);  
    Route::post('/edit/featured/setting/{id}', [
        FeaturedView::class,
        'update',
    ]);

    #HomeProductView
    Route::get('/add/gallery', [
        HomeProductView::class,
        'get',
    ]); 
    Route::post('/add/gallery', [
        HomeProductView::class,
        'save',
    ]);
    Route::get('/edit/home/product/setting/{id}', [
        HomeProductView::class,
        'edit',
    ]);
    Route::post('/edit/home/product/setting/{id}', [
        HomeProductView::class,
        'update',
    ]);

    #BrochureView
    Route::get('/brochure/settings/', [
        BrochureView::class,
        'view',
    ]); 
    Route::get('/add/brochure', [
        BrochureView::class,
        'get',
    ]);
    Route::post('/add/brochure', [
        BrochureView::class,
        'save',
    ]);
    Route::get('/edit/brochure/{id}', [
        BrochureView::class,
        'edit',
    ]);

    Route::post('/edit/brochure/{id}', [
        BrochureView::class,
        'update',
    ]);
});

#installation
Route::get('/site/installation', [Installation::class, 'get']);
Route::post('/site/installation', [Installation::class, 'post']);
Route::get('/start', [Installation::class, 'start']);

Route::get('/phpinfo', function () {
    return phpinfo();
});
