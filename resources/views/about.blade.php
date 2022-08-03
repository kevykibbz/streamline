@extends('base')
@section('title') About us @endsection
@section('header')
<!-- ** Breadcrumb ** -->
<section class="main-title-section-wrapper breadcrumb-left">
    <div class="main-title-section-bg"
        style="background-image: url('{{ url('wp-content/uploads/sites/12/2018/05/bc-img.jpg')}}'); background-position: left top; background-size: auto; background-repeat: no-repeat; background-attachment: fixed; ">
    </div>
    <div class="container">
        <div class="main-title-section">
            <h1>About Us</h1>
        </div>
        <div class="breadcrumb">
            <a href="{{ url('/')}}">Home</a>
            <span class="fa default"></span>
            <span class="current">About Us</span>
        </div>
    </div>
</section>
<!-- ** Breadcrumb End ** -->
@endsection
@section('content')
<div class="container">
   	<!-- Primary -->
  	<section id="primary" class="content-full-width">
		<div id="post-14600" class="post-14600 page type-page status-publish hentry">
			<div data-vc-full-width="true" data-vc-full-width-init="false"
				class="vc_row wpb_row vc_row-fluid dt-sc-dark-bg vcr_full-tab vc_row-o-equal-height vc_row-flex">
				@if ($memory)
				<div class="wpb_column vc_column_container vc_col-sm-6">
					<div class="vc_column-inner ">
						<div class="wpb_wrapper">
							<div id="1527932304085-178f6931-7e19" class="dt-sc-empty-space"></div>
							<div class='dt-sc-title script-with-sub-title subheading-text'>
								<h4 style="text-transform:uppercase;">{{$memory->small_heading}}</h4>
								<h2 style="text-transform:capitalize;">{{$memory->big_heading}}</h2>
							</div>
							<div
								class="vc_icon_element vc_icon_element-outer vc_custom_1527586641787 vc_icon_element-align-left">
								<div
									class="vc_icon_element-inner vc_icon_element-color-white vc_icon_element-size-lg vc_icon_element-style- vc_icon_element-background-color-grey">
									<span class="vc_icon_element-icon fa fa-quote-left"></span></div>
							</div>
							<h4 style="line-height: 1.6;text-align: left" class="vc_custom_heading"><i>{{$memory->text}}</i></h4>
							<div class="wpb_single_image wpb_content_element vc_align_left">

								<figure class="wpb_wrapper vc_figure">
									<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="175" height="51"
											src="/aboutpage/{{$memory->image_175x51}}"
											class="vc_single_image-img attachment-full" alt="" loading="lazy" /></div>
								</figure>
							</div>
						</div>
					</div>
				</div>
				<div class="wpb_column vc_column_container vc_col-sm-6">
					<div class="vc_column-inner ">
						<div class="wpb_wrapper">
							<div id="1527932291658-a4b80c06-5a59" class="dt-sc-empty-space"></div>
							<div
								class="wpb_single_image wpb_content_element vc_align_center  vc_custom_1529054346471  vcr_tab-img-bottom">

								<figure class="wpb_wrapper vc_figure">
									<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="494" height="702"
											src="/aboutpage/{{$memory->image_494x702}}"
											class="vc_single_image-img attachment-full" alt="" loading="lazy"
											srcset="/aboutpage/{{$memory->image_494x702}} 494w"
											sizes="(max-width: 494px) 100vw, 494px" /></div>
								</figure>
							</div>
						</div>
					</div>
				</div>
				@else
				<div class="wpb_column vc_column_container vc_col-sm-6">
					<div class="vc_column-inner ">
						<div class="wpb_wrapper">
							<div id="1527932304085-178f6931-7e19" class="dt-sc-empty-space"></div>
							<div class='dt-sc-title script-with-sub-title subheading-text'>
								<h4>WE CREATE MEMORIES</h4>
								<h2>We take pride in our works. Making your Bathroom a Luxury Place</h2>
							</div>
							<div
								class="vc_icon_element vc_icon_element-outer vc_custom_1527586641787 vc_icon_element-align-left">
								<div
									class="vc_icon_element-inner vc_icon_element-color-white vc_icon_element-size-lg vc_icon_element-style- vc_icon_element-background-color-grey">
									<span class="vc_icon_element-icon fa fa-quote-left"></span></div>
							</div>
							<h4 style="line-height: 1.6;text-align: left" class="vc_custom_heading"><i>Donec lacinia eu tortor
									iaculis euismod. Proin varius metus et efficitur porta. Integer dui lacus, interdum in
									interdum eu, placerat non turpis. Orci varius natoque penatibus et magnis dis parturient
									montes, nascetur ridiculus mus.</i></h4>
							<div class="wpb_single_image wpb_content_element vc_align_left">

								<figure class="wpb_wrapper vc_figure">
									<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="175" height="51"
											src="{{ url('wp-content/uploads/sites/12/2018/05/sign.png')}}"
											class="vc_single_image-img attachment-full" alt="" loading="lazy" /></div>
								</figure>
							</div>
						</div>
					</div>
				</div>
				<div class="wpb_column vc_column_container vc_col-sm-6">
					<div class="vc_column-inner ">
						<div class="wpb_wrapper">
							<div id="1527932291658-a4b80c06-5a59" class="dt-sc-empty-space"></div>
							<div
								class="wpb_single_image wpb_content_element vc_align_center  vc_custom_1529054346471  vcr_tab-img-bottom">

								<figure class="wpb_wrapper vc_figure">
									<div class="vc_single_image-wrapper   vc_box_border_grey"><img width="494" height="702"
											src="{{ url('wp-content/uploads/sites/12/2018/05/team02.png')}}"
											class="vc_single_image-img attachment-full" alt="" loading="lazy"
											srcset="{{ url('wp-content/uploads/sites/12/2018/05/team02.png')}} 494w, {{ url('wp-content/uploads/sites/12/2018/05/team02-211x300.png')}} 211w"
											sizes="(max-width: 494px) 100vw, 494px" /></div>
								</figure>
							</div>
						</div>
					</div>
				</div>
				@endif
			</div>
			<div class="vc_row-full-width vc_clearfix"></div><!-- Row Backgrounds -->
			<div class="upb_bg_img"
				data-ultimate-bg="url({{ url('wp-content/uploads/sites/12/2018/05/banner-bg4.jpg')}})"
				data-image-id="id^14844|url^{{ url('wp-content/uploads/sites/12/2018/05/banner-bg4.jpg')}}|caption^null|alt^null|title^banner-bg4|description^null"
				data-ultimate-bg-style="vcpb-default" data-bg-img-repeat="repeat" data-bg-img-size="cover"
				data-bg-img-position="top left" data-parallx_sense="30" data-bg-override="0" data-bg_img_attach="fixed"
				data-upb-overlay-color="rgba(29,55,80,0.8)" data-upb-bg-animation="" data-fadeout=""
				data-bg-animation="left-animation" data-bg-animation-type="h" data-animation-repeat="repeat"
				data-fadeout-percentage="30" data-parallax-content="" data-parallax-content-sense="30"
				data-row-effect-mobile-disable="true" data-img-parallax-mobile-disable="true" data-rtl="false"
				data-custom-vc-row="" data-vc="6.7.0" data-is_old_vc="" data-theme-support="" data-overlay="true"
				data-overlay-color="rgba(29,55,80,0.8)" data-overlay-pattern="" data-overlay-pattern-opacity="0.8"
				data-overlay-pattern-size="" data-overlay-pattern-attachment="scroll"></div>
			<div class="vc_row wpb_row vc_row-fluid vc_custom_1556972181061">
				<div class="wpb_column vc_column_container vc_col-sm-12">
					<div class="vc_column-inner " style=" text-align:left; ">
						<div class="wpb_wrapper">
							<div id="1556972185954-f591c171-4a76" class="dt-sc-empty-space"></div>
							<div class='dt-sc-title script-with-sub-title subheading-text'>
								<h4>MOST LOVED</h4>
								<h2>Our Featured Products</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div
				class="vc_row wpb_row vc_row-fluid vc_custom_1556972216613 vc_row-o-equal-height vc_row-o-content-middle vc_row-flex">
				<div class="wpb_column vc_column_container vc_col-sm-12">
					<div class="vc_column-inner " style=" text-align:left; ">
						<div class="wpb_wrapper">
							<div id="ult-carousel-359500837062da910e42c9b"
								class="ult-carousel-wrapper  pdt-img-scroll ult_horizontal" data-gutter="15" data-rtl="false">
								<div class="ult-carousel-196828047362da910e42c86 ">
									@if(count($featured) > 0)
									@foreach($featured as $feature)
									<div class="ult-item-wrap" data-animation="animated no-animation">
										<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1527929374013">
											<div class="ult-item-wrap" data-animation="animated no-animation">
												<div class="wpb_column vc_column_container vc_col-sm-12 vc_col-has-fill"
													style=" text-align:center; ">
													<div class="vc_column-inner vc_custom_1527929268414">
														<div class="wpb_wrapper">
															<div class="ult-item-wrap" data-animation="animated no-animation">
																<div
																	class="wpb_single_image wpb_content_element vc_align_left   img-carousel">
																	<h2 class="wpb_heading wpb_singleimage_heading">{{$feature->title}}</h2>
																	<figure class="wpb_wrapper vc_figure">
																		<div
																			class="vc_single_image-wrapper   vc_box_border_grey">
																			<img width="480" height="430"
																				src="/aboutpage/{{$feature->image_480x430}}"
																				class="vc_single_image-img attachment-full"
																				alt="" loading="lazy"
																				srcset="/aboutpage/{{$feature->image_480x430}} 480w"
																				sizes="(max-width: 480px) 100vw, 480px" /></div>
																	</figure>
																</div>
															</div>
															<div class="ult-item-wrap" data-animation="animated no-animation">
																<div class="ult-content-box-container ">
																	<div class="ult-content-box"
																		style="box-shadow: px px px px none;padding-top:50px;padding-right:20px;padding-bottom:0px;padding-left:20px;-webkit-transition: all 700ms ease;-moz-transition: all 700ms ease;-ms-transition: all 700ms ease;-o-transition: all 700ms ease;transition: all 700ms ease;"
																		data-hover_box_shadow="none">
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<h3>{{$feature->heading}}</h3>
																		</div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<div class="wpb_text_column wpb_content_element ">
																				<div class="wpb_wrapper">
																					<p>{{$feature->text}}</p>

																				</div>
																			</div>
																		</div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<div class="ult-spacer spacer-62da910e44917"
																				data-id="62da910e44917" data-height="20"
																				data-height-mobile="" data-height-tab="20"
																				data-height-tab-portrait="20"
																				data-height-mobile-landscape="20"
																				style="clear:both;display:block;"></div>
																		</div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation"></div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<div class="ult-spacer spacer-62da910e44941"
																				data-id="62da910e44941" data-height="40"
																				data-height-mobile="40" data-height-tab="40"
																				data-height-tab-portrait="40"
																				data-height-mobile-landscape="40"
																				style="clear:both;display:block;"></div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endforeach
									@else
									<div class="ult-item-wrap" data-animation="animated no-animation">
										<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1527929352451">
											<div class="ult-item-wrap" data-animation="animated no-animation">
												<div class="wpb_column vc_column_container vc_col-sm-12 vc_col-has-fill"
													style=" text-align:center; ">
													<div class="vc_column-inner vc_custom_1527929097950">
														<div class="wpb_wrapper">
															<div class="ult-item-wrap" data-animation="animated no-animation">
																<div
																	class="wpb_single_image wpb_content_element vc_align_left   img-carousel">
																	<h2 class="wpb_heading wpb_singleimage_heading">Teak Delight
																	</h2>
																	<figure class="wpb_wrapper vc_figure">
																		<div
																			class="vc_single_image-wrapper   vc_box_border_grey">
																			<img width="480" height="430"
																				src="{{ url('wp-content/uploads/sites/12/2018/05/about-img1.jpg')}}"
																				class="vc_single_image-img attachment-full"
																				alt="" loading="lazy"
																				srcset="{{ url('wp-content/uploads/sites/12/2018/05/about-img1.jpg')}} 480w, {{ url('wp-content/uploads/sites/12/2018/05/about-img1-300x269.jpg')}} 300w"
																				sizes="(max-width: 480px) 100vw, 480px" /></div>
																	</figure>
																</div>
															</div>
															<div class="ult-item-wrap" data-animation="animated no-animation">
																<div class="ult-content-box-container ">
																	<div class="ult-content-box"
																		style="box-shadow: px px px px none;padding-top:50px;padding-right:20px;padding-bottom:0px;padding-left:20px;-webkit-transition: all 700ms ease;-moz-transition: all 700ms ease;-ms-transition: all 700ms ease;-o-transition: all 700ms ease;transition: all 700ms ease;"
																		data-hover_box_shadow="none">
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<h3>Bathroom Furnitures</h3>
																		</div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<div class="wpb_text_column wpb_content_element ">
																				<div class="wpb_wrapper">
																					<p>There are many variations of passages of
																						Lorem Ipsum available,There are many
																						variations of passages</p>

																				</div>
																			</div>
																		</div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<div class="ult-spacer spacer-62da910e43508"
																				data-id="62da910e43508" data-height="20"
																				data-height-mobile="" data-height-tab="20"
																				data-height-tab-portrait="20"
																				data-height-mobile-landscape="20"
																				style="clear:both;display:block;"></div>
																		</div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation"></div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<div class="ult-spacer spacer-62da910e43538"
																				data-id="62da910e43538" data-height="40"
																				data-height-mobile="40" data-height-tab="40"
																				data-height-tab-portrait="40"
																				data-height-mobile-landscape="40"
																				style="clear:both;display:block;"></div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="ult-item-wrap" data-animation="animated no-animation">
										<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1527929360574">
											<div class="ult-item-wrap" data-animation="animated no-animation">
												<div class="wpb_column vc_column_container vc_col-sm-12 vc_col-has-fill"
													style=" text-align:center; ">
													<div class="vc_column-inner vc_custom_1527929097950">
														<div class="wpb_wrapper">
															<div class="ult-item-wrap" data-animation="animated no-animation">
																<div
																	class="wpb_single_image wpb_content_element vc_align_left   img-carousel">
																	<h2 class="wpb_heading wpb_singleimage_heading">Bath Tubs XR
																	</h2>
																	<figure class="wpb_wrapper vc_figure">
																		<div
																			class="vc_single_image-wrapper   vc_box_border_grey">
																			<img width="480" height="430"
																				src="{{ url('wp-content/uploads/sites/12/2018/05/about-img2.jpg')}}"
																				class="vc_single_image-img attachment-full"
																				alt="" loading="lazy"
																				srcset="{{ url('wp-content/uploads/sites/12/2018/05/about-img2.jpg')}} 480w, {{ url('wp-content/uploads/sites/12/2018/05/about-img2-300x269.jpg')}} 300w"
																				sizes="(max-width: 480px) 100vw, 480px" /></div>
																	</figure>
																</div>
															</div>
															<div class="ult-item-wrap" data-animation="animated no-animation">
																<div class="ult-content-box-container ">
																	<div class="ult-content-box"
																		style="box-shadow: px px px px none;padding-top:50px;padding-right:20px;padding-bottom:0px;padding-left:20px;-webkit-transition: all 700ms ease;-moz-transition: all 700ms ease;-ms-transition: all 700ms ease;-o-transition: all 700ms ease;transition: all 700ms ease;"
																		data-hover_box_shadow="none">
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<h3>Designer Bath Tub</h3>
																		</div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<div class="wpb_text_column wpb_content_element ">
																				<div class="wpb_wrapper">
																					<p>There are many variations of passages of
																						Lorem Ipsum available,There are many
																						variations of passages</p>

																				</div>
																			</div>
																		</div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<div class="ult-spacer spacer-62da910e43b8e"
																				data-id="62da910e43b8e" data-height="20"
																				data-height-mobile="" data-height-tab="20"
																				data-height-tab-portrait="20"
																				data-height-mobile-landscape="20"
																				style="clear:both;display:block;"></div>
																		</div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation"></div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<div class="ult-spacer spacer-62da910e43bb8"
																				data-id="62da910e43bb8" data-height="40"
																				data-height-mobile="40" data-height-tab="40"
																				data-height-tab-portrait="40"
																				data-height-mobile-landscape="40"
																				style="clear:both;display:block;"></div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="ult-item-wrap" data-animation="animated no-animation">
										<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1527929367273">
											<div class="ult-item-wrap" data-animation="animated no-animation">
												<div class="wpb_column vc_column_container vc_col-sm-12 vc_col-has-fill"
													style=" text-align:center; ">
													<div class="vc_column-inner vc_custom_1527929175893">
														<div class="wpb_wrapper">
															<div class="ult-item-wrap" data-animation="animated no-animation">
																<div
																	class="wpb_single_image wpb_content_element vc_align_left   img-carousel">
																	<h2 class="wpb_heading wpb_singleimage_heading">Jass Special
																	</h2>
																	<figure class="wpb_wrapper vc_figure">
																		<div
																			class="vc_single_image-wrapper   vc_box_border_grey">
																			<img width="480" height="430"
																				src="{{ url('wp-content/uploads/sites/12/2018/05/about-img3.jpg')}}"
																				class="vc_single_image-img attachment-full"
																				alt="" loading="lazy"
																				srcset="{{ url('wp-content/uploads/sites/12/2018/05/about-img3.jpg')}} 480w, {{ url('wp-content/uploads/sites/12/2018/05/about-img3-300x269.jpg')}} 300w"
																				sizes="(max-width: 480px) 100vw, 480px" /></div>
																	</figure>
																</div>
															</div>
															<div class="ult-item-wrap" data-animation="animated no-animation">
																<div class="ult-content-box-container ">
																	<div class="ult-content-box"
																		style="box-shadow: px px px px none;padding-top:50px;padding-right:20px;padding-bottom:0px;padding-left:20px;-webkit-transition: all 700ms ease;-moz-transition: all 700ms ease;-ms-transition: all 700ms ease;-o-transition: all 700ms ease;transition: all 700ms ease;"
																		data-hover_box_shadow="none">
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<h3>Luxury Bathtubs</h3>
																		</div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<div class="wpb_text_column wpb_content_element ">
																				<div class="wpb_wrapper">
																					<p>There are many variations of passages of
																						Lorem Ipsum available,There are many
																						variations of passages</p>

																				</div>
																			</div>
																		</div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<div class="ult-spacer spacer-62da910e44219"
																				data-id="62da910e44219" data-height="20"
																				data-height-mobile="" data-height-tab="20"
																				data-height-tab-portrait="20"
																				data-height-mobile-landscape="20"
																				style="clear:both;display:block;"></div>
																		</div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation"></div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<div class="ult-spacer spacer-62da910e44242"
																				data-id="62da910e44242" data-height="40"
																				data-height-mobile="40" data-height-tab="40"
																				data-height-tab-portrait="40"
																				data-height-mobile-landscape="40"
																				style="clear:both;display:block;"></div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="ult-item-wrap" data-animation="animated no-animation">
										<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1527929374013">
											<div class="ult-item-wrap" data-animation="animated no-animation">
												<div class="wpb_column vc_column_container vc_col-sm-12 vc_col-has-fill"
													style=" text-align:center; ">
													<div class="vc_column-inner vc_custom_1527929268414">
														<div class="wpb_wrapper">
															<div class="ult-item-wrap" data-animation="animated no-animation">
																<div
																	class="wpb_single_image wpb_content_element vc_align_left   img-carousel">
																	<h2 class="wpb_heading wpb_singleimage_heading">Tap Fitting
																		SR</h2>
																	<figure class="wpb_wrapper vc_figure">
																		<div
																			class="vc_single_image-wrapper   vc_box_border_grey">
																			<img width="480" height="430"
																				src="{{ url('wp-content/uploads/sites/12/2018/05/about-img4.jpg')}}"
																				class="vc_single_image-img attachment-full"
																				alt="" loading="lazy"
																				srcset="{{ url('wp-content/uploads/sites/12/2018/05/about-img4.jpg')}} 480w, {{ url('wp-content/uploads/sites/12/2018/05/about-img4-300x269.jpg')}} 300w"
																				sizes="(max-width: 480px) 100vw, 480px" /></div>
																	</figure>
																</div>
															</div>
															<div class="ult-item-wrap" data-animation="animated no-animation">
																<div class="ult-content-box-container ">
																	<div class="ult-content-box"
																		style="box-shadow: px px px px none;padding-top:50px;padding-right:20px;padding-bottom:0px;padding-left:20px;-webkit-transition: all 700ms ease;-moz-transition: all 700ms ease;-ms-transition: all 700ms ease;-o-transition: all 700ms ease;transition: all 700ms ease;"
																		data-hover_box_shadow="none">
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<h3>Bathroom Taps</h3>
																		</div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<div class="wpb_text_column wpb_content_element ">
																				<div class="wpb_wrapper">
																					<p>There are many variations of passages of
																						Lorem Ipsum available,There are many
																						variations of passages</p>

																				</div>
																			</div>
																		</div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<div class="ult-spacer spacer-62da910e44917"
																				data-id="62da910e44917" data-height="20"
																				data-height-mobile="" data-height-tab="20"
																				data-height-tab-portrait="20"
																				data-height-mobile-landscape="20"
																				style="clear:both;display:block;"></div>
																		</div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation"></div>
																		<div class="ult-item-wrap"
																			data-animation="animated no-animation">
																			<div class="ult-spacer spacer-62da910e44941"
																				data-id="62da910e44941" data-height="40"
																				data-height-mobile="40" data-height-tab="40"
																				data-height-tab-portrait="40"
																				data-height-mobile-landscape="40"
																				style="clear:both;display:block;"></div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
								</div>
							</div>
							<script type="text/javascript">
							jQuery(document).ready(function($) {
								if (typeof jQuery('.ult-carousel-196828047362da910e42c86').slick == "function") {
									$('.ult-carousel-196828047362da910e42c86').slick({
										dots: false,
										autoplay: true,
										autoplaySpeed: 5000,
										speed: 300,
										infinite: true,
										arrows: false,
										slidesToScroll: 3,
										slidesToShow: 3,
										swipe: true,
										draggable: true,
										touchMove: true,
										pauseOnHover: true,
										pauseOnFocus: false,
										responsive: [{
												breakpoint: 1026,
												settings: {
													slidesToShow: 3,
													slidesToScroll: 3,
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
											return '<i type="button" style= "color:#333333;" class="ultsl-record" data-role="none"></i>';
										},
									});
								}
							});
							</script>
							<div id="1556972223901-72734f42-3503" class="dt-sc-empty-space"></div>
						</div>
					</div>
				</div>
			</div>

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

			<div data-vc-full-width="true" data-vc-full-width-init="false"
				class="vc_row wpb_row vc_row-fluid dt-sc-dark-bg dt-skin-secondary-bg vc_custom_1527226045945">
				<div class="wpb_column vc_column_container vc_col-sm-3">
					<div class="vc_column-inner ">
						<div class="wpb_wrapper">
							<div class='dt-sc-counter type1  aligncenter'>
								<div class='dt-sc-couter-icon-holder'>
									<div class='icon-wrapper'><span>
										<img width="55" height="54"
												src="{{ url('wp-content/uploads/sites/12/2018/05/counter1.png')}}"
												class="attachment-full" alt="" loading="lazy" /></span></div>
									<div class='dt-sc-counter-number' data-value='1273' data-append='+'>1273</div>
								</div>
								<h4>Happy Clients</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="wpb_column vc_column_container vc_col-sm-3">
					<div class="vc_column-inner ">
						<div class="wpb_wrapper">
							<div class='dt-sc-counter type1  aligncenter'>
								<div class='dt-sc-couter-icon-holder'>
									<div class='icon-wrapper'><span><img width="55" height="54"
												src="{{ url('wp-content/uploads/sites/12/2018/05/counter2.png')}}"
												class="attachment-full" alt="" loading="lazy" /></span></div>
									<div class='dt-sc-counter-number' data-value='1500' data-append='+'>1500</div>
								</div>
								<h4>Product Designs</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="wpb_column vc_column_container vc_col-sm-3">
					<div class="vc_column-inner ">
						<div class="wpb_wrapper">
							<div class='dt-sc-counter type1  aligncenter'>
								<div class='dt-sc-couter-icon-holder'>
									<div class='icon-wrapper'><span><img width="55" height="54"
												src="{{ url('wp-content/uploads/sites/12/2018/05/counter3.png')}}"
												class="attachment-full" alt="" loading="lazy" /></span></div>
									<div class='dt-sc-counter-number' data-value='18000' data-append='+'>18000</div>
								</div>
								<h4>Products Sold</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="wpb_column vc_column_container vc_col-sm-3">
					<div class="vc_column-inner ">
						<div class="wpb_wrapper">
							<div class='dt-sc-counter type1  aligncenter'>
								<div class='dt-sc-couter-icon-holder'>
									<div class='icon-wrapper'><span><img width="55" height="54"
												src="{{ url('wp-content/uploads/sites/12/2018/05/counter4.png')}}"
												class="attachment-full" alt="" loading="lazy" /></span></div>
									<div class='dt-sc-counter-number' data-value='2511' data-append='+'>2511</div>
								</div>
								<h4>Home Fittings</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="vc_row-full-width vc_clearfix"></div>
			<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid">
				<div class="aligncenter wpb_column vc_column_container vc_col-sm-12">
					<div class="vc_column-inner ">
						<div class="wpb_wrapper">
							<div id="1556973123546-246d213b-502a" class="dt-sc-empty-space"></div>
							<h2 style="font-size: 45px;text-align: center" class="vc_custom_heading">Luxury ranges that add a
								new look to the bathroom with a style</h2><a href='/contact' target='_self' title=''
								class='dt-sc-button   medium   bordered  margin-right'> Get in Touch </a><a href='/site/products'
								target='_self' title='' class='dt-sc-button   medium   filled  '> Products </a>
							<div id="1556973145467-a260e2d7-6084" class="dt-sc-empty-space"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="vc_row-full-width vc_clearfix"></div>
			<div data-vc-full-width="true" data-vc-full-width-init="false"
				class="vc_row wpb_row vc_row-fluid dt-skin-secondary-bg dt-sc-dark-bg vcr_hook-top wpb_animate_when_almost_visible wpb_slideInUp slideInUp vc_row-o-equal-height vc_row-flex">
				<div class="dt-sc-skin-highlight wpb_column vc_column_container vc_col-sm-3 vc_col-has-fill">
					<div class="vc_column-inner vc_custom_1528897333917" style=" text-align:left; ">
						<div class="wpb_wrapper"><img width="199" height="49"
								src="{{ url('wp-content/uploads/sites/12/2018/05/light-logo.png')}}"
								class="aligncenter attachment-full" alt="" loading="lazy" /></div>
					</div>
				</div>
				<div class="wpb_column vc_column_container vc_col-sm-9">
					<div class="vc_column-inner ">
						<div class="wpb_wrapper">
							<div id="1527930910130-639a1e9b-b96c" class="dt-sc-empty-space"></div>
							<div id="ult-carousel-22098267462da910e480c0" class="ult-carousel-wrapper   ult_horizontal"
								data-gutter="15" data-rtl="false">
								<div class="ult-carousel-270880069462da910e480ae ">
									<div class="ult-item-wrap" data-animation="animated no-animation"><img width="188"
											height="89"
											src="{{ url('wp-content/uploads/sites/12/2018/05/client01.png')}}"
											class="alignnone attachment-full" alt="" loading="lazy" /></div>
									<div class="ult-item-wrap" data-animation="animated no-animation"><img width="188"
											height="89"
											src="{{ url('wp-content/uploads/sites/12/2018/05/client02.png')}}"
											class="alignnone attachment-full" alt="" loading="lazy" /></div>
									<div class="ult-item-wrap" data-animation="animated no-animation"><img width="188"
											height="89"
											src="{{ url('wp-content/uploads/sites/12/2018/05/client03.png')}}"
											class="alignnone attachment-full" alt="" loading="lazy" /></div>
									<div class="ult-item-wrap" data-animation="animated no-animation"><img width="188"
											height="89"
											src="{{ url('wp-content/uploads/sites/12/2018/05/client04.png')}}"
											class="alignnone attachment-full" alt="" loading="lazy" /></div>
									<div class="ult-item-wrap" data-animation="animated no-animation"><img width="188"
											height="89"
											src="{{ url('wp-content/uploads/sites/12/2018/05/client01.png')}}"
											class="alignnone attachment-full" alt="" loading="lazy" /></div>
									<div class="ult-item-wrap" data-animation="animated no-animation"><img width="188"
											height="89"
											src="{{ url('wp-content/uploads/sites/12/2018/05/client02.png')}}"
											class="alignnone attachment-full" alt="" loading="lazy" /></div>
								</div>
							</div>
							<script type="text/javascript">
							jQuery(document).ready(function($) {
								if (typeof jQuery('.ult-carousel-270880069462da910e480ae').slick == "function") {
									$('.ult-carousel-270880069462da910e480ae').slick({
										dots: false,
										autoplay: true,
										autoplaySpeed: 5000,
										speed: 300,
										infinite: true,
										arrows: false,
										slidesToScroll: 3,
										slidesToShow: 3,
										swipe: true,
										draggable: true,
										touchMove: true,
										pauseOnHover: true,
										pauseOnFocus: false,
										responsive: [{
												breakpoint: 1026,
												settings: {
													slidesToShow: 3,
													slidesToScroll: 3,
												}
											},
											{
												breakpoint: 1025,
												settings: {
													slidesToShow: 3,
													slidesToScroll: 3
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
											return '<i type="button" style= "color:#333333;" class="ultsl-record" data-role="none"></i>';
										},
									});
								}
							});
							</script>
							<div id="1527930976812-fa7a6d28-432a" class="dt-sc-empty-space"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="vc_row-full-width vc_clearfix"></div>
		</div><!-- #post-14600 -->
	</section>
</div>
@endsection