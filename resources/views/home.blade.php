@extends('layout.mainlayout')

@section('content')

    <section class="container-fluid main-page">
        <!--search-box-->
        <div class="row justify-content-center">
            <div class="col-md-4 ">

                <h5 class="text-center search-box-space" style=" color: #1b1e21"><b>اتاق مورید نظر تانرا در اینجا جستجو کنید</b></h5>
                <div class="row">
                    <div class="col-6">
                        <div class=" btn-sold-margin">
                            <button type="button" class="btn btn-secondary custom-btn-secondary btn-lg" autofocus="autofocus">پسرانه</button>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class=" btn-rent-margin">
                            <button type="button" class="btn btn-secondary custom-btn-secondary btn-lg">دخترانه</button>
                        </div>
                    </div>

                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control custom-border-left custom-border-dark" placeholder="ادرس اتاق و یا خوابگا را وارید کنید" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button  class="btn btn-outline-secondary search-box-btn btn-lg" type="button">جستجو</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--<div class="line-custom"></div>-->
    <!----------------the best hostel------------------>
    <section class="container custom-margin">
        <h5 class="text-center" style="text-shadow:  1px 1px 2px black; color: #1b1e21">بهترین خوابگاها در شهر</h5>
        <div class="justify-content-center thin-underline-1"></div>
        <div class="row justify-content-center">

          {{-- @foreach($hostels as $file)
          @foreach($file->hostelDetails->attachments as $photo)
          <div class=" col-12 col-sm-6 col-md-6  col-lg-3 px-1  mt-4 small-device-hid ">
              <div class="card card-shadow custom-height-1 " style="border-radius: 0%">
                  <img  src="/images/{{ $photo->file_name }}" class="card-img-top card-img custom-card-img-height" alt="">
                  <div class="car-body">
                      <div class="card-footer">
                          <div class="custom-circle"><p class="custom-circle-text card-text"><b>بانوان</b></p></div>
                          <div class="custom-prices card-text text-left">کرایه /ما ۵۰۰۰</div>
                          <div class="row mt-3">
                              <div class="col-12 col-sm-12 col-md-12 mb-2 ">
                                  <span class="card-text">آدرس : برچی ایستاگا نانوای داخل کوجه</span>
                                  {{-- <span> {{ $file->hostels->state  }} </span> --}}addrss
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
        {{-- @endforeach
        @endforeach --}} --}}

            <div class=" col-11 col-sm-6 col-md-6  col-lg-3 px-1 mt-4 ">
                <div class="card card-shadow custom-height-1 " style="border-radius: 0%">
                    <img  src="khana%20image/home1%20(2).jpg" class="card-img-top card-img custom-card-img-height" alt="">
                    <div class="car-body">
                        <div class="card-footer">
                            <div class="custom-circle"><p class="custom-circle-text card-text"><b>تابش</b></p></div>
                            <div class="custom-prices card-text text-left"> کرایه بر ماه ۸۰۰۰</div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-12 col-md-12 mb-2 ">
                                    <span class=" card-text">آدرس: نارسیده به چهار راهی شهدای روشنای</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- <div class=" col-11 col-sm-6 col-md-6  col-lg-3 px-1 mt-4 ">
                <div class="card card-shadow custom-height-1 " style="border-radius: 0%">
                    <img  src="khana%20image/bilding.jpg" class="card-img-top card-img custom-card-img-height" alt="">
                    <div class="car-body">
                        <div class="card-footer">
                            <div class="custom-circle"><p class="custom-circle-text card-text"><b>تابش</b></p></div>
                            <div class="custom-prices card-text text-left"> کرایه بر ماه ۸۰۰۰</div>
                            <div class="row mt-3">
                                <div class=" col-md-12 mb-2 ">
                                    <span class="card-text">آدرس : نارسیده به جهار راهی دهمزنگ</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div> --}}
            {{-- <div class=" col-11 col-sm-6 col-md-6  col-lg-3 px-1 mt-4 small-device-hid">
                <div class="card card-shadow custom-height-1 " style="border-radius: 0%">
                    <img  src="khana%20image/bilding%20(2).png" class="card-img-top card-img custom-card-img-height" alt="">
                    <div class="car-body">
                        <div class="card-footer">
                            <div class="custom-circle"><p class="custom-circle-text card-text"><b>کامل</b></p></div>
                            <div class="custom-prices card-text text-left"> کرایه بر ما ۴۵۰۰</div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-12 col-md-12 mb-2 ">
                                    <span class="card-text">  آدرس : کارته جهار پهلوی پارک ابی کابل</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div> --}}

        </div>

    </section>
    <!---Map--->
    <section class="container custom-margin">
    <span class="fa fa-search-location d-flex justify-content-center" style="font-size: 50px; ">
    </span>
        <h5 class="text-center" style="text-shadow:  1px 1px 2px black; color: #1b1e21">یافتن خانه از نقشه</h5>
        <div class=" justify-content-center thin-underline-style"></div>
        <div class="row justify-content-center">
            <div class=" col-12 col-lg-12 col-md-12 px-sm-1">
                <div class="card card-shadow custom-border-light common-negative-margin">
                    <img class="img-fluid" src="img/map.jpg" alt="" style="width: 100%; height: 420px;">
                </div>
            </div>
        </div>
    </section>

@endsection
<b></b>
