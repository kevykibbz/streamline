@extends('base')
@section('title') Hot Tubs @endsection
@section('header')
<!-- ** Breadcrumb ** -->
<section class="main-title-section-wrapper breadcrumb-left">
    <div class="main-title-section-bg"
        style="background-image: url('{{ url('wp-content/uploads/sites/12/2018/05/bc-img.jpg')}}'); background-position: left top; background-size: auto; background-repeat: no-repeat; background-attachment: fixed; ">
    </div>
    <div class="container">
        <div class="main-title-section">
            <h1>Hot Tubs</h1>
        </div>
        <div class="breadcrumb">
            <a href="{{ url('/')}}">Home</a>
            <span class="fa default"></span>
            <span class="current">Shop</span>
            <span class="fa default"></span>
            <span class="current">Hot Tubs</span>
        </div>
    </div>
</section>
<!-- ** Breadcrumb End ** -->
@endsection
@section('content')
<div class="container">
    <section id="primary" class="content-full-width">
        <header class="woocommerce-products-header"></header>
        <div class="woocommerce-notices-wrapper"></div>
        <p class="woocommerce-result-count">
            Showing all 7 results</p>
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
                class="product type-product post-68 status-publish first instock product_cat-faucets product_cat-hot-tubs has-post-thumbnail shipping-taxable purchasable product-type-simple">
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
                class="product type-product post-66 status-publish instock product_cat-hot-tubs product_cat-saunas product_cat-showers has-post-thumbnail featured shipping-taxable purchasable product-type-simple">
                <div class="woo-type1">
                    <div class="column dt-sc-one-fourth">
                        <div class="product-wrapper">
                            <div class='product-thumb'>
                                <div class="featured-tag">
                                    <div><i class="fa fa-thumb-tack"></i><span>Featured</span></div>
                                </div><a class="image"
                                    href="#"
                                    title="Hand Shower Hose"><img width="300" height="300"
                                        src="{{ url('wp-content/uploads/sites/12/2018/05/product-9-300x300.jpg')}}"
                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                        alt="" loading="lazy"
                                        srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-9-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-9-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-9-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-9-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-9-100x100.jpg')}} 100w, {{ url('wp-content/uploads/sites/12/2018/05/product-9.jpg')}} 1000w"
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
                                                href="{{ url('cart')}}" data-quantity="1"
                                                class="dt-sc-button too-small button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                data-product_id="66"
                                                data-product_sku="woo-hoodie-with-zipper"
                                                aria-label="Add &ldquo;Hand Shower Hose&rdquo; to your cart"
                                                rel="nofollow">Add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class='product-details'>
                                <h5><a
                                        href="#">Hand
                                        Shower Hose</a></h5><span class="product-price"><span
                                        class="price"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">&#36;</span>45.00</bdi></span></span></span>
                                <div class="product-rating-wrapper"></div>
                            </div>
                        </div> <!-- .product-wrapper -->
                    </div> <!-- .column -->
                </div> <!-- .style -->
            </li>
            <li
                class="product type-product post-58 status-publish instock product_cat-bath-furniture product_cat-hot-tubs product_cat-saunas has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                <div class="woo-type1">
                    <div class="column dt-sc-one-fourth">
                        <div class="product-wrapper">
                            <div class='product-thumb'><span class="onsale"><span>Sale</span></span><a
                                    class="image"
                                    href="#"
                                    title="Paper Holder"><img width="300" height="300"
                                        src="{{ url('wp-content/uploads/sites/12/2018/05/product-13-300x300.jpg')}}"
                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                        alt="" loading="lazy"
                                        srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-13-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-13-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-13-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-13-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-13-100x100.jpg')}} 100w, {{ url('wp-content/uploads/sites/12/2018/05/product-13.jpg')}} 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px" /><img width="1000"
                                        height="1000"
                                        src="{{ url('wp-content/uploads/sites/12/2018/05/product-11.jpg')}}"
                                        class="secondary-image attachment-shop-catalog" alt=""
                                        loading="lazy"
                                        srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-11.jpg')}} 1000w, {{ url('wp-content/uploads/sites/12/2018/05/product-11-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-11-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-11-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-11-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-11-100x100.jpg')}} 100w"
                                        sizes="(max-width: 1000px) 100vw, 1000px" /></a>
                                <div class="product-buttons-wrapper">
                                    <div class="wc_inline_buttons">
                                        <div class="wc_cart_btn_wrapper wc_btn_inline"><a
                                                href="{{ url('cart')}}" data-quantity="1"
                                                class="dt-sc-button too-small button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                data-product_id="58" data-product_sku="woo-belt"
                                                aria-label="Add &ldquo;Paper Holder&rdquo; to your cart"
                                                rel="nofollow">Add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class='product-details'>
                                <h5><a href="#">Paper
                                        Holder</a></h5><span class="product-price"><span
                                        class="price"><del aria-hidden="true"><span
                                                class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>65.00</bdi></span></del>
                                        <ins><span class="woocommerce-Price-amount amount"><bdi><span
                                                        class="woocommerce-Price-currencySymbol">&#36;</span>55.00</bdi></span></ins></span></span>
                                <div class="product-rating-wrapper"></div>
                            </div>
                        </div> <!-- .product-wrapper -->
                    </div> <!-- .column -->
                </div> <!-- .style -->
            </li>
            <li
                class="product type-product post-85 status-publish last instock product_cat-bath-furniture product_cat-hot-tubs product_cat-saunas has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                <div class="woo-type1">
                    <div class="column dt-sc-one-fourth">
                        <div class="product-wrapper">
                            <div class='product-thumb'><span class="onsale"><span>Sale</span></span><a
                                    class="image"
                                    href="#"
                                    title="Pillar Tap"><img width="300" height="300"
                                        src="{{ url('wp-content/uploads/sites/12/2018/05/product-3-300x300.jpg')}}"
                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                        alt="" loading="lazy"
                                        srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-3-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-3-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-3-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-3-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-3-100x100.jpg')}} 100w, {{ url('wp-content/uploads/sites/12/2018/05/product-3.jpg')}} 1000w"
                                        sizes="(max-width: 300px) 100vw, 300px" /><img width="1000"
                                        height="1000"
                                        src="{{ url('wp-content/uploads/sites/12/2018/05/product-17.jpg')}}"
                                        class="secondary-image attachment-shop-catalog" alt=""
                                        loading="lazy"
                                        srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-17.jpg')}} 1000w, {{ url('wp-content/uploads/sites/12/2018/05/product-17-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-17-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-17-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-17-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-17-100x100.jpg')}} 100w"
                                        sizes="(max-width: 1000px) 100vw, 1000px" /></a>
                                <div class="product-buttons-wrapper">
                                    <div class="wc_inline_buttons">
                                        <div class="wc_cart_btn_wrapper wc_btn_inline"><a
                                                href="{{ url('cart')}}" data-quantity="1"
                                                class="dt-sc-button too-small button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                data-product_id="85" data-product_sku="Woo-beanie-logo"
                                                aria-label="Add &ldquo;Pillar Tap&rdquo; to your cart"
                                                rel="nofollow">Add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class='product-details'>
                                <h5><a href="#">Pillar
                                        Tap</a></h5><span class="product-price"><span class="price"><del
                                            aria-hidden="true"><span
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
            <li
                class="product type-product post-44 status-publish first outofstock product_cat-faucets product_cat-hot-tubs product_cat-wash-basin has-post-thumbnail shipping-taxable product-type-variable">
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
                class="product type-product post-47 status-publish instock product_cat-hot-tubs product_cat-saunas product_cat-showers has-post-thumbnail shipping-taxable purchasable product-type-simple">
                <div class="woo-type1">
                    <div class="column dt-sc-one-fourth">
                        <div class="product-wrapper">
                            <div class='product-thumb'><a class="image"
                                    href="#"
                                    title="Shower Cabin"><img width="300" height="300"
                                        src="{{ url('wp-content/uploads/sites/12/2018/05/product-15-300x300.jpg')}}"
                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                        alt="" loading="lazy"
                                        srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-15-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-15-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-15-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-15-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-15-100x100.jpg')}} 100w, {{ url('wp-content/uploads/sites/12/2018/05/product-15.jpg')}} 1000w"
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
                                                href="{{ url('cart')}}" data-quantity="1"
                                                class="dt-sc-button too-small button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                data-product_id="47" data-product_sku="woo-tshirt"
                                                aria-label="Add &ldquo;Shower Cabin&rdquo; to your cart"
                                                rel="nofollow">Add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class='product-details'>
                                <h5><a href="#">Shower
                                        Cabin</a></h5><span class="product-price"><span
                                        class="price"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">&#36;</span>18.00</bdi></span></span></span>
                                <div class="product-rating-wrapper"></div>
                            </div>
                        </div> <!-- .product-wrapper -->
                    </div> <!-- .column -->
                </div> <!-- .style -->
            </li>
            <li
                class="product type-product post-83 status-publish instock product_cat-bath-furniture product_cat-hot-tubs product_cat-saunas has-post-thumbnail shipping-taxable purchasable product-type-simple">
                <div class="woo-type1">
                    <div class="column dt-sc-one-fourth">
                        <div class="product-wrapper">
                            <div class='product-thumb'><a class="image"
                                    href="#"
                                    title="Shower Gel container"><img width="300" height="300"
                                        src="{{ url('wp-content/uploads/sites/12/2018/05/product-4-300x300.jpg')}}"
                                        class="attachment-shop_catalog size-shop_catalog wp-post-image"
                                        alt="" loading="lazy"
                                        srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-4-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-4-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-4-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-4-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-4-100x100.jpg')}} 100w, {{ url('wp-content/uploads/sites/12/2018/05/product-4.jpg')}} 1000w"
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
                                                data-product_id="83" data-product_sku="Woo-tshirt-logo"
                                                aria-label="Add &ldquo;Shower Gel container&rdquo; to your cart"
                                                rel="nofollow">Add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class='product-details'>
                                <h5><a
                                        href="#">Shower
                                        Gel container</a></h5><span class="product-price"><span
                                        class="price"><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">&#36;</span>18.00</bdi></span></span></span>
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