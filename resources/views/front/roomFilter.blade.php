@extends('layout_front.mainlayout')

@section('content')
    <section class="container mt-5 rom-filter">
        <div class="row">
            <!-- search-filter -->
            <div class="col-12 col-sm-6 col-lg-4 mb-2 ">
                <div class="card card-shadow custom-border-light-1">
                    <div class="card-body p-3">
                        <!-- card-body -->
                        <div class="row justify-content-center">
                            <!-- top--->
                            <div class=" col-12 col-md-12 mt-lg-2">
                                <div class="row justify-content-center">

                                  <p class="text-center mt-1 mb-3 txt">جستجو بیشتر</p>

                                    <div class="col-12 col-md-12">
                                        <input type="text" class="form-control"
                                               placeholder="آدرس خود را وارید کنید..." aria-label="Recipient's username"
                                               aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                <div class="row justify-content-center mt-3">
                                    <div class=" col-6 col-md-6 col-lg-6 pr-1">
                                          <div class="col-auto p-0">
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                              <option selected>حدالقل کرایه</option>
                                              <option value="1">1000</option>
                                              <option value="2">2000</option>
                                              <option value="3">3000</option>
                                              <option value="3">4000</option>
                                              <option value="3">5000</option>
                                            </select>
                                          </div>

                                          <div class="col-auto p-0 mt-2">
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                              <option selected>تعداد نفرات</option>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="3">4</option>
                                              <option value="3">5</option>
                                              <option value="3">بیشتر</option>
                                            </select>
                                          </div>


                                    </div>
                                    <div class=" col-6 col-md-6 col-lg-6 pl-1 ">
                                      <div class="col-auto p-0">
                                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                          <option selected>حداکثر کرایه</option>
                                          <option value="1">2000</option>
                                          <option value="2">3000</option>
                                          <option value="3">4000</option>
                                          <option value="3">5000</option>
                                          <option value="3">6000</option>
                                        </select>
                                      </div>

                                      <div class="col-auto p-0 mt-2">
                                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                          <option selected>بی هم اتاقی</option>
                                          <option value="1">با هم اتاق</option>
                                        </select>
                                      </div>

                                    </div>
                                </div>
                            </div>  <!--End-top-->
                            <!--bottom-->
                            <div class=" col-12 col-md-12">
                                <div class="row justify-content-center">
                                    <div class=" col-12 col-md-12">
                                        <p class=" card-title  text-center font-size13 txt-linee mb-3 mt-3 "> تعین
                                            امکانات </p>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-12">
                                      <div class="row">
                                          <div class="col-6 col-md-6 pr-1">
                                            <input id="lists[Travel1]" type="checkbox" name="lists[Travel]" />
                                            <label for="lists[Travel1]">خدمات نان</label>
                                          </div>
                                          <div class="col-6 col-md-6 pl-1">
                                            <input id="lists[Travel2]" type="checkbox" name="lists[Travel]" />
                                            <label for="lists[Travel2]">وافای</label>
                                          </div>
                                      </div>

                                      <div class="row">
                                          <div class="col-6 col-md-6 pr-1">
                                            <input id="lists[Travel3]" type="checkbox" name="lists[Travel]" />
                                            <label for="lists[Travel3]">برق 24 ساعته</label>
                                          </div>
                                          <div class="col-6 col-md-6 pl-1">
                                            <input id="lists[Travel4]" type="checkbox" name="lists[Travel]" />
                                            <label for="lists[Travel4]">انترنت</label>
                                          </div>

                                      </div>

                                    </div>

                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-12">
                                      <button type="button" class="btn btn-dark btn-block mt-2 pt-1 pb-2">جستجو</button>
                                        {{-- <button type="button"
                                                class="btn  btn-block  btn-outline-dark btn-block p-2">
                                                جستجو
                                                <span class="fa fa-angle-left ml-3"></span>
                                        </button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end-search-filter -->

            {{-- <!-- first-section-second/big-part --> --}}
            <div class="col-12 col-sm-6 col-lg-8">

              <p class="text-center txt txt480">نتیجه جستجو</p>
                <div class="row">
                    <div class="col-sm-12 col-md- col-lg-6 px-lg-1 pr-md-1">
                        <a class="page-scroll"
                           href="#" >
                            <div class="card card-shadow common-negative-margin-1"
                                 style="border-radius: 0%">
                                <img src="./image/5.jpg"
                                class="card-img-top card-img custom-card-img-height"
                                     alt="">
                                <div class="car-body">
                                    <div class="card-footer">
                                        <div class="custom-circle"><p class="custom-circle-text card-text"></p></div>
                                        <div class="custom-prices card-text text-left"> کرایه فی ماه
                                          2000
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-12 col-md- col-lg-6 px-lg-1 pr-md-1 m990">
                        <a class="page-scroll"
                           href="#" >
                            <div class="card card-shadow common-negative-margin-1"
                                 style="border-radius: 0%">
                                <img src="./image/5.jpg"
                                class="card-img-top card-img custom-card-img-height"
                                     alt="">
                                <div class="car-body">
                                    <div class="card-footer">
                                        <div class="custom-circle"><p class="custom-circle-text card-text"></p></div>
                                        <div class="custom-prices card-text text-left"> کرایه فی ماه
                                          2000
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

            </div>

        </div>


    </section>

@endsection
