@extends('base')
@section('title') Hot Tubs > Description @endsection
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
                            data-thumb-alt="" class="woocommerce-product-gallery__image">
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
                        <div class="product-status-labels"><span
                                class="onsale"><span>{{$product->tagname}}</span></span></div>
                    </figure>
                </div>
                <div class="summary entry-summary">
                    <h1 class="product_title entry-title">{{$product->product_name}}</h1>
                    <p class="price">
                        <span class="woocommerce-Price-amount amount">
                            <bdi>
                                <span class="woocommerce-Price-currencySymbol">&#36;</span>{{number_format($product->prev_price)}}
                            </bdi></span>
                        &ndash; <span class="woocommerce-Price-amount amount"><bdi><span
                                    class="woocommerce-Price-currencySymbol">&#36;</span>{{number_format($product->price)}}</bdi></span>
                    </p>
                    <div class="woocommerce-product-details__short-description">
                        <p>This is a grouped product.</p>
                    </div>
                   
                    <div class="product_meta">
                        <span class="sku_wrapper">SKU: <span class="sku">logo-collection</span></span>
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
                        <li class="reviews_tab" id="tab-title-reviews" role="tab"
                            aria-controls="tab-reviews">
                            <a href="#tab-reviews">
                                Reviews (0) </a>
                        </li>
                    </ul>
                    <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--description panel entry-content wc-tab"
                        id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">

                        <h2>Description</h2>

                        <p>{{$product->description?$product->description:'No description about the product found.' }}</p>
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
                                        <span id="reply-title" class="comment-reply-title">Be the first
                                            to review &ldquo;Toilet Paper Stand&rdquo; <small><a
                                                    rel="nofollow" id="cancel-comment-reply-link"
                                                    href="/product/toilet-paper-stand/#respond"
                                                    style="display:none;">Cancel
                                                    reply</a></small></span>
                                        <form
                                            action="#"
                                            method="post" id="commentform" class="comment-form"
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
                                            <p class="comment-form-comment"><label for="comment">Your
                                                    review <span
                                                        class="required">*</span></label><textarea
                                                    id="comment" name="comment" cols="45" rows="8"
                                                    aria-required="true" required></textarea></p>
                                            <div class="dt-sc-one-half column first">
                                                <p class="comment-form-author"><label for="author">Name
                                                        <span class="required">*</span></label> <input
                                                        id="author" name="author" type="text" value=""
                                                        size="30" aria-required="true" required /></p>
                                            </div>
                                            <div class="dt-sc-one-half column">
                                                <p class="comment-form-email"><label for="email">Email
                                                        <span class="required">*</span></label> <input
                                                        id="email" name="email" type="email" value=""
                                                        size="30" aria-required="true" required /></p>
                                            </div>
                                            <p class="form-submit"><input name="submit" type="submit"
                                                    id="submit" class="submit" value="Submit" /> <input
                                                    type='hidden' name='comment_post_ID' value='14658'
                                                    id='comment_post_ID' />
                                                <input type='hidden' name='comment_parent'
                                                    id='comment_parent' value='0' />
                                            </p><input type="hidden" id="ak_js" name="ak_js"
                                                value="27" /><textarea name="ak_hp_textarea" cols="45"
                                                rows="8" maxlength="100"
                                                style="display: none !important;"></textarea>
                                        </form>
                                    </div><!-- #respond -->
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