@extends('base')
@section('title') Welcome @endsection
@section('header')
<!-- ** Slider ** -->
<div id="slider">
    <div id="dt-sc-rev-slider" class="dt-sc-main-slider">
        <!-- START Home REVOLUTION SLIDER 6.5.4 -->
        <p class="rs-p-wp-fix"></p>
        <rs-module-wrap id="rev_slider_1_1_wrapper" data-source="gallery" style="visibility:hidden;background:transparent;padding:0;margin:0px auto;margin-top:0;margin-bottom:0;max-width:;">
            <rs-module id="rev_slider_1_1" style="" data-version="6.5.4">
                <rs-slides>
                    @if(count($homedata) > 0)
                        @foreach ($homedata as $home)
                        <rs-slide data-key="rs-{{$home->id}}" data-title="Slide" data-thumb="/homepage/{{$home->slider_100x50}}" data-anim="ms:600;" data-in="o:0;" data-out="a:false;">
                            <img src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/plugins/revslider/public/assets/assets/dummy.png') }}" title="Home" class="rev-slidebg tp-rs-img rs-lazyload" data-lazyload="/homepage/{{$home->slider_1920x950}}"data-no-retina>
                            <rs-layer id="slider-1-slide-2-layer-{{$home->id}}" class="tp-shape tp-shapewrapper" data-type="shape" data-rsp_ch="on" data-xy="x:256px;y:390px;" data-text="fw:300;a:inherit;" data-dim="w:397px;h:7;" data-frame_0="x:-200px;tp:600;"
                                data-frame_0_mask="u:t;" data-frame_1="tp:600;st:1880;sp:1200;sR:1880;" data-frame_1_mask="u:t;" data-frame_999="o:0;tp:600;st:w;sR:5920;" style="z-index:5;background-color:#e81a46;">
                                <rs-bg-elem style="position:absolute; top:0px;left:0px;"></rs-bg-elem>

                            </rs-layer>
                            <rs-layer id="slider-1-slide-2-layer-{{$home->id}}" data-type="text" data-color="#000000" data-xy="x:30px;y:303px;" data-text="s:85;l:95;fw:300;a:inherit;" data-frame_0="y:40px;tp:600;" data-frame_1="tp:600;st:500;sp:1400;sR:500;"
                                data-frame_999="o:0;tp:600;st:w;sR:7100;" style="z-index:6;font-family:Lato;">
                                <rs-bg-elem style="position:absolute; top:0px;left:0px;"></rs-bg-elem>
                                {{$home->heading_plain}} <strong>{{$home->heading_strong}}</strong>
                            </rs-layer>
                            <rs-layer id="slider-1-slide-2-layer-{{$home->id}}" data-type="text" data-color="#000000" data-rsp_ch="on" data-xy="x:30px;y:407px;" data-text="s:35;l:40;fw:300;a:inherit;" data-frame_0="y:50px;tp:600;" data-frame_1="tp:600;st:2810;sp:1400;sR:2810;"
                                data-frame_999="o:0;tp:600;st:w;sR:4790;" style="z-index:7;font-family:Lato;">
                                <rs-bg-elem style="position:absolute; top:0px;left:0px;"></rs-bg-elem>
                               {{$home->text}}
                            </rs-layer>
                        </rs-slide>
                        @endforeach
                    @else

                    <rs-slide data-key="rs-2" data-title="Slide" data-thumb="{{ url('wp-content/uploads/sites/12/2018/05/slider2-100x50.jpg') }}" data-anim="ms:600;" data-in="o:0;" data-out="a:false;">
                        <img src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/plugins/revslider/public/assets/assets/dummy.png') }}" title="Home" class="rev-slidebg tp-rs-img rs-lazyload" data-lazyload="{{ url('wp-content/uploads/sites/12/2018/05/slider2.jpg') }}"data-no-retina>
                        <rs-layer id="slider-1-slide-2-layer-4" class="tp-shape tp-shapewrapper" data-type="shape" data-rsp_ch="on" data-xy="x:256px;y:390px;" data-text="fw:300;a:inherit;" data-dim="w:397px;h:7;" data-frame_0="x:-200px;tp:600;"
                            data-frame_0_mask="u:t;" data-frame_1="tp:600;st:1880;sp:1200;sR:1880;" data-frame_1_mask="u:t;" data-frame_999="o:0;tp:600;st:w;sR:5920;" style="z-index:5;background-color:#e81a46;">
                            <rs-bg-elem style="position:absolute; top:0px;left:0px;"></rs-bg-elem>

                        </rs-layer>
                        <rs-layer id="slider-1-slide-2-layer-1" data-type="text" data-color="#000000" data-xy="x:30px;y:303px;" data-text="s:85;l:95;fw:300;a:inherit;" data-frame_0="y:40px;tp:600;" data-frame_1="tp:600;st:500;sp:1400;sR:500;"
                            data-frame_999="o:0;tp:600;st:w;sR:7100;" style="z-index:6;font-family:Lato;">
                            <rs-bg-elem style="position:absolute; top:0px;left:0px;"></rs-bg-elem>
                            Think <strong>Innovative</strong>
                        </rs-layer>
                        <rs-layer id="slider-1-slide-2-layer-2" data-type="text" data-color="#000000" data-rsp_ch="on" data-xy="x:30px;y:407px;" data-text="s:35;l:40;fw:300;a:inherit;" data-frame_0="y:50px;tp:600;" data-frame_1="tp:600;st:2810;sp:1400;sR:2810;"
                            data-frame_999="o:0;tp:600;st:w;sR:4790;" style="z-index:7;font-family:Lato;">
                            <rs-bg-elem style="position:absolute; top:0px;left:0px;"></rs-bg-elem>
                            Specialists in branded bathroom suites
                        </rs-layer>
                    </rs-slide>

                    <rs-slide data-key="rs-1" data-title="Slide" data-thumb="{{ url('wp-content/uploads/sites/12/2018/05/slider01-100x50.jpg') }}" data-anim="ms:600;" data-in="o:0;" data-out="a:false;">
                        <img src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/plugins/revslider/public/assets/assets/dummy.png') }}" title="Home" class="rev-slidebg tp-rs-img rs-lazyload" data-lazyload="{{ url('wp-content/uploads/sites/12/2018/05/slider01.jpg') }}" data-no-retina>
                        <rs-layer id="slider-1-slide-1-layer-4" class="tp-shape tp-shapewrapper" data-type="shape" data-rsp_ch="on" data-xy="x:256px;y:390px;" data-text="fw:300;a:inherit;" data-dim="w:250px;h:6px;" data-frame_0="x:-200px;tp:600;"
                            data-frame_0_mask="u:t;" data-frame_1="tp:600;st:1880;sp:1200;sR:1880;" data-frame_1_mask="u:t;" data-frame_999="o:0;tp:600;st:w;sR:5920;" style="z-index:5;background-color:#e81a46;">
                            <rs-bg-elem style="position:absolute; top:0px;left:0px;"></rs-bg-elem>

                        </rs-layer>
                        <rs-layer id="slider-1-slide-1-layer-1" data-type="text" data-color="#ffffff" data-xy="x:30px;y:303px;" data-text="s:85;l:95;fw:300;a:inherit;" data-frame_0="y:40px;tp:600;" data-frame_1="tp:600;st:500;sp:1400;sR:500;"
                            data-frame_999="o:0;tp:600;st:w;sR:7100;" style="z-index:6;font-family:Lato;">
                            <rs-bg-elem style="position:absolute; top:0px;left:0px;"></rs-bg-elem>
                            Think <strong>Luxury</strong>
                        </rs-layer>
                        <rs-layer id="slider-1-slide-1-layer-2" data-type="text" data-color="#ffffff" data-rsp_ch="on" data-xy="x:30px;y:407px;" data-text="w:normal;s:35;l:40;fw:300;a:inherit;" data-dim="w:500px;" data-frame_0="y:50px;tp:600;"
                            data-frame_1="tp:600;st:2810;sp:1400;sR:2810;" data-frame_999="o:0;tp:600;st:w;sR:4790;" style="z-index:7;font-family:Lato;">
                            <rs-bg-elem style="position:absolute; top:0px;left:0px;"></rs-bg-elem>
                            We design fully bespoke and personalised bathroom solutions
                        </rs-layer>
                    </rs-slide>

                    <rs-slide data-key="rs-3" data-title="Slide" data-thumb="{{ url('wp-content/uploads/sites/12/2018/05/slider3-100x50.jpg') }}" data-anim="ms:600;" data-in="o:0;" data-out="a:false;">
                        <img src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/plugins/revslider/public/assets/assets/dummy.png') }}" title="Home" class="rev-slidebg tp-rs-img rs-lazyload" data-lazyload="{{ url('wp-content/uploads/sites/12/2018/05/slider3.jpg') }}" data-no-retina>
                        <rs-layer id="slider-1-slide-3-layer-4" class="tp-shape tp-shapewrapper" data-type="shape" data-rsp_ch="on" data-xy="x:305px;y:390px;" data-text="fw:300;a:inherit;" data-dim="w:347px;h:8px;" data-frame_0="x:-200px;tp:600;"
                            data-frame_0_mask="u:t;" data-frame_1="tp:600;st:1880;sp:1200;sR:1880;" data-frame_1_mask="u:t;" data-frame_999="o:0;tp:600;st:w;sR:5920;" style="z-index:5;background-color:#e81a46;">
                            <rs-bg-elem style="position:absolute; top:0px;left:0px;"></rs-bg-elem>

                        </rs-layer>
                        <rs-layer id="slider-1-slide-3-layer-1" data-type="text" data-color="#000000" data-xy="x:30px;y:303px;" data-text="s:85;l:95;fw:300;a:inherit;" data-frame_0="y:40px;tp:600;" data-frame_1="tp:600;st:500;sp:1400;sR:500;"
                            data-frame_999="o:0;tp:600;st:w;sR:7100;" style="z-index:6;font-family:Lato;">
                            <rs-bg-elem style="position:absolute; top:0px;left:0px;"></rs-bg-elem>
                            Design <strong>Solutions</strong>
                        </rs-layer>
                        <rs-layer id="slider-1-slide-3-layer-2" data-type="text" data-color="#000000" data-rsp_ch="on" data-xy="x:34px;y:407px;" data-text="s:35;l:40;fw:300;a:inherit;" data-frame_0="y:50px;tp:600;" data-frame_1="tp:600;st:2810;sp:1400;sR:2810;"
                            data-frame_999="o:0;tp:600;st:w;sR:4790;" style="z-index:7;font-family:Lato;">
                            <rs-bg-elem style="position:absolute; top:0px;left:0px;"></rs-bg-elem>
                            Bringing designs to life.
                        </rs-layer>
                    </rs-slide>
                    @endif
                </rs-slides>
            </rs-module>
            <script type="text/javascript">
                setREVStartSize({
                    c: 'rev_slider_1_1',
                    rl: [1240, 1024, 778, 480],
                    el: [],
                    gw: [1170],
                    gh: [950],
                    type: 'standard',
                    justify: '',
                    layout: 'fullwidth',
                    mh: "0"
                });
            </script>
        </rs-module-wrap>
        <!-- END REVOLUTION SLIDER -->

    </div>
</div>
<!-- ** Slider End ** -->
@endsection
@section('content')

<!-- ** Container ** -->
<div class="container">
    <section id="primary" class="content-full-width">
    	<div id="post-4" class="post-4 page type-page status-publish hentry">
    		<div class="vc_row wpb_row vc_row-fluid">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div id="1556963388418-70c779d1-2e5b" class="dt-sc-empty-space"></div>
                        </div>
                    </div>
                </div>
                @if(count($middle) > 0)
                    @foreach ($middle as $home)
                    <div class="wpb_column vc_column_container vc_col-sm-4">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div class='dt-sc-image-caption type2 '>
                                    <div class='dt-sc-image-wrapper'>
                                        <img width="420" height="420" src="{{ url('images/loader.gif')}}" data-src="/homepage/{{$home->image_420x420}}" class="attachment-full" alt="" loading="lazy" srcset="/homepage/{{$home->image_420x420}} 420w"
                                            sizes="(max-width: 420px) 420px" /></div>
                                    <div class='dt-sc-image-content'>
                                        <div class='dt-sc-image-title'>
                                            <h3><a href="/products/faucets" target="_self">{{$home->image_text}}</a></h3>
                                        </div>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                <div class="wpb_column vc_column_container vc_col-sm-4">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class='dt-sc-image-caption type2 '>
                                <div class='dt-sc-image-wrapper'>
                                	<img width="420" height="420" src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites/12/2018/05/home01.jpg')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites/12/2018/05/home01.jpg')}} 420w"
                                        sizes="(max-width: 420px) 420px" /></div>
                                <div class='dt-sc-image-content'>
                                    <div class='dt-sc-image-title'>
                                        <h3><a href="/products/faucets" target="_self">Faucets</a></h3>
                                    </div>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wpb_column vc_column_container vc_col-sm-4">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class='dt-sc-image-caption type2 '>
                                <div class='dt-sc-image-wrapper'><img width="420" height="420" data-src="{{ url('wp-content/uploads/sites/12/2018/05/home02.jpg')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites/12/2018/05/home02.jpg')}} 420w"
                                        sizes="(max-width: 420px) 420px" /></div>
                                <div class='dt-sc-image-content'>
                                    <div class='dt-sc-image-title'>
                                        <h3><a href="/products/bathtubs" target="_self">Bath Tubs</a></h3>
                                    </div>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wpb_column vc_column_container vc_col-sm-4">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class='dt-sc-image-caption type2 '>
                                <div class='dt-sc-image-wrapper'><img width="420" height="420" data-src="{{ url('wp-content/uploads/sites/12/2018/05/home03.jpg')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites/12/2018/05/home03.jpg')}} 420w"
                                        sizes="(max-width: 420px) 420px" /></div>
                                <div class='dt-sc-image-content'>
                                    <div class='dt-sc-image-title'>
                                        <h3><a href="/products/showers" target="_self">Showers</a></h3>
                                    </div>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div id="1556963429005-9a778797-da49" class="dt-sc-empty-space"></div>
                        </div>
                    </div>
                </div>
            </div>
    	</div>

    	<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid">
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                       	<div id="1556963558321-4d506aa3-9f28" class="dt-sc-empty-space"></div>
                        <div class="vc_row wpb_row vc_inner vc_row-fluid dt-sc-dark-bg">
                            @if(count($middlepart) > 0)
                                @foreach ($middlepart as $home)
                                <div class="wpb_column vc_column_container vc_col-sm-3">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class='dt-sc-icon-box type3 no-bg-icon'>
                                                <div class="icon-wrapper"><span><img width="70" height="70" src="{{ url('images/loader.gif')}}" data-src="/homepage/{{$home->image_70x70}}" class="attachment-full" alt="" loading="lazy" /></span></div>
                                                <div
                                                    class="icon-content">
                                                    <h4>{{$home->image_heading}}</h4>
                                                    <p>{{$home->image_text}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                            <div class="wpb_column vc_column_container vc_col-sm-3">
                                <div class="vc_column-inner ">
                                    <div class="wpb_wrapper">
                                        <div class='dt-sc-icon-box type3 no-bg-icon'>
                                            <div class="icon-wrapper"><span><img width="70" height="70" src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites/12/2018/05/icon1.png')}}" class="attachment-full" alt="" loading="lazy" /></span></div>
                                            <div
                                                class="icon-content">
                                                <h4>Jacuzzi Tubs</h4>
                                                <p>There are many variations of passages of Lorem Ipsum available all the Lorem Ipsum eiusmod tempo</p>
                                        	</div>
                                    	</div>
                                	</div>
                            	</div>
                        	</div>
                            <div class="wpb_column vc_column_container vc_col-sm-3">
                                <div class="vc_column-inner ">
                                    <div class="wpb_wrapper">
                                        <div class='dt-sc-icon-box type3 no-bg-icon'>
                                            <div class="icon-wrapper"><span><img width="70" height="70" src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites/12/2018/05/icon2.png')}}" class="attachment-full" alt="" loading="lazy" /></span></div>
                                            <div class="icon-content">
                                                <h4>Premium Showers</h4>
                                                <p>There are many variations of passages of Lorem Ipsum available all the Lorem Ipsum eiusmod tempo</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-3">
                                <div class="vc_column-inner ">
                                    <div class="wpb_wrapper">
                                        <div class='dt-sc-icon-box type3 no-bg-icon'>
                                            <div class="icon-wrapper"><span><img width="70" height="70" src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites/12/2018/05/icon3.png')}}" class="attachment-full" alt="" loading="lazy" /></span></div>
                                            <div class="icon-content">
                                                <h4>Sanitary Wares</h4>
                                                <p>There are many variations of passages of Lorem Ipsum available all the Lorem Ipsum eiusmod tempo</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wpb_column vc_column_container vc_col-sm-3">
                                <div class="vc_column-inner ">
                                    <div class="wpb_wrapper">
                                        <div class='dt-sc-icon-box type3 no-bg-icon'>
                                            <div class="icon-wrapper"><span><img width="70" height="70" src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites/12/2018/05/icon4.png')}}" class="attachment-full" alt="" loading="lazy" /></span></div>
                                            <div class="icon-content">
                                                <h4>Whirlpools</h4>
                                                <p>There are many variations of passages of Lorem Ipsum available all the Lorem Ipsum eiusmod tempo</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    	<div id="1556963576218-3c2537a2-4477" class="dt-sc-empty-space"></div>
                	</div>
            	</div>
        	</div>
    	</div>

    	<div class="vc_row-full-width vc_clearfix"></div>




    	<!-- Row Backgrounds -->
        <div class="upb_bg_img" data-ultimate-bg="url({{ url('wp-content/uploads/sites/12/2018/05/home-bg1.jpg')}}" data-image-id="id^14506|url^{{ url('wp-content/uploads/sites/12/2018/05/home-bg1.jpg')}}|caption^null|alt^null|title^home-bg1|description^null"
            data-ultimate-bg-style="vcpb-vz-jquery" data-bg-img-repeat="no-repeat" data-bg-img-size="cover" data-bg-img-position="" data-parallx_sense="30" data-bg-override="0" data-bg_img_attach="scroll" data-upb-overlay-color="" data-upb-bg-animation=""
            data-fadeout="" data-bg-animation="left-animation" data-bg-animation-type="h" data-animation-repeat="repeat" data-fadeout-percentage="30" data-parallax-content="" data-parallax-content-sense="30" data-row-effect-mobile-disable="true"
            data-img-parallax-mobile-disable="true" data-rtl="false" data-custom-vc-row="" data-vc="6.7.0" data-is_old_vc="" data-theme-support="" data-overlay="false" data-overlay-color="" data-overlay-pattern="" data-overlay-pattern-opacity=""
            data-overlay-pattern-size=""></div>

            

            <div id="gallery" data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid dt-skin-secondary-bg dt-sc-dark-bg gallery-wrapper-main vc_custom_1556971074329">
                <div class="dt-sc-stretch-row-content">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div class='dt-sc-tabs-horizontal-frame-container type5 alter' data-effect='fade'>
                                    <ul class='mb-4 dt-sc-tabs-horizontal-frame' style="margin-bottom:40px!important;">
                                        @if(count($categories) > 0)
                                            @foreach ($categories as $category)
                                                <li><a href="javascript:void(0);">{{$category->category}}</a></li>
                                            @endforeach
                                        @else
                                        <li><a href="javascript:void(0);">Bath Furniture</a></li>
                                        <li><a href="javascript:void(0);">Hot Tubs</a></li>
                                        <li><a href="javascript:void(0);">Faucets</a></li>
                                        <li><a href="javascript:void(0);">Wash Basin</a></li>
                                        <li><a href="javascript:void(0);">Saunas</a></li>
                                        <li><a href="javascript:void(0);">Showers</a></li>
                                        @endif
                                    </ul>
                                    @if (count($product) > 0)
                                    <div class='dt-sc-tabs-horizontal-frame-content'>
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                        @foreach ($product as $pro)
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                           <div class='dt-sc-image-wrapper'><img width="1200" height="810" src="{{ url('images/loader.gif')}}" data-src="/homepage/{{$pro->image_1200x810}}" class="attachment-full" alt="" loading="lazy" srcset="/homepage/{{$pro->image_1200x810}} 1200w"
                                                            sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/{{$pro->category}}" target="_self" title="#">{{$pro->title}}</a></h3>
                                                                </div>
                                                                <p>{{$pro->text}}</p>
                                                                <p><a href='/products/{{$pro->category}}' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
                                                            </div>
                                                        </div>
                                                        <div id="1556970394360-01b3f401-bfc3" class="dt-sc-empty-space"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                    @else
                                    <div class='dt-sc-tabs-horizontal-frame-content'>
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid">

                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                           <div class='dt-sc-image-wrapper'><img width="1200" height="810" src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery1.jpg')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery1.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/faucets" target="_self" title="#">Bathroom Sink Faucets</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/faucets' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
                                                            </div>
                                                        </div>
                                                        <div id="1556970394360-01b3f401-bfc3" class="dt-sc-empty-space"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                            <div class='dt-sc-image-wrapper'><img width="1200" height="810" src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery2.jpg')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery2.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery2-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery2-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery2-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery2-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/bathtubs" target="_self" title="#">Bathroom Sinks</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/bathtubs' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
                                                            </div>
                                                        </div>
                                                        <div id="1556970651012-7a633879-1762" class="dt-sc-empty-space"></div>
                                                    </div>
                                                </div>
                                            </div>
	                                        <div class="wpb_column vc_column_container vc_col-sm-4">
	                                            <div class="vc_column-inner ">
	                                                <div class="wpb_wrapper">
	                                                    <div class='dt-sc-image-caption type6 content-with-btn'>
	                                                        <div class='dt-sc-image-wrapper'><img width="1200" height="810" src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery3.jpg')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery3.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery3-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery3-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery3-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery3-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
	                                                        <div class='dt-sc-image-content'>
	                                                            <div class='dt-sc-image-title'>
	                                                                <h3><a href="/products/bathtubs" target="_self" title="#">Bathroom Accessories</a></h3>
	                                                            </div>
	                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
	                                                            <p><a href='/products/bathtubs' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
	                                                        </div>
	                                                    </div>
	                                                    <div id="1556970665563-b8aec624-2508" class="dt-sc-empty-space"></div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="wpb_column vc_column_container vc_col-sm-4">
	                                            <div class="vc_column-inner ">
	                                                <div class="wpb_wrapper">
	                                                    <div class='dt-sc-image-caption type6 content-with-btn'>
	                                                        <div class='dt-sc-image-wrapper'><img width="1200" height="810" src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery4.jpg')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery4.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery4-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery4-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery4-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery4-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
	                                                        <div class='dt-sc-image-content'>
	                                                            <div class='dt-sc-image-title'>
	                                                                <h3><a href="//homi.vedicthemes.com/product-category/bath-furniture/" target="_self" title="#">Shower Faucets</a></h3>
	                                                            </div>
	                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
	                                                            <p><a href='//homi.vedicthemes.com/product-category/bath-furniture/' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                             <div class='dt-sc-image-wrapper'><img width="1200" height="810" src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery7.jpg')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery7.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery7-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery7-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery7-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery7-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/bathtubs" target="_self" title="#">Hot Tubs</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/bathtubs' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                             <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery5.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery5.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery5-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery5-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery5-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery5-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/bathtubs" target="_self" title="#">Shower Systems</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/bathtubs' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   	</div>
                                    <div class='dt-sc-tabs-horizontal-frame-content'>
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                            <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery6.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery6.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery6-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery6-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery6-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery6-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/hottubs" target="_self" title="#">Tub and Shower Faucets</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/hottubs' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
                                                            </div>
                                                        </div>
                                                        <div id="1556970500717-6dc07999-c09c" class="dt-sc-empty-space"></div>
                                                    </div>
                                                </div>
                                            </div>
	                                        <div class="wpb_column vc_column_container vc_col-sm-4">
	                                            <div class="vc_column-inner ">
	                                                <div class="wpb_wrapper">
	                                                    <div class='dt-sc-image-caption type6 content-with-btn'>
	                                                           <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery7.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery7.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery7-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery7-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery7-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery7-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
	                                                        <div class='dt-sc-image-content'>
	                                                            <div class='dt-sc-image-title'>
	                                                                <h3><a href="/products/hottubs" target="_self" title="#">Bath Tub Faucets</a></h3>
	                                                            </div>
	                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
	                                                            <p><a href='/products/hottubs' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
	                                                        </div>
	                                                    </div>
	                                                    <div id="1556970676494-7bb0345b-6db7" class="dt-sc-empty-space"></div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="wpb_column vc_column_container vc_col-sm-4">
	                                            <div class="vc_column-inner ">
	                                                <div class="wpb_wrapper">
	                                                    <div class='dt-sc-image-caption type6 content-with-btn'>
	                                                        <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery8.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery8.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery8-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery8-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery8-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery8-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
	                                                        <div class='dt-sc-image-content'>
	                                                            <div class='dt-sc-image-title'>
	                                                                <h3><a href="/products/hottubs" target="_self" title="#">Bathtubs</a></h3>
	                                                            </div>
	                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
	                                                            <p><a href='/products/hottubs' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
	                                                        </div>
	                                                    </div>
	                                                    <div id="1556970686005-4bf46480-7bbb" class="dt-sc-empty-space"></div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="wpb_column vc_column_container vc_col-sm-4">
	                                            <div class="vc_column-inner ">
	                                                <div class="wpb_wrapper">
	                                                    <div class='dt-sc-image-caption type6 content-with-btn'>
	                                                        <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery9.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery9.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery9-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery9-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery9-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery9-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
	                                                        <div class='dt-sc-image-content'>
	                                                            <div class='dt-sc-image-title'>
	                                                                <h3><a href="/products/hottubs" target="_self" title="#">Showers</a></h3>
	                                                            </div>
	                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
	                                                            <p><a href='/products/hottubs' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                            <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery10.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery10.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery10-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery10-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery10-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery10-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/hottubs" target="_self" title="#">Toilets</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/hottubs' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                             <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery11.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery11.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery11-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery11-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery11-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery11-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/hottubs" target="_self" title="#">Toilet Seats</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/hottubs' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='dt-sc-tabs-horizontal-frame-content'>
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                            <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery12.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery12.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery12-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery12-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery12-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery12-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/faucets" target="_self" title="#">Bathroom Vanities</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/faucets' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
                                                            </div>
                                                        </div>
                                                        <div id="1556970510274-661e8d91-027a" class="dt-sc-empty-space"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                           <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery6.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery6.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery6-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery6-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery6-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery6-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/faucets" target="_self" title="#">Medicine Cabinets</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/faucets' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
                                                            </div>
                                                        </div>
                                                        <div id="1556970696257-201cde81-09c8" class="dt-sc-empty-space"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                            <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery5.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery5.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery5-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery5-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery5-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery5-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/faucets" target="_self" title="#">Exhaust Fans</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/faucets' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
                                                            </div>
                                                        </div>
                                                        <div id="1556970705511-a0ff5cab-c5e4" class="dt-sc-empty-space"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                            <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery4.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery4.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery4-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery4-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery4-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery4-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/faucets" target="_self" title="#">Bidet Fixtures</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/faucets' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                            <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery3.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery3.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery3-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery3-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery3-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery3-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/faucets" target="_self" title="#">Bidet Faucets</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/faucets' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                            <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery2.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery2.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery2-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery2-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery2-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery2-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/faucets" target="_self" title="#">Wash Faucets</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/faucets' target='_blank' title='' class='dt-sc-button   medium   bordered  '> View Collection </a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='dt-sc-tabs-horizontal-frame-content'>
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                            <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery1.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery1.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="//products/washbasin" target="_self" title="#">Bathroom Accessories</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='//products/washbasin' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
                                                            </div>
                                                        </div>
                                                        <div id="1556970524184-8129a4bf-7cc3" class="dt-sc-empty-space"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                             <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery12.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery12.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery12-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery12-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery12-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery12-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="//products/washbasin" target="_self" title="#">Bath Tub Faucets</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='//products/washbasin' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
                                                            </div>
                                                        </div>
                                                        <div id="1556970714694-e36abcd1-5374" class="dt-sc-empty-space"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                            <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery11.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery11.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery11-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery11-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery11-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery11-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="//products/washbasin" target="_self" title="#">Toilet Seats</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='//products/washbasin' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
                                                            </div>
                                                        </div>
                                                        <div id="1556970725257-dfcea7ac-dedc" class="dt-sc-empty-space"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                             <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery10.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery10.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery10-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery10-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery10-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery10-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="//products/washbasin" target="_self" title="#">Bidet Fixtures</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='//products/washbasin' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
	                                        <div class="wpb_column vc_column_container vc_col-sm-4">
	                                            <div class="vc_column-inner ">
	                                                <div class="wpb_wrapper">
	                                                    <div class='dt-sc-image-caption type6 content-with-btn'>
	                                                         <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery9.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery9.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery9-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery9-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery9-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery9-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
	                                                        <div class='dt-sc-image-content'>
	                                                            <div class='dt-sc-image-title'>
	                                                                <h3><a href="//products/washbasin" target="_self" title="#">Toilets</a></h3>
	                                                            </div>
	                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
	                                                            <p><a href='//products/washbasin' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                        </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                              <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery8.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery8.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery8-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery8-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery8-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery8-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="//products/washbasin" target="_self" title="#">Shower Faucets</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='//products/washbasin' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='dt-sc-tabs-horizontal-frame-content'>
                                       	<div class="vc_row wpb_row vc_inner vc_row-fluid">
	                                        <div class="wpb_column vc_column_container vc_col-sm-4">
	                                            <div class="vc_column-inner ">
	                                                <div class="wpb_wrapper">
	                                                    <div class='dt-sc-image-caption type6 content-with-btn'>
	                                                        <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery1.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery1.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
	                                                        <div class='dt-sc-image-content'>
	                                                            <div class='dt-sc-image-title'>
	                                                                <h3><a href="/products/saunas" target="_self" title="#">Bathroom Sink Faucets</a></h3>
	                                                            </div>
	                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
	                                                            <p><a href='/products/saunas' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
	                                                        </div>
	                                                    </div>
	                                                    <div id="1556970534926-d8c9ddb5-7630" class="dt-sc-empty-space"></div>
	                                                </div>
	                                            </div>
	                                        </div>
	                                        <div class="wpb_column vc_column_container vc_col-sm-4">
	                                            <div class="vc_column-inner ">
	                                                <div class="wpb_wrapper">
	                                                    <div class='dt-sc-image-caption type6 content-with-btn'>
	                                                       <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery2.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery2.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery2-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery2-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery2-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery2-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
	                                                        <div class='dt-sc-image-content'>
	                                                            <div class='dt-sc-image-title'>
	                                                                <h3><a href="/products/saunas" target="_self" title="#">Shower Systems</a></h3>
	                                                            </div>
	                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
	                                                            <p><a href='/products/saunas' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
	                                                        </div>
	                                                    </div>
	                                                    <div id="1556970736305-e613df38-cf18" class="dt-sc-empty-space"></div>
	                                                </div>
	                                            </div>
	                                        </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                            <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery3.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery3.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery3-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery3-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery3-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery3-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/saunas" target="_self" title="#">Showers</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/saunas' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
                                                            </div>
                                                        </div>
                                                        <div id="1556970748783-71a9cdf2-e99f" class="dt-sc-empty-space"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                            <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery1.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery1.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/saunas" target="_self" title="#">Medicine Cabinets</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/saunas' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                            <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery5.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery5.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery5-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery5-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery5-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery5-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/saunas" target="_self" title="#">Urinals</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/saunas' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                             <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery6.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery6.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery6-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery6-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery6-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery6-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="/products/saunas" target="_self" title="#">Tankless and Water Heaters</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='/products/saunas' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='dt-sc-tabs-horizontal-frame-content'>
                                        <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                             <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery4.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery4.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery4-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery4-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery4-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery4-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="//products/showers" target="_self" title="#">Bathroom Sinks</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='//products/showers' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
                                                            </div>
                                                        </div>
                                                        <div id="1556970544007-b37f3c73-b142" class="dt-sc-empty-space"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                             <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery11.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery11.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery11-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery11-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery11-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery11-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="//products/showers" target="_self" title="#">Tub and Shower Faucets</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='//products/showers' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
                                                            </div>
                                                        </div>
                                                        <div id="1556970758402-62d3af44-cf6d" class="dt-sc-empty-space"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                             <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery12.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery12.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery12-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery12-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery12-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery12-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="//products/showers" target="_self" title="#">Toilets</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='//products/showers' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
                                                            </div>
                                                        </div>
                                                        <div id="1556970769371-36afcc13-13bc" class="dt-sc-empty-space"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                              <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery1.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery1.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="//products/showers" target="_self" title="#">Exhaust Fans</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='//products/showers' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                              <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery8.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery8.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery8-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery8-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery8-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery8-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="//products/showers" target="_self" title="#">Shower Faucets</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='//products/showers' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpb_column vc_column_container vc_col-sm-4">
                                                <div class="vc_column-inner ">
                                                    <div class="wpb_wrapper">
                                                        <div class='dt-sc-image-caption type6 content-with-btn'>
                                                             <div class='dt-sc-image-wrapper'><img width="1200" height="810" data-src="{{ url('wp-content/uploads/sites//12/2018/05/gallery1.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites//12/2018/05/gallery1.jpg')}} 1200w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-300x203.jpg')}} 300w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-768x518.jpg')}} 768w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-1024x691.jpg')}} 1024w, {{ url('wp-content/uploads/sites//12/2018/05/gallery1-600x405.jpg')}} 600w"
                                                                                sizes="(max-width: 1200px) 100vw, 1200px" /></div>
                                                            <div class='dt-sc-image-content'>
                                                                <div class='dt-sc-image-title'>
                                                                    <h3><a href="//products/showers" target="_self" title="#">Bathtubs</a></h3>
                                                                </div>
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                                                <p><a href='//products/showers' target='_blank' title='' class='dt-sc-button   medium   bordered  '> Read More </a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div id="1528802493183-732db9d5-5499" class="dt-sc-empty-space"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="vc_row-full-width vc_clearfix"></div>
            

	        <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid dt-sc-dark-bg vc_row-o-full-height vc_row-o-columns-middle vc_row-flex">
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div id="1556965402753-c2810de9-a588" class="dt-sc-empty-space"></div>
                        </div>
                    </div>
                </div>
                <div class="wpb_column vc_column_container vc_col-sm-6">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div id="1528864647558-ffbeb99c-4ad5" class="dt-sc-empty-space"></div>
                            <div class='dt-sc-title script-with-sub-title subheading-text leftside-border'>
                                @if($middlepartb)
                                    <h4>{{$middlepartb->image_heading}}</h4>
                                    <h2>{{$middlepartb->image_text}}</h2>
                                @else
                                    <h4>A TRUSTED FIRM</h4>
                                    <h2>Admirable Looks Guranteed with Years of Gurantee</h2>
                                @endif
                            </div class="text-md-left text-center">
                        </div>
                    </div>
                </div>
                <div class="wpb_column vc_column_container vc_col-sm-6">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div id="modal-trg-txt-wrap-1172" class="ult-modal-input-wrapper ult-adjust-bottom-margin dt-sc-playon-video-modal   " data-keypress-control="keypress-control-enable" data-overlay-control="overlay-control-enable"><img src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites/12/2018/05/video-bg.jpg')}}" alt="null" data-class-id="content-62d6943e09d823-82686140" class="ult-modal-img overlay-show ult-align-center ult-modal-image-"
                                    data-overlay-class="overlay-doorvertical" /></div>
                            <div class="ult-overlay content-62d6943e09d823-82686140 " data-class="content-62d6943e09d823-82686140" id="button-click-overlay" style="background:rgba(232,26,70,0.8); display:none;">
                                <div class="ult_modal ult-fade ult-medium">
                                    <div id="ult-modal-wrap-2833" class="ult_modal-content ult-hide" style="border-style:solid;border-width:2px;border-radius:0px;border-color:#333333;">
                                        <div data-ultimate-target='#ult-modal-wrap-2833 .ult_modal-body' data-responsive-json-new='{"font-size":"","line-height":""}' class="ult_modal-body ult-responsive ult-youtube" style="">
                                            @if($middlepartb)
                                            <iframe loading="lazy" style="border: 0;" data-src="{{$middlepartb->video_link}}" src="{{ url('images/loader.gif')}}" width="560" height="315" allowfullscreen="allowfullscreen"></iframe>
                                            @else
                                            <iframe loading="lazy" style="border: 0;" data-src="//www.youtube.com/embed/DbWCAMA4wgk" src="{{ url('images/loader.gif')}}" width="560" height="315" allowfullscreen="allowfullscreen"></iframe>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="ult-overlay-close top-right" style="width:80px;height:80px; ">
                                    <div class="ult-overlay-close-inside">Close</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wpb_column vc_column_container vc_col-sm-12">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div id="1556965418132-7ce9ad2b-1820" class="dt-sc-empty-space"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="vc_row-full-width vc_clearfix"></div>
            <div class="upb_bg_img" data-ultimate-bg="url({{ url('wp-content/uploads/sites/12/2018/05/home-bg2.jpg')}})" data-image-id="id^14558|url^{{ url('wp-content/uploads/sites/12/2018/05/home-bg2.jpg')}}|caption^null|alt^null|title^home-bg2|description^null"
                            data-ultimate-bg-style="vcpb-vz-jquery" data-bg-img-repeat="repeat" data-bg-img-size="cover" data-bg-img-position="" data-parallx_sense="30" data-bg-override="0" data-bg_img_attach="scroll" data-upb-overlay-color="rgba(29,55,80,0.75)"
                            data-upb-bg-animation="" data-fadeout="" data-bg-animation="left-animation" data-bg-animation-type="h" data-animation-repeat="repeat" data-fadeout-percentage="30" data-parallax-content="" data-parallax-content-sense="30" data-row-effect-mobile-disable="true"
                            data-img-parallax-mobile-disable="true" data-rtl="false" data-custom-vc-row="" data-vc="6.7.0" data-is_old_vc="" data-theme-support="" data-overlay="true" data-overlay-color="rgba(29,55,80,0.75)" data-overlay-pattern="" data-overlay-pattern-opacity="0.8"
                            data-overlay-pattern-size="" data-overlay-pattern-attachment="scroll"></div>
             

          

	        <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid dt-skin-primary-bg vcr_align-half vc_row-no-padding vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
                <div class="dt-sc-dark-bg vcr_team-top wpb_column vc_column_container vc_col-sm-4">
                    <div class="vc_column-inner vc_custom_1529052260195">
                        @if($middlepartc)
                        <div class="wpb_wrapper">
                            <div class='dt-sc-title script-with-sub-title subheading-text'>
                                <h4>{{$middlepartc->small_heading}}</h4>
                                <h2>{{$middlepartc->big_heading}}</h2>
                            </div>
                            <div class="wpb_text_column wpb_content_element  vc_custom_1557233510368">
                                <div class="wpb_wrapper">
                                    <p>{{$middlepartc->text}}</p>

                                </div>
                            </div>
                        </div>
                        @else
                        <div class="wpb_wrapper">
                            <div class='dt-sc-title script-with-sub-title subheading-text'>
                                <h4>FROM THE FINEST</h4>
                                <h2>Our Design Experts</h2>
                            </div>
                            <div class="wpb_text_column wpb_content_element  vc_custom_1557233510368">
                                <div class="wpb_wrapper">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>

                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="wpb_column vc_column_container vc_col-sm-8">
                    <div class="vc_column-inner ">
                        <div class="wpb_wrapper">
                            <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                @if(count($developers) > 0)
                                @foreach ($developers as $dev)
                                <div class="wpb_column vc_column_container vc_col-sm-3">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class='dt-sc-team hide-details-show-on-hover full-height-center'>
                                                <div class='dt-sc-team-thumb'><img width="420" height="466" src="{{ url('images/loader.gif')}}" data-src="/homepage/{{$dev->image_270x300}}" class="attachment-full" alt="" loading="lazy" srcset="/homepage/{{$dev->image_270x300}} 420w,"
                                                        sizes="(max-width: 420px) 100vw, 420px" /></div>
                                                <div class='dt-sc-team-details'>
                                                    <h4>{{$dev->name}}</h4>
                                                    <h5>{{$dev->title}}</h5>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="wpb_column vc_column_container vc_col-sm-3">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class='dt-sc-team hide-details-show-on-hover full-height-center'>
                                                <div class='dt-sc-team-thumb'><img width="420" height="466" src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites/12/2018/05/team1.jpg')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites/12/2018/05/team1.jpg')}} 420w, {{ url('wp-content/uploads/sites/12/2018/05/team1-270x300.jpg')}} 270w"
                                                        sizes="(max-width: 420px) 100vw, 420px" /></div>
                                                <div class='dt-sc-team-details'>
                                                    <h4>Maya Lee</h4>
                                                    <h5>Receptionist</h5>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container vc_col-sm-3">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class='dt-sc-team hide-details-show-on-hover full-height-center'>
                                                <div class='dt-sc-team-thumb'><img width="420" height="466" src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites/12/2018/05/team2.jpg')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites/12/2018/05/team2.jpg')}} 420w, {{ url('wp-content/uploads/sites/12/2018/05/team2-270x300.jpg')}} 270w"
                                                        sizes="(max-width: 420px) 100vw, 420px" /></div>
                                                <div class='dt-sc-team-details'>
                                                    <h4>Darren Tiler</h4>
                                                    <h5>Manager</h5>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container vc_col-sm-3">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class='dt-sc-team hide-details-show-on-hover full-height-center'>
                                                <div class='dt-sc-team-thumb'><img width="420" height="466" src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites/12/2018/05/team3.jpg')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites/12/2018/05/team3.jpg')}} 420w, {{ url('wp-content/uploads/sites/12/2018/05/team3-270x300.jpg')}} 270w"
                                                        sizes="(max-width: 420px) 100vw, 420px" /></div>
                                                <div class='dt-sc-team-details'>
                                                    <h4>Mia Sara</h4>
                                                    <h5>Designer</h5>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container vc_col-sm-3">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class='dt-sc-team hide-details-show-on-hover full-height-center'>
                                                <div class='dt-sc-team-thumb'><img width="420" height="466" src="{{ url('images/loader.gif')}}" data-src="{{ url('wp-content/uploads/sites/12/2018/05/team4.jpg')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites/12/2018/05/team4.jpg')}} 420w, {{ url('wp-content/uploads/sites/12/2018/05/team4-270x300.jpg')}} 270w"
                                                        sizes="(max-width: 420px) 100vw, 420px" /></div>
                                                <div class='dt-sc-team-details'>
                                                    <h4>Sam Jones</h4>
                                                    <h5>CEO</h5>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <div class="vc_row-full-width vc_clearfix"></div>

           <div class="vc_row wpb_row vc_row-fluid">
	        <div class="wpb_column vc_column_container vc_col-sm-12">
	            <div class="vc_column-inner ">
	                <div class="wpb_wrapper">
	                    <div id="1556966008317-5eb73f98-803a" class="dt-sc-empty-space"></div>
	                    <div class='dt-sc-title script-with-sub-title subheading-text aligncenter'>
	                        <h4>WORDS FROM OUR CUSTOMERS</h4>
	                        <h2>Testimonials</h2>
	                    </div>
	                    <div id="1556972365450-1952f6c4-0567" class="dt-sc-empty-space"></div>
	                    <div id="ult-carousel-103892515062d6943e0c18d" class="ult-carousel-wrapper  pdt-img-scroll type2 ult_horizontal" data-gutter="15" data-rtl="false">
	                        <div class="ult-carousel-64958531662d6943e0c17a ">
                                @if (count($reviews) > 0)
                                @foreach ($reviews as $review)
                                 <div class="ult-item-wrap" data-animation="animated no-animation">
                                    <div class="dt-sc-testimonial-wrapper">
                                        <div class='dt-sc-testimonial type2 leftside-quote'>
                                            <div class="dt-sc-testimonial-quote">
                                                <blockquote><q>{{$review->review}}</q></blockquote>
                                            </div>
                                            <div class="dt-sc-testimonial-author"><span><img width="300" height="300" data-src="/homepage/{{$review->profile_300x300}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="/homepage/{{$review->profile_300x300}} 300w" sizes="(max-width: 300px) 100vw, 300px" /></span><cite>{{$review->name}}<small>-{{$review->title}}</small></cite></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
	                            <div class="ult-item-wrap" data-animation="animated no-animation">
	                                <div class="dt-sc-testimonial-wrapper">
	                                    <div class='dt-sc-testimonial type2 leftside-quote'>
	                                        <div class="dt-sc-testimonial-quote">
	                                            <blockquote><q>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at.Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</q></blockquote>
	                                        </div>
	                                        <div class="dt-sc-testimonial-author"><span><img width="300" height="300" data-src="{{ url('wp-content/uploads/sites/12/2018/05/testimonial8.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites/12/2018/05/testimonial8.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/testimonial8-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/testimonial8-100x100.jpg')}} 100w" sizes="(max-width: 300px) 100vw, 300px" /></span><cite>Miranda Kerr<small>-Senior Designer</small></cite></div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="ult-item-wrap" data-animation="animated no-animation">
	                                <div class="dt-sc-testimonial-wrapper">
	                                    <div class='dt-sc-testimonial type2 leftside-quote'>
	                                        <div class="dt-sc-testimonial-quote">
	                                            <blockquote><q>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at.Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</q></blockquote>
	                                        </div>
	                                        <div class="dt-sc-testimonial-author"><span><img width="300" height="300" data-src="{{ url('wp-content/uploads/sites/12/2018/05/testimonial4.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites/12/2018/05/testimonial4.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/testimonial4-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/testimonial4-100x100.jpg')}} 100w" sizes="(max-width: 300px) 100vw, 300px" /></span><cite>Allen Spicer<small>-Senior Designer</small></cite></div>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="ult-item-wrap" data-animation="animated no-animation">
	                                <div class="dt-sc-testimonial-wrapper">
	                                    <div class='dt-sc-testimonial type2 leftside-quote'>
	                                        <div class="dt-sc-testimonial-quote">
	                                            <blockquote><q>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at.Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</q></blockquote>
	                                        </div>
	                                        <div class="dt-sc-testimonial-author"><span><img width="300" height="300" data-src="{{ url('wp-content/uploads/sites/12/2018/05/testimonial7.jpg')}}" src="{{ url('images/loader.gif')}}" class="attachment-full" alt="" loading="lazy" srcset="{{ url('wp-content/uploads/sites/12/2018/05/testimonial7.jpg')}} 300w, {{ url('wp-content/uploads/sites/12/2018/05/testimonial7-150x150.jpg')}} 150w, {{ url('wp-content/uploads/sites/12/2018/05/testimonial7-100x100.jpg')}} 100w" sizes="(max-width: 300px) 100vw, 300px" /></span><cite>Mia Sara<small>-Senior Designer</small></cite></div>
	                                    </div>
	                                </div>
	                            </div>
                                @endif
	                        </div>
	                    </div>
	                    <script type="text/javascript">
	                        jQuery(document).ready(function($) {
	                            if (typeof jQuery('.ult-carousel-64958531662d6943e0c17a').slick == "function") {
	                                $('.ult-carousel-64958531662d6943e0c17a').slick({
	                                    dots: true,
	                                    autoplay: true,
	                                    autoplaySpeed: 5000,
	                                    speed: 300,
	                                    infinite: true,
	                                    arrows: false,
	                                    slidesToScroll: 2,
	                                    slidesToShow: 2,
	                                    swipe: true,
	                                    draggable: true,
	                                    touchMove: true,
	                                    pauseOnHover: true,
	                                    pauseOnFocus: false,
	                                    responsive: [{
	                                            breakpoint: 1026,
	                                            settings: {
	                                                slidesToShow: 2,
	                                                slidesToScroll: 2,
	                                            }
	                                        },
	                                        {
	                                            breakpoint: 1025,
	                                            settings: {
	                                                slidesToShow: 2,
	                                                slidesToScroll: 2
	                                            }
	                                        },
	                                        {
	                                            breakpoint: 760,
	                                            settings: {
	                                                slidesToShow: 1,
	                                                slidesToScroll: 1
	                                            }
	                                        }
	                                    ],
	                                    pauseOnDotsHover: true,
	                                    customPaging: function(slider, i) {
	                                        return '<i type="button" style= "color:#e5e5e5;" class="ultsl-record" data-role="none"></i>';
	                                    },
	                                });
	                            }
	                        });
	                    </script>
	                    <div class='dt-sc-clear '> </div>
	                    <div id="1556966066152-44bff6c0-81da" class="dt-sc-empty-space"></div>
	                </div>
	            </div>
	        </div>
	    </div>
        <div class="vc_row-full-width vc_clearfix"></div>
	</section>
</div>
@endsection