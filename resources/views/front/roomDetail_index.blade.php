@extends('layout_front.mainlayout')
@section('content')
    <!-- Room-Detail -->
    <section class="container r-detail">
        <div class="r-detail mt-5 pb-5 p-0">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="card mb-3">
                        <img class="card-img-top" src="../image/5.jpg"
                             alt="Card image cap"
                             style="width: 100%; height: 280px;">
                        <div class="card-body p-5">
                            {{----}}
                            {{--descriptions--}}
                            <div class="col-md-12 ">

                                <p class="media-text-center"> توضیحات </span></p>
                                <div class="col-12 col-lg-12 mt-3 p-0 txt-center">
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مو
                                </div>

                            </div>

                            <div class="col-md-12 mt-5 txt-center">
                              <p class="mt-5 mb-3 media-text-center"> امکانات </p>
                              <div class="row">
                                  <div class="col-12 col-md-6">
                                      <div class="row">
                                        <div class="col-5 col-sm-4 pr-0">
                                          <p class="mt-2"> <span class="fa fa-wifi"></span> </p>
                                          <p class="mt-2"> <span class="fa fa-home"> </p>
                                          <p class="mt-2"> <span class="fa fa-book"></span> </p>
                                        </div>
                                        <div class="col-7 col-sm-8 pl-0">
                                          <p class=" mt-2">انترنت</p>
                                           <p class=" mt-2">برق 24 ساعته</p>
                                           <p class="mt-2">امنیت بالا</p>
                                        </div>
                                      </div>

                                  </div>

                                  <div class="col-12 col-md-6">
                                    <div class="row">
                                      <div class="col-5 col-sm-4 pr-0">
                                        <p class="mt-2"> <span class="fa fa-wifi"></span> </p>
                                        <p class="mt-2"> <span class="fa fa-home"> </p>
                                        <p class="mt-2"> <span class="fa fa-book"></span> </p>
                                      </div>
                                      <div class="col-7 col-sm-8 pl-0">
                                        <p class=" mt-2">انترنت</p>
                                         <p class=" mt-2">فضای آرام</p>
                                         <p class="mt-2">حمام شاور دار</p>
                                      </div>
                                    </div>



                                  </div>
                              </div>

                                <p class="mt-5 mb-3 media-text-center"> مشخصات </p>
                                <div class="row ">
                                    <div class="col-md-6">

                                      @foreach($hostel->rooms as $room)
                                        <div class="row">
                                          <div class="col-6 col-sm-4 pr-0">
                                            <p class="mt-2"> مساحت: </p>
                                            <p class="mt-2"> کرایه: </p>
                                            <p class="mt-2"> گنجایش: </p>
                                          </div>
                                          <div class="col-6 col-sm-8 pl-0">
                                            <p class=" mt-2">{{ $room->area}} متر مربع</p>
                                             <p class=" mt-2">{{ $room->room_rent}}<span class="pl-1"></span> افغانی</p>
                                             <p class="mt-2">{{ $room->total_bed}}<span class="pl-1"></span>  نفر</p>
                                          </div>
                                        </div>
                                          @endforeach
                                    </div>

                                    <div class="col-md-6">
                                      <div class="row">
                                        <div class="col-6 col-sm-4 col-md-4 pr-0">
                                          <p class="mt-2"> بستر خالی: </p>
                                          <p class="mt-2"> سرویس غذا :</p>
                                          <p class="mt-2"> آدرس:</p>
                                        </div>
                                        <div class="col-6 col-sm-8 col-md-8 pl-0">
                                          <p class=" mt-2">{{$room->empty_bed}}</p>
                                          <p class="mt-2">
                                              @if($room->food_servic == 1)
                                                  {{ 'همراه با غذا'}}
                                              @else {{ 'بدون غذا' }}
                                              @endif
                                          </p>
                                          <p class="mt-2">ناحیه
                                          {{ $hostel->address->state }}
                                          سرک
                                            {{ $hostel->address->rood }}
                                            کوچه
                                            {{ $hostel->address->alley }}
                                            ایستگاه
                                            {{ $hostel->address->station }}
                                        </p>
                                        </div>
                                      </div>



                                    </div>
                                </div>


                            </div>
                            {{----}}
                        </div>
                    </div>
                </div>

                <!-- Sticky -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-4 sticky" id="three" >
                    <div class="card custom-card pb-4">

                            <!-- card-body -->
                            <div class="row">
                                <div class="card-body pl-3 pr-3">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center pt-4 p-media">
                                            <span class="fa fa-hospital mobile" style="font-size: 40px"></span>

                                            <h6 class="mt-4 mobile"> منتشر کننده</h6>
                                            <h6 class="mt-1 mobile"> لیلیه {{ $hostel->name }}</h6>

                                            {{--<h6 class="mt-4"> شماره های تماس {{ $hostel->phone }}</h6>--}}

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 mt-5 m-media"  style="font-size: 11px; text-align: center;">برای گرفتن اتاق شماره تماس خود را بنوسید.</div>
                                        </div>
                                    </div>
                                    <div class="input-group pl-4 pr-4 pt-3">

                                        <form class="input-group" method="post" action="{{route('Customer.store',$room->id)}}">
                                            <input type="text" role="search" name="phone"
                                                   class="form-control custom-border-dark"
                                                   placeholder="شماره تماس ">
                                            <button type="button" class="btn btn-dark btn-block mt-1">فرستادن</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{----}}

                            {{----}}
                          <!-- End-card-body-->
                    </div>
                </div>
                <!-- End-sticky -->
            </div>

        </div>
    </section>
@endsection
