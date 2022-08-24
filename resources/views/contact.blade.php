@extends('base')
@section('title') Contact us @endsection
@section('header')
<!-- ** Breadcrumb ** -->
<section class="main-title-section-wrapper breadcrumb-left">
    <div class="main-title-section-bg"
        style="background-image: url('{{ url('wp-content/uploads/sites/12/2018/05/bc-img.jpg')}}'); background-position: left top; background-size: auto; background-repeat: no-repeat; background-attachment: fixed; ">
    </div>
    <div class="container">
        <div class="main-title-section">
            <h1>Contact Us</h1>
        </div>
        <div class="breadcrumb">
            <a href="{{ url('/')}}">Home</a>
            <span class="fa default"></span>
            <span class="current">Contact Us</span>
        </div>
    </div>
</section>
<!-- ** Breadcrumb End ** -->
@endsection
@section('content')
<!-- ** Container ** -->
<div class="container">
    <div class="container">
        <!-- Primary -->
        <section id="primary" class="content-full-width">
            <!-- #post-13924 -->
            <div id="post-13924" class="post-13924 page type-page status-publish hentry">
                <div
                    class="vc_row wpb_row vc_row-fluid vc_column-gap-15 vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
                    <div
                        class="dt-sc-dark-bg vcr_mobile-top-space wpb_column vc_column_container vc_col-sm-6 vc_col-has-fill">
                        <div class="vc_column-inner vc_custom_1529390796568" style="background-image: url('{{ url('wp-content/uploads/sites/12/2018/05/contact-bg.jpg')}}'); background-position: left top; background-size: auto; background-repeat: no-repeat; background-attachment: fixed; ">
                            <div class="wpb_wrapper">
                                <h2 style="font-size: 40px;line-height: 1;text-align: left" class="vc_custom_heading">
                                    Toll Free<br>
                                    <strong>{{$site->phone ? $site->phone : env('PHONE1') }}</strong>
                                </h2>
                                <div class="wpb_text_column wpb_content_element ">
                                    <div class="wpb_wrapper">
                                        <p>Want to get the best of the interiors for Bathrooms.<br> our Wide Range of
                                            Portfolios.</p>
                                        <p>Get in touch with us filling out this form.</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wpb_column vc_column_container vc_col-sm-6">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <h2 style="font-size: 30px;text-align: left" class="vc_custom_heading">Get in Touch Now!
                                </h2>
                                <div class="wpb_text_column wpb_content_element  vc_custom_1528703786186">
                                    <div class="wpb_wrapper">
                                        <p>Tell me about your wishes and dreams. Let me assist you in your Journey and
                                            we will create something spacial to remember.</p>

                                    </div>
                                </div>
                                <div class="ult-spacer spacer-62daa46932058" data-id="62daa46932058" data-height="30"
                                    data-height-mobile="30" data-height-tab="30" data-height-tab-portrait=""
                                    data-height-mobile-landscape="" style="clear:both;display:block;"></div>
                                <div role="form" class="form-wrapper position-relative wpcf7" id="wpcf7-f14642-p13924-o1" lang="en-US" dir="ltr">
                                    <div class="load-overlay" style="display:none">
                                      <span class="overlay-close btn-remove" title="close overlay"><i class="fa fa-close"></i></span>
                                          <div class="wrapper-overlay">
                                              <div class="row">
                                                  <div class="col-12">
                                                      <div class="loader-container">
                                                          <div class="overlay-loader">
                                                              <svg class="circular" viewBox="25 25 50 50">
                                                              <circle class="path" cx="50" cy="50" r="10" fill="none" stroke-width="2" stroke-miterlimit="10"/>
                                                              </svg>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                    </div>
                                    <div class="screen-reader-response">
                                        <ul></ul>
                                    </div>
                                    <form action="" method="post" class="SubmitForm" novalidate>
                                        <div class="vc_row wpb_row vc_row-fluid"> 
                                            <div class="dt-sc-hr-top-10 "> </div>
                                            <div class="dt-sc-hr-top-5 "> </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                               <div class="vc_column-inner ">
                                                    <div class="form-group wpb_wrapper">
                                                        <span class="wpcf7-form-control-wrap subject">
                                                            <input 
                                                                type="text"
                                                                name="subject" aria-label="subject" value="" size="40"
                                                                class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required "
                                                                aria-required="true" aria-invalid="false"
                                                                placeholder="Subject"></span>
                                                        <div class="feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dt-sc-hr-top-10 "> </div>
                                            <div class="dt-sc-hr-top-5 "> </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-6">
                                                <div class="vc_column-inner ">
                                                    <div class="form-group wpb_wrapper">
                                                        <span class="wpcf7-form-control-wrap first_name">
                                                            <input 
                                                                type="text"
                                                                name="first_name" aria-label="first_name" value="" size="40"
                                                                class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required "
                                                                aria-required="true" aria-invalid="false"
                                                                placeholder="First Name"></span>
                                                        <div class="feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-6">
                                                <div class="vc_column-inner ">
                                                    <div class="form-group wpb_wrapper"><span
                                                            class="wpcf7-form-control-wrap last_name"><input type="text"
                                                                name="last_name" aria-label="last_name" value="" size="40"
                                                                class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                                                                aria-required="true" aria-invalid="false"
                                                                placeholder="Last Name"></span>
                                                        <div class="feedback"></div>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="dt-sc-hr-invisible-xsmall "> </div><br>
                                            <div class="wpb_column vc_column_container vc_col-sm-6">
                                                <div class="vc_column-inner ">
                                                    <div class="form-group wpb_wrapper"><span
                                                            class="wpcf7-form-control-wrap email"><input
                                                                type="email" aria-label="email" name="email" value="" size="40"
                                                                class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                                                aria-required="true" aria-invalid="false"
                                                                placeholder="Email Address"></span>
                                                    <div class="feedback"></div>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="wpb_column vc_column_container vc_col-sm-6">
                                                <div class="vc_column-inner ">
                                                    <div class="form-group wpb_wrapper"><span
                                                            class="wpcf7-form-control-wrap phone"><input type="tel"
                                                                name="phone" aria-label="phone" value="" size="40"
                                                                class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel"
                                                                aria-required="true" aria-invalid="false"
                                                                placeholder="Phone Number"></span>
                                                    <div class="feedback"></div>
                                                    </div>
                                                </div>
                                            </div><br>
                                            <div class="dt-sc-hr-invisible-xsmall "> </div>
                                            <div class="dt-sc-clear "> </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-12">
                                                <div class="vc_column-inner ">
                                                    <div class="form-group wpb_wrapper"><span
                                                            class="wpcf7-form-control-wrap message"><textarea
                                                                name="message"  aria-label="message" cols="40" rows="10"
                                                                class="wpcf7-form-control wpcf7-textarea"
                                                                aria-invalid="false"
                                                                placeholder="Your Message"></textarea></span>
                                                        <div class="feedback"></div>
                                                        <div class="dt-sc-hr-top-5 "> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-12 text-center" style="text-align:center">
                                                <button class="wpcf7-form-control wpcf7-submit">Submit</button>
                                            </div>
                                        </div>
                                        <div class="response"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="map"></div>
                <div class="vc_row-full-width vc_clearfix"></div>
                <div class="vc_row wpb_row vc_row-fluid map-overlay-top vc_custom_1528453604963 vc_row-has-fill" >
                    <div class="wpb_column vc_column_container vc_col-sm-4" >
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div class="dt-sc-image-caption  location">
                                    <div class="dt-sc-image-wrapper"><img width="480" height="350"
                                        src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites/12/2018/05/contact-img2.jpg')}}"
                                            class="attachment-full" alt="" loading="lazy"
                                            srcset="{{ url('wp-content/uploads/sites/12/2018/05/contact-img2.jpg')}} 480w, {{ url('wp-content/uploads/sites/12/2018/05/contact-img2-300x219.jpg')}} 300w"
                                            sizes="(max-width: 480px) 100vw, 480px">
                                        <div class="icon-wrapper"><span class="fa fa-map-marker"> </span></div>
                                    </div>
                                    <div class="dt-sc-image-content">
                                        <div class="dt-sc-image-title">
                                            <h3>{{$site->site_location ? $site->site_location : env('SITE_LOcATION') }}</h3>
                                        </div>
                                        <p>{{$site->site_address ? $site->site_address : env('SITE_ADDRESS') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div class="ult-spacer spacer-62daa46934a32" data-id="62daa46934a32" data-height="70"
                                    data-height-mobile="35" data-height-tab="70" data-height-tab-portrait="50"
                                    data-height-mobile-landscape="50" style="clear:both;display:block;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-vc-full-width="true" data-vc-full-width-init="true"
                    class="vc_row wpb_row vc_row-fluid dt-skin-secondary-bg dt-sc-dark-bg vcr_hook-top vc_row-o-equal-height vc_row-flex"
                    style="position: relative; left: -47px; box-sizing: border-box; width: 1024px; padding-left: 47px; padding-right: 47px;">
                    <div class="dt-sc-skin-highlight wpb_column vc_column_container vc_col-sm-3 vc_col-has-fill">
                        <div class="vc_column-inner vc_custom_1528897434239" style=" text-align:left; ">
                            <div class="wpb_wrapper"><img width="199" height="49"
                                src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites/12/2018/05/light-logo.png')}}"
                                    class="aligncenter attachment-full" alt="" loading="lazy"></div>
                        </div>
                    </div>
                <div class="vc_row-full-width vc_clearfix"></div>
            </div><!-- #post-13924 -->
        </section><!-- Primary End -->
    </div>
</div>
@endsection