@extends('layout_front.mainlayout')
@section('content')
    <!-- Room-Detail -->
    <section class="container">
        <div class="container r-detail mt-5 pb-5">
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    <div class="card mb-3">
                        <img class="card-img-top" src="/assets-/app/media/img/blog/rooms_img/{{$details->file_name}}"
                             alt="Card image cap"
                             style="width: 100%; height: 280px;">
                        <div class="card-body p-5">
                            {{----}}
                            {{--descriptions--}}
                            <div class="col-md-12 ">

                                <p> توضیحات <span class="fa fa-angle-left"></span></p>
                                <p>اطلاعاتی از منبعی موثق : پیشنهاد بارسا به ژاوی ، ۲.۵ فصل (ادامه این فصل + دو فصل دیگر) بوده است.
                                    ژاوی تصمیم نهایی خودش رو بعد از مذاکره با باشگاه السد میگیره و برای فکر کردن در مورد این موضوع از بارسا فرصت خواست.
                                    بارسا می خواهد ژاوی پاسخ این پیشنهاد را دهد .
                                </p>
                                {{--<div class="row d-flex justify-content-center">--}}
                                    {{--<div class="col-md-8">--}}
                                        {{--<p class="" style="color: #6c757d">--}}
                                            {{--{{ $room->room_description }}--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            </div>
                            {{-- facilities--}}
                            <div class="col-md-12 mt-5">
                                <p> امکانات <span class="fa fa-angle-left"></span></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mt-3"><span class="fa fa-paperclip mr-5"></span> امکانات </p>
                                        <p class="mt-1"><span class="fa fa-home mr-5"></span> امکانات </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mt-3"><span class="fa fa-paperclip mr-5"></span> امکانات </p>
                                        <p class="mt-1"><span class="fa fa-home mr-5"></span> امکانات </p>
                                    </div>
                                </div>
                                {{--<div class="row post">--}}
                                    {{--<div class="col-md-8">--}}
                                        {{--<article class="post">--}}
                                            {{--<div class="info">--}}
                                                {{--<table class="table border-0">--}}
                                                    {{--<thead>--}}
                                                    {{--<tr>--}}
                                                        {{--@foreach($hostel->facility->take(5) as $facility)--}}
                                                            {{--<th scope="col">--}}
                                                                {{--<div class="mb-1"><span class="fa fa-home"></span> {{ $facility->facility_name }} </div>--}}
                                                            {{--</th>--}}
                                                        {{--@endforeach--}}
                                                    {{--</tr>--}}
                                                    {{--</thead>--}}
                                                {{--</table>--}}
                                            {{--</div>--}}
                                        {{--</article>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{-- charachterstics --}}
                                {{--<header class="txt-line mb-3"><span class=""></span><h5>مشخصات</h5></header>--}}



                                <p class="mt-5"> مشخصات <span class="fa fa-angle-left"></span></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mt-3"><span class="fa fa-paperclip mr-5"></span> امکانات </p>
                                        <p class="mt-1"><span class="fa fa-home mr-5"></span> امکانات </p>
                                        <p class="mt-1"><span class="fa fa-home mr-5"></span> امکانات </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mt-3"><span class="fa fa-paperclip mr-5"></span> امکانات </p>
                                        <p class="mt-1"><span class="fa fa-home mr-5"></span> امکانات </p>
                                        <p class="mt-1"><span class="fa fa-home mr-5"></span> امکانات </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="mt-5 mb-2 tt-linee-2">مشخصات<span class="fa fa-angle-left"> </span></p>
                                </div>


                                <div class="row posts ">
                                    <div class="col-md-6">
                                        <article class="post">
                                            <div class="info">
                                                <div class="mb-1"><span class="fa fa-home"></span>مساحت : {{ $room->area}}  </div>
                                                <div class="mb-1"><span class="fa fa-home"></span>Id : {{ $room->id}} </div>
                                                <div class="mb-1"><span class="fa fa-home"></span>گنجایش اطاق : {{ $room->total_bed}} نفر</div>
                                                <div class="mb-1"><span class="fa fa-home"></span>بستر خالی : {{ $room->empty_bed}} </div>
                                            </div>
                                        </article>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info pl-3">
                                            <div class="mb-1">قیمت اطاق : {{ $room->room_rent}} افغانی</div>
                                            <div class="mb-1">شماره اطاق : {{ $room->room_number}} </div>
                                            <h6> سرویس غذا :
                                                @if($room->food_servic == 1)
                                                    {{ 'همراه با غذا'}}
                                                @else {{ 'بدون غذا' }}
                                                @endif
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{----}}
                        </div>
                    </div>
                </div>

                <!-- Sticky -->
                <div class=" col-12 col-md-4 col-lg-4 sticky" id="three">
                    <div class="card c-shadow c-radius">
                        <div class="card-body" style="height: 360px">
                            <!-- card-body -->
                            <div class="row">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-6 text-center mt-5">
                                            <span class="fa fa-hospital" style="font-size: 40px"></span>
                                            <p class="mt-"></p>
                                            <h6 class="mt-4"> منتشر کننده</h6>
                                            <h6 class="mt-1">{{ $hostel->name }}</h6>
                                            <h6 class="mt-3"> آدرس : ناحیه {{ $hostel->address->state }}
                                                {{ $hostel->address->rood }}
                                                {{ $hostel->address->alley }}
                                                {{ $hostel->address->station }}
                                            </h6>
                                            <h6 class="mt-4"> شماره های تماس {{ $hostel->phone }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form method="post" action="{{route('Customer.store',$room->id)}}" class="mt-3">
                                @csrf
                                <div class="d-flex justify-content-center mt-5">
                                    <input type="text" name="phone" value="" placeholder="شماره تماس خود را وارید کنید"><br>
                                    <button type="submit" class="btn btn-outline-dark pl-3 pr-3 pt-2 pb-2">اتاق را
                                        پسندیدم
                                    </button>
                                    {{--{{ flash('hello world') }}--}}
                                </div>
                            </form>
                        </div>  <!-- End-card-body-->
                    </div>
                </div>
                <!-- End-sticky -->
            </div>


            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

        </div>
    </section>

    <a class="mb-1" href="{{ route('hostel_details',$hostel->id) }}"
       style="color: #0a6aa1; font-size: 18px;">
        در مورد لیلیه بیشتر بدانید<span class="ml-2 fa fa-angle-double-left"></span>
    </a>
    </div>

@endsection
<script type="text/javascript">

    $(document).scroll(function () {
        $("#three").animate({margin: "0px 0px 0px 0px"}, 3000);
    });
</script>
