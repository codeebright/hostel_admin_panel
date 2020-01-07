<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>admin | hostel list </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="shortcut icon" href="/assets/demo/default/media/img/logo/favicon.ico" />
    <link href="{{asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{asset('assets/demo/demo11/media/img/logo/favicon.ico')}}" />
    <link href="{{asset('assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.0.0/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <style>
      @font-face {
        font-family: 'persian_font';
        src:url("{{asset('fonts/signweb2.woff')}}");
      }
      body, a, button.btn, table, h3  {
         font-family: persian_font !important;
      }
    </style>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="row  justify-content-center">
  <div class="col-xl-8">
	  <!--begin:: Widgets/Best Sellers-->
	  <div class="m-portlet mt-5 ">
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
	  </div>
	  <div id="message_content">
	  </div>
		  @foreach( $hostels as $hostel)
		  <div class="m-portlet  " id='hostel_row_{{$hostel->id}}'>
        <a href="#" onclick="destroy('{{route('hostel.delete',$hostel->id)}}','','GET','message_content','hostel_row_{{$hostel->id}}');"  class="btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--pill  mt-3 mr-3 pull-left">
															<i class="fa flaticon-delete"></i>
					</a>
          <a href="{{route('hostel.edit' , $hostel->id)}}" id="m_sweetalert_demo_3_3"  class="btn btn-outline-success m-btn m-btn--icon m-btn--icon-only m-btn--pill  mt-3 mr-3 pull-left">
  															<i class="fa flaticon-edit"></i>
  					</a>
            <!-- <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{route('hostel.edit', $hostel->id)}}"><i class="fa fa-trash"></i></a>

            <a type="button" class="btn btn-danger">
              <i class="glyphicon glyphicon-trash"></i> Delete
            </a> -->
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
                          <b>
                          {{$hostel->name}}
                          </b>
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
											  <span class="m-widget5__number">1</span><br>
											  <span class="m-widget5__sales">اتاق خالی</span>
										  </div>
										  <div class="m-widget5__stats2">
											  <span class="m-widget5__number">6</span><br>
											  <span class="m-widget5__votes">درخواست جدید</span>
										  </div>
									  </div>
								  </div>

							  </div>

							  <!--end::m-widget5-->
						  </div>
					  </div>
				  </div>
			  </a>
		  </div>
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
<script src="{{asset('assets/demo/demo11/custom/components/base/SweetAlert2.js')}}" type="text/javascript"></script>
@include('assets.custome_js')


<!--end::Page Scripts -->
<!-- <script>

$('a').click(function(){

  swal({
  title: 'Are you sure?',
  text: "It will permanently deleted !",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then(function() {
  swal(
    'Deleted!',
    'Your file has been deleted.',
    'success'
  );
})

})
</script -->
</body>

<!-- end::Body -->
</html>
