@extends('base')
@section('title') Hot Tubs > Adding To Cart @endsection
@section('header')
<!-- ** Breadcrumb ** -->
<section class="main-title-section-wrapper breadcrumb-left">
    <div class="main-title-section-bg"
        style="background-image: url('{{ url('wp-content/uploads/sites/12/2018/05/bc-img.jpg')}}'); background-position: left top; background-size: auto; background-repeat: no-repeat; background-attachment: fixed; ">
    </div>
    <div class="container">
        <div class="main-title-section">
            <h1>Hot Tubs > Adding To Cart</h1>
        </div>
        <div class="breadcrumb">
            <a href="{{ url('/')}}">Home</a>
            <span class="fa default"></span>
            <span class="current">Shop</span>
            <span class="fa default"></span>
            <span class="current">Hot Tubs</span>
            <span class="fa default"></span>
            <span class="current">cart</span>
        </div>
    </div>
</section>
<!-- ** Breadcrumb End ** -->
@endsection
@section('content')
<!-- ** Container ** -->
<div class="container">
    <!-- Primary -->
    <section id="primary" class="content-full-width">
        <!-- #post-14653 -->
        <div id="post-14653" class="post-14653 page type-page status-publish hentry">
            <div class="woocommerce">
                <div class="woocommerce-notices-wrapper"></div>
                <form class="woocommerce-cart-form" action="#" method="post">
                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th class="product-remove">&nbsp;</th>
                                <th class="product-thumbnail">&nbsp;</th>
                                <th class="product-name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-subtotal">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                <td class="product-remove">
                                    <a href="#"
                                        class="remove" aria-label="Remove this item"
                                        data-product_id="46"
                                        data-product_sku="woo-hoodie-with-logo">&times;</a>
                                </td>
                                <td class="product-thumbnail">
                                    <a href="#"><img
                                            width="300" height="300"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-16-300x300.jpg')}}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                            alt="" loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-16-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-16-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-16-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-16-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-16-100x100.jpg')}} 100w, {{ url('wp-content/uploads/sites/12/2018/05/product-16.jpg')}} 1000w"
                                            sizes="(max-width: 300px) 100vw, 300px" /></a>
                                </td>
                                <td class="product-name" data-title="Product">
                                    <a href="#">Water
                                        Heater</a>
                                </td>
                                <td class="product-price" data-title="Price">
                                    <span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">&#36;</span>45.00</bdi></span>
                                </td>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <label class="screen-reader-text"
                                            for="quantity_62deeeeabb896">Water Heater quantity</label>
                                        <input type="number" id="quantity_62deeeeabb896"
                                            class="input-text qty text" step="1" min="0" max=""
                                            name="cart[d9d4f495e875a2e075a1a4a6e1b9770f][qty]" value="1"
                                            title="Qty" size="4" placeholder="" inputmode="numeric" />
                                    </div>
                                </td>
                                <td class="product-subtotal" data-title="Subtotal">
                                    <span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">&#36;</span>45.00</bdi></span>
                                </td>
                            </tr>
                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                <td class="product-remove">
                                    <a href="#"
                                        class="remove" aria-label="Remove this item"
                                        data-product_id="47" data-product_sku="woo-tshirt">&times;</a>
                                </td>
                                <td class="product-thumbnail">
                                    <a href="#"><img
                                            width="300" height="300"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-15-300x300.jpg')}}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                            alt="" loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-15-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-15-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-15-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-15-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-15-100x100.jpg')}} 100w, {{ url('wp-content/uploads/sites/12/2018/05/product-15.jpg')}} 1000w"
                                            sizes="(max-width: 300px) 100vw, 300px" /></a>
                                </td>

                                <td class="product-name" data-title="Product">
                                    <a href="#">Shower
                                        Cabin</a>
                                </td>

                                <td class="product-price" data-title="Price">
                                    <span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">&#36;</span>18.00</bdi></span>
                                </td>

                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <label class="screen-reader-text"
                                            for="quantity_62deeeeabc57b">Shower Cabin quantity</label>
                                        <input type="number" id="quantity_62deeeeabc57b"
                                            class="input-text qty text" step="1" min="0" max=""
                                            name="cart[67c6a1e7ce56d3d6fa748ab6d9af3fd7][qty]" value="1"
                                            title="Qty" size="4" placeholder="" inputmode="numeric" />
                                    </div>
                                </td>

                                <td class="product-subtotal" data-title="Subtotal">
                                    <span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">&#36;</span>18.00</bdi></span>
                                </td>
                            </tr>
                            <tr class="woocommerce-cart-form__cart-item cart_item">

                                <td class="product-remove">
                                    <a href="#"
                                        class="remove" aria-label="Remove this item"
                                        data-product_id="48" data-product_sku="woo-beanie">&times;</a>
                                </td>

                                <td class="product-thumbnail">
                                    <a href="#"><img
                                            width="300" height="300"
                                            src="{{ url('wp-content/uploads/sites/12/2018/05/product-14-300x300.jpg')}}"
                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                            alt="" loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/product-14-300x300.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/product-14-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/product-14-768x768.jpg')}} 768w, {{ url('wp-content/uploads/sites/12/2018/05/product-14-600x600.jpg')}} 600w, {{ url('wp-content/uploads/sites/12/2018/05/product-14-100x100.jpg')}} 100w, {{ url('wp-content/uploads/sites/12/2018/05/product-14.jpg')}} 1000w"
                                            sizes="(max-width: 300px) 100vw, 300px" /></a>
                                </td>

                                <td class="product-name" data-title="Product">
                                    <a href="#">Wash
                                        Basin</a>
                                </td>
                                <td class="product-price" data-title="Price">
                                    <span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">&#36;</span>18.00</bdi></span>
                                </td>
                                <td class="product-quantity" data-title="Quantity">
                                    <div class="quantity">
                                        <label class="screen-reader-text"
                                            for="quantity_62deeeeabc803">Wash Basin quantity</label>
                                        <input type="number" id="quantity_62deeeeabc803"
                                            class="input-text qty text" step="1" min="0" max=""
                                            name="cart[642e92efb79421734881b53e1e1b18b6][qty]" value="1"
                                            title="Qty" size="4" placeholder="" inputmode="numeric" />
                                    </div>
                                </td>

                                <td class="product-subtotal" data-title="Subtotal">
                                    <span class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">&#36;</span>18.00</bdi></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6" class="actions">
                                    <div class="coupon">
                                        <label for="coupon_code">Coupon:</label> <input type="text"
                                            name="coupon_code" class="input-text" id="coupon_code"
                                            value="" placeholder="Coupon code" /> <button type="submit"
                                            class="button" name="apply_coupon"
                                            value="Apply coupon">Apply coupon</button>
                                    </div>
                                    <button type="submit" class="button" name="update_cart"
                                        value="Update cart">Update cart</button>
                                    <input type="hidden" id="woocommerce-cart-nonce"
                                        name="woocommerce-cart-nonce" value="cc9f31e5b7" /><input
                                        type="hidden" name="_wp_http_referer" value="/cart/" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <div class="cart-collaterals">
                    <div class="cart_totals ">
                        <h2>Cart totals</h2>
                        <table cellspacing="0" class="shop_table shop_table_responsive">
                            <tr class="cart-subtotal">
                                <th>Subtotal</th>
                                <td data-title="Subtotal"><span
                                        class="woocommerce-Price-amount amount"><bdi><span
                                                class="woocommerce-Price-currencySymbol">&#36;</span>81.00</bdi></span>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th>Total</th>
                                <td data-title="Total"><strong><span
                                            class="woocommerce-Price-amount amount"><bdi><span
                                                    class="woocommerce-Price-currencySymbol">&#36;</span>81.00</bdi></span></strong>
                                </td>
                            </tr>
                        </table>
                        <div class="wc-proceed-to-checkout">
                            <a href="{{ url('/checkout')}}"
                                class="checkout-button button alt wc-forward">
                                Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- #post-14653 -->
    </section><!-- Primary End -->
</div>
<!-- ** Container End ** -->
@endsection