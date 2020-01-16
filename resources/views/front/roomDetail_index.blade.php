@extends('layout_front.mainlayout')
@section('content')
    <!-- Room-Detail -->
    <section class="container">
        <div class="r-detail mt-5 pb-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="card mb-3">
                        <img class="card-img-top" src="/assets-/app/media/img/blog/rooms_img/{{$details->file_name}}"
                             alt="Card image cap"
                             style="width: 100%; height: 280px;">
                        <div class="card-body p-5">
                            {{----}}
                            {{--descriptions--}}
                            <div class="col-md-12 ">

                                <p > توضیحات <span class="fa fa-angle-left faa"></span></p>
                                <p class="mt-3">اطلاعاتی از منبعی موثق : پیشنهاد (ادامه این فصل + دو فصل دیگر) بوده است.
                                    ژاوی تصمیم نهایی خودش رو بعد از مذاکره با باشگاه السد میگیره و برای فکر کردن در مورد این موضوع از بارسا فرصت خواست.

                                </p>

                            </div>

                            <div class="col-md-12 mt-5">
                                <p class=""> امکانات <span class="fa fa-angle-left faa"></span></p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mt-3"><span class="fa fa-paperclip mr-5"></span> امکانات </p>
                                        <p class="mt-2"><span class="fa fa-home mr-5"></span> تتتتتتتامکانات </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mt-3"><span class="fa fa-paperclip mr-5"></span> امکانات </p>
                                        <p class="mt-2"><span class="fa fa-home mr-5"></span> امکانات </p>
                                    </div>
                                </div>

                                <p class="mt-5"> مشخصات <span class="fa fa-angle-left faa"></span></p>
                                <div class="row">
                                    <div class="col-md-6">

                                      @foreach($hostel->rooms as $room)



                                          <p class="mt-3"> مساحت: <span class="pl-4">{{ $room->area}} متر مربع</span></p>
                                          <p class="mt-2"> کرایه: <span class="pl-4">{{ $room->room_rent}} افغانی&nbsp;</span></p>
                                          <p class="mt-2"> گنجایش: <span class="pl-4">{{ $room->total_bed}}نفر</span></p>

                                          @endforeach
                                    </div>
                                    <div class="col-md-6">

                                        <p class="mt-3"> بستر خالی: <span class="pl-4">{{$room->empty_bed}}</span></p>
                                        <p class="mt-2">
                                            سرویس غذا :
                                            <span class="pl-4">
                                                @if($room->food_servic == 1)
                                                    {{ 'همراه با غذا'}}
                                                @else {{ 'بدون غذا' }}
                                                @endif
                                            </span>
                                        </p>

                                        <p class="mt-2"> آدرس : ناحیه {{ $hostel->address->state }}
                                            {{ $hostel->address->rood }}
                                            {{ $hostel->address->alley }}
                                            {{ $hostel->address->station }}
                                        </p>
                                    </div>
                                </div>


                            </div>
                            {{----}}
                        </div>
                    </div>
                </div>

                <!-- Sticky -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 sticky" id="three" >
                    <div class="card c-shadow c-radius">
                        <div class="card-body" style="height: 347px">
                            <!-- card-body -->
                            <div class="row">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-6 text-center mt-5 pt-4">
                                            <span class="fa fa-hospital mobile" style="font-size: 40px"></span>

                                            <h6 class="mt-4"> منتشر کننده</h6>
                                            <h6 class="mt-1"> لیلیه {{ $hostel->name }}</h6>

                                            {{--<h6 class="mt-4"> شماره های تماس {{ $hostel->phone }}</h6>--}}
                                            <p class="mt-5"  style="font-size: 11px; text-align: center;">برای گرفتن اتاق شماره تماس خود را بنوسید.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{----}}
                            <div class="input-group pl-4 pr-4 pt-3">

                                <form class="input-group" method="post" action="{{route('Customer.store',$room->id)}}">
                                    <input type="text" role="search" name="phone"
                                           class="form-control custom-border-left custom-border-dark"
                                           placeholder="شماره تماس ">
                                    <div class="input-group-append custom-ingroup">
                                        <button class="btn btn-outline-secondary search-box-btn btn-lg notify" type="submit" style="font-size: 12px;">فرستادن</button>
                                    </div>
                                </form>
                            </div>
                            {{----}}
                        </div>  <!-- End-card-body-->
                    </div>
                </div>
                <!-- End-sticky -->
            </div>

        </div>
    </section>

    <a class="mb-1" href="{{ route('hostel_details',$hostel->id) }}"
       style="color: #0a6aa1; font-size: 18px;">
        در مورد لیلیه بیشتر بدانید<span class="ml-2 fa fa-angle-double-left"></span>
    </a>

@endsection
<script type="text/javascript">

    $(document).scroll(function () {
        $("#three").animate({margin: "0px 0px 0px 0px"}, 3000);
    });
</script>
