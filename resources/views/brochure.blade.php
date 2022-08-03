@extends('base')
@section('title') Brochure @endsection
@section('header')
<!-- ** Breadcrumb ** -->
<section class="main-title-section-wrapper breadcrumb-left">
    <div class="main-title-section-bg"
        style="background-image: url('{{ url('wp-content/uploads/sites/12/2018/05/bc-img.jpg')}}'); background-position: left top; background-size: auto; background-repeat: no-repeat; background-attachment: fixed; ">
    </div>
    <div class="container">
        <div class="main-title-section">
            <h1>Brochure</h1>
        </div>
        <div class="breadcrumb">
            <a href="{{ url('/')}}">Home</a>
            <span class="fa default"></span>
            <span class="current">Brochure</span>
        </div>
    </div>
</section>
<!-- ** Breadcrumb End ** -->
@endsection
@section('content')
<!-- ** Container ** -->
<div class="container">
    <!-- Primary -->
  	<section id="primary" class="content-full-width">	<!-- #post-15413 -->
		<div id="post-15413" class="post-15413 page type-page status-publish hentry">
			<div class="vc_row wpb_row vc_row-fluid">
				<div class="wpb_column vc_column_container vc_col-sm-12">
					<div class="vc_column-inner ">
						<div class="wpb_wrapper">
							<div class="wpb_text_column wpb_content_element " >
								<div class="wpb_wrapper" style="text-align:center">
								@if($brochure)
								<a href='/brochure/{{$brochure->pdf}}' target='_self' title='{$brochure->title}}' class='dt-sc-button   medium   bordered  margin-right'> open pdf </a>
								<a href='/brochure/{{$brochure->pdf}}' target='_self' title='{$brochure->title}}' class='dt-sc-button   medium   bordered  margin-right' download=""> download pdf </a>
								@else
								<p>No pdf file to view</p>
								@endif
								</div>
							</div>
							<div id="1557898461839-27bb0dd9-031a" class="dt-sc-empty-space"></div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- #post-15413 -->
    </section><!-- Primary End -->    
</div>
<!-- ** Container End ** -->
@endsection