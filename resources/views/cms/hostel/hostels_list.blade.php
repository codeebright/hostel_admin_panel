<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>admin | hostel list </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <link href="{{asset('assets/vendors/base/vendors.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/demo/demo11/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />

    <!--end::Web font -->

    <!--begin::Global Theme Styles -->
{{--<link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />--}}

<!--RTL version:<link href="../../../assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
{{--<link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />--}}

<!--RTL version:<link href="../../../assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="/assets/demo/default/media/img/logo/favicon.ico" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="row  justify-content-center">
  <div class="col-xl-8">

	  <!--begin:: Widgets/Best Sellers-->
	  <div class="m-portlet m-portlet--full-height ">
		  <div class="m-portlet__head">
			  <div class="m-portlet__head-caption">
				  <div class="m-portlet__head-title">
					  <h3 class="m-portlet__head-text">
						  لیست لیلیه های شما
					  </h3>
				  </div>
			  </div>
			  <div class="m-portlet__head-caption">
				  <div class="m-portlet__head-title">
					  <a href="{{route('hostel.create')}}">
						  <h3 class="m-portlet__head-text">
							  ساختن لیلیه جدید
						  </h3>
					  </a>
				  </div>
			  </div>
		  </div>
		  @foreach( $hostels as $hostel)
			  {{--temporary rotue it should be  auth route--}}
			  <a href="{{route('hostel.show',$hostel->id)}}">
				  <div class="m-portlet__body">
					  <!--begin::Content-->
					  <div class="tab-content">
						  <div class="tab-pane active" aria-expanded="true">
							  <!--begin::m-widget5-->
							  <div class="m-widget5">
								  <div class="m-widget5__item">
									  <div class="m-widget5__content">
										  <div class="m-widget5__pic">
											  <img class="m-widget7__img" src="assets/app/media/img//products/product6.jpg"
												   alt=" عکس لیلیه">
										  </div>
										  <div class="m-widget5__section">
											  <h4 class="m-widget5__title">
												  {{$hostel->name}}
											  </h4>
											  <span class="m-widget5__desc">
  															{{$hostel->description}}
  																</span>
											  <div class="m-widget5__info">
															<span class="m-widget5__author">
                                {{$hostel->owner['name']}}
															</span>
											  </div>
										  </div>
									  </div>
									  <div class="m-widget5__content">
										  <div class="m-widget5__stats1">
											  <span class="m-widget5__number">19,200</span><br>
											  <span class="m-widget5__sales">کرایه</span>
										  </div>
										  <div class="m-widget5__stats2">
											  <span class="m-widget5__number">1046</span><br>
											  <span class="m-widget5__votes">درخواست جدید</span>
										  </div>
									  </div>
								  </div>

							  </div>

							  <!--end::m-widget5-->
						  </div>

					  </div>

					  <!--end::Content-->
				  </div>
			  </a>
			  @endforeach
	  </div>

	  <!--end:: Widgets/Best Sellers-->
  </div>
</div>


<!-- end:: Page -->

<!--begin::Global Theme Bundle -->
{{--<script src="../../../assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>--}}
{{--<script src="../../../assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>--}}
<script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/demo11/base/scripts.bundle.js')}}" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Scripts -->
<script src="{{asset('assets/snippets/custom/pages/user/login.js')}}" type="text/javascript"></script>

<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
