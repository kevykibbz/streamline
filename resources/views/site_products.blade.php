@extends('base')
@section('title') Site products @endsection
@section('header')
<!-- ** Breadcrumb ** -->
<section class="main-title-section-wrapper breadcrumb-left">
    <div class="main-title-section-bg"
        style="background-image: url('{{ url('wp-content/uploads/sites/12/2018/05/bc-img.jpg')}}'); background-position: left top; background-size: auto; background-repeat: no-repeat; background-attachment: fixed; ">
    </div>
    <div class="container">
        <div class="main-title-section">
            <h1 class="text-capitalize">Site products</h1>
        </div>
        <div class="breadcrumb">
            <a href="{{ url('/')}}">Home</a>
            <span class="fa default"></span>
            <span class="current">Products</span>
            <span class="fa default"></span>
            <span class="current text-capitalize">Site products</span>
        </div>
    </div>
</section>
<!-- ** Breadcrumb End ** -->
@endsection

@section('content')
    <div class="container">
        <section id="primary" class="content-full-width">
            <header class="woocommerce-products-header">

            </header>
            <div class="woocommerce-notices-wrapper"></div>
            <p class="woocommerce-result-count">
                Showing all {{number_format(count($products))}} results</p>
            <form class="woocommerce-ordering" method="get">
                <select name="orderby" class="orderby" aria-label="Shop order">
                    <option value="menu_order" selected='selected'>Default sorting</option>
                    <option value="popularity">Sort by popularity</option>
                    <option value="rating">Sort by average rating</option>
                    <option value="date">Sort by latest</option>
                    <option value="price">Sort by price: low to high</option>
                    <option value="price-desc">Sort by price: high to low</option>
                </select>
                <input type="hidden" name="paged" value="1" />
            </form>
            @if (count($products) >0)
            <ul class="products columns-4">
              
                @foreach ($products as $product)
                <li
                    class="product type-product post-60 status-publish instock product_cat-faucets product_cat-showers product_cat-wash-basin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
                    <div class="woo-type1">
                        <div class="column dt-sc-one-fourth">
                            <div class="product-wrapper">
                                <div class='product-thumb'><span class="onsale"><span>{{$product->tagname}}</span></span>
                                    <div class="featured-tag">
                                        <div><i class="fa fa-thumb-tack"></i><span>Featured</span></div>
                                    </div>
                                    <a class="image"
                                        href="/product/description/{{$product->product_id}}"
                                        title="{{$product->product_name}}"><img width="1000" height="1000"
                                            src="/products/{{$product->image_1000}}"
                                            class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                            alt="" loading="lazy"
                                            srcset="/products/{{$product->image_1000}} 1000w"
                                            sizes="(max-width: 1000px) 100vw, 300px" />
                                    </a>    
                                </div>
                                <div class='product-details'>
                                    <h5><a
                                            href="/product/description/{{$product->product_id}}">{{$product->product_name}}</a></h5>
                                    <div class="product-rating-wrapper"></div>
                                </div>
                            </div> <!-- .product-wrapper -->
                        </div> <!-- .column -->
                    </div> <!-- .style -->
                </li>
                @endforeach
            </ul>
            @else
            <div class="text-center">
                <h5><i class="fa fa-exclamation-ciecle"></i> No product found</h5>
            </div>
            @endif
            <div class="pagination"></div>
        </section>
    </div> <!-- ** Container End ** -->
@endsection