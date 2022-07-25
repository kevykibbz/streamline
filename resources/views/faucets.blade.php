@extends('base')
@section('title') Faucets @endsection
@section('header')
<!-- ** Breadcrumb ** -->
<section class="main-title-section-wrapper breadcrumb-left">
    <div class="main-title-section-bg"
        style="background-image: url('{{ url('wp-content/uploads/sites/12/2018/05/bc-img.jpg')}}'); background-position: left top; background-size: auto; background-repeat: no-repeat; background-attachment: fixed; ">
    </div>
    <div class="container">
        <div class="main-title-section">
            <h1>Faucets</h1>
        </div>
        <div class="breadcrumb">
            <a href="{{ url('/')}}">Home</a>
            <span class="fa default"></span>
            <span class="current">Shop</span>
            <span class="fa default"></span>
            <span class="current">Faucets</span>
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
                Showing all 8 results</p>
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
            <ul class="products columns-4">
                <li
                    class="product type-product post-75 status-publish first instock product_cat-faucets product_cat-showers product_cat-wash-basin has-post-thumbnail sale downloadable virtual purchasable product-type-simple">
                    <div class="woo-type1">
                        <div class="column dt-sc-one-fourth">
                            <div class="product-wrapper">
                                <div class='product-thumb'><span class="onsale"><span>Sale</span></span><a
                                        class="image"
                                        href="#"
                                        title="Double Flow Tab"><img width="300" height="300"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-5-300x300.jpg')}}"
                                            class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                            alt="" loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-5-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-5-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-5-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-5-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-5-100x100.jpg')}} 100w, {{ url('wp-content/uploads/sites/12/2018/05/product-5.jpg')}} 1000w"
                                            sizes="(max-width: 300px) 100vw, 300px" /><img width="1000"
                                            height="1000"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-9.jpg')}}"
                                            class="secondary-image attachment-shop-catalog" alt=""
                                            loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-9.jpg')}} 1000w, {{ url('wp-content/uploads/sites/12/2018/05/product-9-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-9-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-9-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-9-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-9-100x100.jpg')}} 100w"
                                            sizes="(max-width: 1000px) 100vw, 1000px" /></a>
                                    <div class="product-buttons-wrapper">
                                        <div class="wc_inline_buttons">
                                            <div class="wc_cart_btn_wrapper wc_btn_inline"><a
                                                    href="?add-to-cart=75" data-quantity="1"
                                                    class="dt-sc-button too-small button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                    data-product_id="75" data-product_sku="woo-single"
                                                    aria-label="Add &ldquo;Double Flow Tab&rdquo; to your cart"
                                                    rel="nofollow">Add to cart</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class='product-details'>
                                    <h5><a
                                            href="#">Double
                                            Flow Tab</a></h5><span class="product-price"><span
                                            class="price"><del aria-hidden="true"><span
                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">&#36;</span>3.00</bdi></span></del>
                                            <ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">&#36;</span>2.00</bdi></span></ins></span></span>
                                    <div class="product-rating-wrapper">
                                        <div class="star-rating" role="img"
                                            aria-label="Rated 4.00 out of 5"><span style="width:80%">Rated
                                                <strong class="rating">4.00</strong> out of 5</span></div>
                                    </div>
                                </div>
                            </div> <!-- .product-wrapper -->
                        </div> <!-- .column -->
                    </div> <!-- .style -->
                </li>
                <li
                    class="product type-product post-60 status-publish instock product_cat-faucets product_cat-showers product_cat-wash-basin has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
                    <div class="woo-type1">
                        <div class="column dt-sc-one-fourth">
                            <div class="product-wrapper">
                                <div class='product-thumb'><span class="onsale"><span>Sale</span></span>
                                    <div class="featured-tag">
                                        <div><i class="fa fa-thumb-tack"></i><span>Featured</span></div>
                                    </div><a class="image"
                                        href="#"
                                        title="Double Nozzle"><img width="300" height="300"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-12-300x300.jpg')}}"
                                            class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                            alt="" loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-12-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-12-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-12-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-12-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-12-100x100.jpg')}} 100w, {{ url('wp-content/uploads/sites/12/2018/05/product-12.jpg')}} 1000w"
                                            sizes="(max-width: 300px) 100vw, 300px" /><img width="1000"
                                            height="1000"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-4.jpg')}}"
                                            class="secondary-image attachment-shop-catalog" alt=""
                                            loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-4.jpg')}} 1000w, {{ url('wp-content/uploads/sites/12/2018/05/product-4-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-4-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-4-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-4-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-4-100x100.jpg')}} 100w"
                                            sizes="(max-width: 1000px) 100vw, 1000px" /></a>
                                    <div class="product-buttons-wrapper">
                                        <div class="wc_inline_buttons">
                                            <div class="wc_cart_btn_wrapper wc_btn_inline"><a
                                                    href="?add-to-cart=60" data-quantity="1"
                                                    class="dt-sc-button too-small button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                    data-product_id="60" data-product_sku="woo-cap"
                                                    aria-label="Add &ldquo;Double Nozzle&rdquo; to your cart"
                                                    rel="nofollow">Add to cart</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class='product-details'>
                                    <h5><a
                                            href="#">Double
                                            Nozzle</a></h5><span class="product-price"><span
                                            class="price"><del aria-hidden="true"><span
                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">&#36;</span>18.00</bdi></span></del>
                                            <ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">&#36;</span>16.00</bdi></span></ins></span></span>
                                    <div class="product-rating-wrapper"></div>
                                </div>
                            </div> <!-- .product-wrapper -->
                        </div> <!-- .column -->
                    </div> <!-- .style -->
                </li>
                <li
                    class="product type-product post-62 status-publish instock product_cat-faucets product_cat-showers product_cat-wash-basin has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                    <div class="woo-type1">
                        <div class="column dt-sc-one-fourth">
                            <div class="product-wrapper">
                                <div class='product-thumb'>
                                    <div class="featured-tag">
                                        <div><i class="fa fa-thumb-tack"></i><span>Featured</span></div>
                                    </div><a class="image"
                                        href="#"
                                        title="Dual Flow Tab"><img width="300" height="300"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-11-300x300.jpg')}}"
                                            class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                            alt="" loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-11-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-11-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-11-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-11-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-11-100x100.jpg')}} 100w, {{ url('wp-content/uploads/sites/12/2018/05/product-11.jpg')}} 1000w"
                                            sizes="(max-width: 300px) 100vw, 300px" /><img width="1000"
                                            height="1000"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-3.jpg')}}"
                                            class="secondary-image attachment-shop-catalog" alt=""
                                            loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-3.jpg')}} 1000w, {{ url('wp-content/uploads/sites/12/2018/05/product-3-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-3-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-3-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-3-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-3-100x100.jpg')}} 100w"
                                            sizes="(max-width: 1000px) 100vw, 1000px" /></a>
                                    <div class="product-buttons-wrapper">
                                        <div class="wc_inline_buttons">
                                            <div class="wc_cart_btn_wrapper wc_btn_inline"><a
                                                    href="?add-to-cart=62" data-quantity="1"
                                                    class="dt-sc-button too-small button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                    data-product_id="62" data-product_sku="woo-sunglasses"
                                                    aria-label="Add &ldquo;Dual Flow Tab&rdquo; to your cart"
                                                    rel="nofollow">Add to cart</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class='product-details'>
                                    <h5><a
                                            href="#">Dual
                                            Flow Tab</a></h5><span class="product-price"><span
                                            class="price"><span
                                                class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>90.00</bdi></span></span></span>
                                    <div class="product-rating-wrapper"></div>
                                </div>
                            </div> <!-- .product-wrapper -->
                        </div> <!-- .column -->
                    </div> <!-- .style -->
                </li>
                <li
                    class="product type-product post-68 status-publish last instock product_cat-faucets product_cat-hot-tubs has-post-thumbnail shipping-taxable purchasable product-type-simple">
                    <div class="woo-type1">
                        <div class="column dt-sc-one-fourth">
                            <div class="product-wrapper">
                                <div class='product-thumb'><a class="image"
                                        href="#"
                                        title="Floor Touch Toilet"><img width="300" height="300"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-8-300x300.jpg')}}"
                                            class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                            alt="" loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-8-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-8-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-8-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-8-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-8-100x100.jpg')}} 100w, {{ url('wp-content/uploads/sites/12/2018/05/product-8.jpg')}} 1000w"
                                            sizes="(max-width: 300px) 100vw, 300px" /><img width="1000"
                                            height="1000"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-12.jpg')}}"
                                            class="secondary-image attachment-shop-catalog" alt=""
                                            loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-12.jpg')}} 1000w, {{ url('wp-content/uploads/sites/12/2018/05/product-12-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-12-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-12-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-12-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-12-100x100.jpg')}} 100w"
                                            sizes="(max-width: 1000px) 100vw, 1000px" /></a>
                                    <div class="product-buttons-wrapper">
                                        <div class="wc_inline_buttons">
                                            <div class="wc_cart_btn_wrapper wc_btn_inline"><a
                                                    href="{{ url('cart')}}" data-quantity="1"
                                                    class="dt-sc-button too-small button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                    data-product_id="68"
                                                    data-product_sku="woo-long-sleeve-tee"
                                                    aria-label="Add &ldquo;Floor Touch Toilet&rdquo; to your cart"
                                                    rel="nofollow">Add to cart</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class='product-details'>
                                    <h5><a
                                            href="#">Floor
                                            Touch Toilet</a></h5><span class="product-price"><span
                                            class="price"><span
                                                class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>25.00</bdi></span></span></span>
                                    <div class="product-rating-wrapper"></div>
                                </div>
                            </div> <!-- .product-wrapper -->
                        </div> <!-- .column -->
                    </div> <!-- .style -->
                </li>
                <li
                    class="product type-product post-70 status-publish first instock product_cat-bath-furniture product_cat-faucets product_cat-wash-basin has-post-thumbnail shipping-taxable purchasable product-type-simple">
                    <div class="woo-type1">
                        <div class="column dt-sc-one-fourth">
                            <div class="product-wrapper">
                                <div class='product-thumb'><a class="image"
                                        href="#"
                                        title="Personal Shower"><img width="300" height="300"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-7-300x300.jpg')}}"
                                            class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                            alt="" loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-7-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-7-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-7-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-7-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-7-100x100.jpg')}} 100w, {{ url('wp-content/uploads/sites/12/2018/05/product-7.jpg')}} 1000w"
                                            sizes="(max-width: 300px) 100vw, 300px" /><img width="1000"
                                            height="1000"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-15.jpg')}}"
                                            class="secondary-image attachment-shop-catalog" alt=""
                                            loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-15.jpg')}} 1000w, {{ url('wp-content/uploads/sites/12/2018/05/product-15-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-15-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-15-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-15-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-15-100x100.jpg')}} 100w"
                                            sizes="(max-width: 1000px) 100vw, 1000px" /></a>
                                    <div class="product-buttons-wrapper">
                                        <div class="wc_inline_buttons">
                                            <div class="wc_cart_btn_wrapper wc_btn_inline"><a
                                                    href="{{ url('cart')}}" data-quantity="1"
                                                    class="dt-sc-button too-small button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                    data-product_id="70" data-product_sku="woo-polo"
                                                    aria-label="Add &ldquo;Personal Shower&rdquo; to your cart"
                                                    rel="nofollow">Add to cart</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class='product-details'>
                                    <h5><a
                                            href="#">Personal
                                            Shower</a></h5><span class="product-price"><span
                                            class="price"><span
                                                class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>20.00</bdi></span></span></span>
                                    <div class="product-rating-wrapper"></div>
                                </div>
                            </div> <!-- .product-wrapper -->
                        </div> <!-- .column -->
                    </div> <!-- .style -->
                </li>
                <li
                    class="product type-product post-44 status-publish outofstock product_cat-faucets product_cat-hot-tubs product_cat-wash-basin has-post-thumbnail shipping-taxable product-type-variable">
                    <div class="woo-type1">
                        <div class="column dt-sc-one-fourth">
                            <div class="product-wrapper">
                                <div class='product-thumb'><span class="out-of-stock"><span>Out of
                                            Stock</span></span><a class="image"
                                        href="#"
                                        title="Rectangle Wash Basin"><img width="300" height="300"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-18-300x300.jpg')}}"
                                            class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                            alt="" loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-18-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-18-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-18-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-18-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-18-100x100.jpg')}} 100w, {{ url('wp-content/uploads/sites/12/2018/05/product-18.jpg')}} 1000w"
                                            sizes="(max-width: 300px) 100vw, 300px" /><img width="1000"
                                            height="1000"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-13.jpg')}}"
                                            class="secondary-image attachment-shop-catalog" alt=""
                                            loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-13.jpg')}} 1000w, {{ url('wp-content/uploads/sites/12/2018/05/product-13-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-13-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-13-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-13-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-13-100x100.jpg')}} 100w"
                                            sizes="(max-width: 1000px) 100vw, 1000px" /></a>
                                    <div class="product-buttons-wrapper">
                                        <div class="wc_inline_buttons">
                                            <div class="wc_cart_btn_wrapper wc_btn_inline"><a
                                                    href="#"
                                                    data-quantity="1"
                                                    class="dt-sc-button too-small button product_type_variable"
                                                    data-product_id="44" data-product_sku="woo-vneck-tee"
                                                    aria-label="Select options for &ldquo;Rectangle Wash Basin&rdquo;"
                                                    rel="nofollow">Read more</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class='product-details'>
                                    <h5><a
                                            href="#">Rectangle
                                            Wash Basin</a></h5><span class="product-price"></span>
                                    <div class="product-rating-wrapper"></div>
                                </div>
                            </div> <!-- .product-wrapper -->
                        </div> <!-- .column -->
                    </div> <!-- .style -->
                </li>
                <li
                    class="product type-product post-14658 status-publish instock product_cat-bath-furniture product_cat-faucets product_cat-showers has-post-thumbnail sale shipping-taxable product-type-grouped">
                    <div class="woo-type1">
                        <div class="column dt-sc-one-fourth">
                            <div class="product-wrapper">
                                <div class='product-thumb'><span class="onsale"><span>Sale</span></span><a
                                        class="image"
                                        href="#"
                                        title="Toilet Paper Stand"><img width="300" height="300"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-2-300x300.jpg')}}"
                                            class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                            alt="" loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-2-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-2-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-2-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-2-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-2-100x100.jpg')}} 100w, {{ url('wp-content/uploads/sites/12/2018/05/product-2.jpg')}} 1000w"
                                            sizes="(max-width: 300px) 100vw, 300px" /><img width="1000"
                                            height="1000"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-13.jpg')}}"
                                            class="secondary-image attachment-shop-catalog" alt=""
                                            loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-13.jpg')}} 1000w, {{ url('wp-content/uploads/sites/12/2018/05/product-13-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-13-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-13-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-13-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-13-100x100.jpg')}} 100w"
                                            sizes="(max-width: 1000px) 100vw, 1000px" /></a>
                                    <div class="product-buttons-wrapper">
                                        <div class="wc_inline_buttons">
                                            <div class="wc_cart_btn_wrapper wc_btn_inline"><a
                                                    href="{{ url('/description')}}"
                                                    data-quantity="1"
                                                    class="dt-sc-button too-small button product_type_grouped"
                                                    data-product_id="14658"
                                                    data-product_sku="logo-collection"
                                                    aria-label="View products in the &ldquo;Toilet Paper Stand&rdquo; group"
                                                    rel="nofollow">View products</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class='product-details'>
                                    <h5><a
                                            href="#">Toilet
                                            Paper Stand</a></h5><span class="product-price"><span
                                            class="price"><span
                                                class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>18.00</bdi></span>
                                            &ndash; <span class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>45.00</bdi></span></span></span>
                                    <div class="product-rating-wrapper"></div>
                                </div>
                            </div> <!-- .product-wrapper -->
                        </div> <!-- .column -->
                    </div> <!-- .style -->
                </li>
                <li
                    class="product type-product post-48 status-publish last instock product_cat-faucets product_cat-saunas has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                    <div class="woo-type1">
                        <div class="column dt-sc-one-fourth">
                            <div class="product-wrapper">
                                <div class='product-thumb'><span class="onsale"><span>Sale</span></span><a
                                        class="image"
                                        href="#"
                                        title="Wash Basin"><img width="300" height="300"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-14-300x300.jpg')}}"
                                            class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                            alt="" loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-14-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-14-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-14-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-14-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-14-100x100.jpg')}} 100w, {{ url('wp-content/uploads/sites/12/2018/05/product-14.jpg')}} 1000w"
                                            sizes="(max-width: 300px) 100vw, 300px" /><img width="1000"
                                            height="1000"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-1.jpg')}}"
                                            class="secondary-image attachment-shop-catalog" alt=""
                                            loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-1.jpg')}} 1000w, {{ url('wp-content/uploads/sites/12/2018/05/product-1-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-1-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-1-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-1-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-1-100x100.jpg')}} 100w"
                                            sizes="(max-width: 1000px) 100vw, 1000px" /></a>
                                    <div class="product-buttons-wrapper">
                                        <div class="wc_inline_buttons">
                                            <div class="wc_cart_btn_wrapper wc_btn_inline"><a
                                                    href="{{ url('cart')}}" data-quantity="1"
                                                    class="dt-sc-button too-small button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                    data-product_id="48" data-product_sku="woo-beanie"
                                                    aria-label="Add &ldquo;Wash Basin&rdquo; to your cart"
                                                    rel="nofollow">Add to cart</a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class='product-details'>
                                    <h5><a href="#">Wash
                                            Basin</a></h5><span class="product-price"><span
                                            class="price"><del aria-hidden="true"><span
                                                    class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">&#36;</span>20.00</bdi></span></del>
                                            <ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                            class="woocommerce-Price-currencySymbol">&#36;</span>18.00</bdi></span></ins></span></span>
                                    <div class="product-rating-wrapper"></div>
                                </div>
                            </div> <!-- .product-wrapper -->
                        </div> <!-- .column -->
                    </div> <!-- .style -->
                </li>
            </ul>
            <div class="pagination"></div>
        </section>
    </div> <!-- ** Container End ** -->
@endsection