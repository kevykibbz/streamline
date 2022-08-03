@extends('base')
@section('title') {{$product->product_name}} > Description @endsection
@section('header')
<!-- ** Breadcrumb ** -->
<section class="main-title-section-wrapper breadcrumb-left">
    <div class="main-title-section-bg"
        style="background-image: url('{{ url('wp-content/uploads/sites/12/2018/05/bc-img.jpg')}}'); background-position: left top; background-size: auto; background-repeat: no-repeat; background-attachment: fixed; ">
    </div>
    <div class="container">
        <div class="main-title-section">
            <h1>{{$product->product_name}} > Description</h1>
        </div>
        <div class="breadcrumb">
            <a href="{{ url('/')}}">Home</a>
            <span class="fa default"></span>
            <a href="/shop">Shop</a>
            <span class="fa default"></span>
            <span class="current">{{$product->product_name}}</span>
            <span class="fa default"></span>
            <span class="current">Description</span>
        </div>
    </div>
</section>
<!-- ** Breadcrumb 
    End ** -->
@endsection
@section('content')
<div class="container">
    <section id="primary" class="content-full-width">
        <div class="woocommerce-notices-wrapper"></div>
        <div id="product-14658"
            class="product type-product post-14658 status-publish first instock product_cat-bath-furniture product_cat-faucets product_cat-showers has-post-thumbnail sale shipping-taxable product-type-grouped">
            <div class="product-thumb-wrapper">
                <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                    data-columns="4" style="opacity: 0; transition: opacity .25s ease-in-out;">
                    <figure class="woocommerce-product-gallery__wrapper">
                        <div data-thumb="/products/{{$product->image_1000}}"
                            data-thumb-alt="{{$product->product_name}}" class="woocommerce-product-gallery__image">
                            <a
                                href="/products/{{$product->image_1000}}">
                                <img
                                    width="600" height="600"
                                    src="/products/{{$product->image_600}}"
                                    class="wp-post-image" alt="" loading="lazy" title="product-2"
                                    data-caption=""
                                    data-src="/products/{{$product->image_1000}}"
                                    data-large_image="/products/{{$product->image_1000}}"
                                    data-large_image_width="1000" data-large_image_height="1000"
                                    srcset="/products/{{$product->image_600}} 600w, /products/{{$product->image_150}} 150w, /products/{{$product->image_300}} 300w,/products/{{$product->image_768}} 768w, /products/{{$product->image_100}} 100w, /products/{{$product->image_1000}} 1000w"
                                    sizes="(max-width: 600px) 100vw, 600px" />
                            </a>
                        </div>
                        <div class="product-status-labels">
                            <span class="onsale"><span>{{$product->tagname}}</span></span>
                        </div>
                    </figure>
                </div>
                <div class="summary entry-summary">
                    <h1 class="product_title entry-title">{{$product->product_name}}</h1>
                    <div class="woocommerce-product-rating">
                       <div class="star-rating" role="img" aria-label="Rated 4.00 out of 5"><span style="width:80%">Rated <strong class="rating">4.00</strong> out of 5 based on <span class="rating">2</span> customer ratings</span></div>
                        @if (count($reviews) > 0)
                            <a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<span class="count">{{number_format(count($reviews))}}</span> customer reviews)</a>
                        @endif
                    </div>
                    <div class="woocommerce-product-details__short-description">
                        <strong>Description:</strong>
                       <p>{{$product->description}}</p>
                    </div>
                    @if ($product->tagname == 'out of stock')
                    <form class="variations_form cart" action="" method="post" enctype='multipart/form-data' data-product_id="45" data-product_variations="[]" onsubmit="return false;">
                        <p class="stock out-of-stock">This product is currently out of stock and unavailable.</p>
                    </form>
                    @endif
                    <div class="product_meta">
                       <span class="sku_wrapper">SKU: <span class="sku">wp-pennant</span></span>
                       <span class="posted_in">Categories: 
                        <a href="/products/{{$product->category}}" rel="tag">{{$product->category}}</a><br>
                        Other categories:
                        @if (count($categories) > 0)                            
                            @foreach ($categories as $category)
                                @if ($category->category != $product->category)
                                    <a href="/products/{{$category->category}}" rel="tag">{{$category->category}}</a>,
                                @endif
                            @endforeach
                        @endif
                    </span>
                    </div>
                 </div>

                <div class="woocommerce-tabs wc-tabs-wrapper">
                    <ul class="tabs wc-tabs" role="tablist">
                        <li class="description_tab" id="tab-title-description" role="tab"
                            aria-controls="tab-description">
                            <a href="#tab-description">
                                Description </a>
                        </li>
                        <li class="additional_information_tab" id="tab-title-additional_information" role="tab" aria-controls="tab-additional_information">
                            <a href="#tab-additional_information">
                                Additional information
                            </a>
                        </li>
                        <li class="reviews_tab" id="tab-title-reviews" role="tab"
                            aria-controls="tab-reviews">
                            <a href="#tab-reviews">
                                Reviews ({{number_format(count($reviews))}}) </a>
                        </li>
                    </ul>
                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab"
                        id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">

                        <h2>Description</h2>

                        <p>{{$product->description?$product->description:'No description about the product found.' }}</p>
                    </div>
                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information panel entry-content wc-tab" id="tab-additional_information" role="tabpanel" aria-labelledby="tab-title-additional_information">

                        <h2>Additional information</h2>

                        <table class="woocommerce-product-attributes shop_attributes">
                            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--weight">
                                <th class="woocommerce-product-attributes-item__label">Weight</th>
                                <td class="woocommerce-product-attributes-item__value">{{$product->weight?$product->weight:'0'}} kg</td>
                            </tr>
                            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--dimensions">
                                <th class="woocommerce-product-attributes-item__label">Dimensions</th>
                                <td class="woocommerce-product-attributes-item__value">{{$product->dimension?$product->dimension:'0x0x0'}} cm</td>
                            </tr>
                            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_pa_color">
                                <th class="woocommerce-product-attributes-item__label">color</th>
                                <td class="woocommerce-product-attributes-item__value">
                                    <p>{{$product->color?$product->color:'Color not provided'}}</p>
                                </td>
                            </tr>
                            <tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--attribute_logo">
                                <th class="woocommerce-product-attributes-item__label">Logo</th>
                                <td class="woocommerce-product-attributes-item__value">
                                    <p>Yes, No</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--reviews panel entry-content wc-tab"
                        id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews">
                        <div id="reviews" class="woocommerce-Reviews">
                            <div id="comments">
                                <h2 class="woocommerce-Reviews-title">Reviews</h2>
                                <p class="woocommerce-noreviews">There are no reviews yet.</p>
                            </div>
                            <div id="review_form_wrapper">
                                <div id="review_form">
                                    <div id="respond" class="comment-respond">
                                        @if (count($reviews) > 0)
                                        <span id="reply-title" class="comment-reply-title">Be the first
                                            to review &ldquo;{{$product->product_name}}&rdquo; <small><a
                                                    rel="nofollow" id="cancel-comment-reply-link"
                                                    href="#"
                                                    style="display:none;">Cancel
                                                    reply</a></small></span>
                                        @else
                                        reviews found.
                                        @endif
                                        <form
                                            action="/product/review/{{$product->product_id}}"
                                            method="post" id="commentform" class="SubmitForm comment-form"
                                            novalidate>
                                            <p class="comment-notes"><span id="email-notes">Your email
                                                    address will not be published.</span> Required
                                                fields are marked <span class="required">*</span></p>
                                            <p class="comment-form-rating"><label for="rating">Your
                                                    rating</label><select name="rating" id="rating"
                                                    aria-required="true" required>
                                                    <option value="">Rate&hellip;</option>
                                                    <option value="5">Perfect</option>
                                                    <option value="4">Good</option>
                                                    <option value="3">Average</option>
                                                    <option value="2">Not that bad</option>
                                                    <option value="1">Very poor</option>
                                                </select></p>
                                            <p class="form-group comment-form-comment"><label for="comment">Your
                                                    review <span
                                                        class="required">*</span></label><textarea
                                                    id="comment" name="review" cols="45" rows="8"
                                                    aria-required="true" required></textarea>
                                                <div class="feedback"></div>
                                            </p>
                                            <div class="form-group dt-sc-one-half column first">
                                                <p class="comment-form-author"><label for="author">Name
                                                        <span class="required">*</span></label> <input
                                                        id="author" name="name" type="text" value=""
                                                        size="30" aria-required="true" required /></p>
                                                        <div class="feedback"></div>
                                            </div>
                                            <div class="form-group dt-sc-one-half column">
                                                <p class="comment-form-email"><label for="email">Email
                                                        <span class="required">*</span></label> <input
                                                        id="email" name="email" type="email" value=""
                                                        size="30" aria-required="true" required /></p>
                                                        <div class="feedback"></div>
                                            </div>
                                            <input type="submit" class="submit" value="Submit">
                                        </form>
                                    </div><!-- #respond -->
                                    <div class="response"></div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> <!-- ** Container End ** -->
@endsection