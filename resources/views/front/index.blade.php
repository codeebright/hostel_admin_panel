@extends('layout_front.mainlayout')
@section('content')
    <section class="container-fluid main-page">
        <!--search-box-->
        <div class="row justify-content-center mr-0 ml-0">
            <div class="col-md-4 search-box-space">
                <p class="text-center mb-5" style=" color: #fff; font-size:16px;">اتاق مورید نظر تانرا در اینجا جستجو
                        کنید</p>

                <div class="input-group mb-3">

                    <form class="input-group" name="search" action="{{ route('home_search') }}" method="post"
                          role="search">
                        @csrf


                        <input type="text" role="search" name="q"
                               class="form-control custom-border-left custom-border-dark search-btn-p"
                               placeholder="آدرس تان را بنوسید">
                        <div class="input-group-append custom-ingroup">
                            <button class="btn btn-outline-secondary search-box-btn btn-lg pl-4 pr-4" type="submit">جستجو</button>
                        </div>


                    </form>

                    <div class="flash-message ">
                        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has('alert-' . $msg))
                                <p class="alert alert-{{ $msg }}">
                                    {{ Session::get('alert-' . $msg) }}
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                </p>
                            @endif
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!--<div class="line-custom"></div>-->
    <!--the best hostel-->
    <section class="container mt-5 mb-5">
        <h5 class="text-center" style="text-shadow:  1px 1px 2px black; color: #1b1e21">بهترین خوابگاها در شهر</h5>
        <div class="justify-content-center thin-underline-1 mb-5"></div>

        <div class="row justify-content-center">
            @foreach($hostels as $hostel)
                <div class=" col-12 col-sm-6 col-md-6 col-lg-3 px-1">
                    <div class="card card-shadow" style="border-radius: 0%">
                        <a class="page-scroll"
                           href="{{route('room_details',$hostel->id)}}">
                            <img src="/attachments/{{ $hostel->file_id }}"
                                 class="card-img-top card-img card-image" alt=""></a>
                        <div class="car-body">
                            <div class="card-footer">
                                <div class="custom-circle"><p class="custom-circle-text card-text"><b>
                                            @if($hostel->type == 1)
                                                {{ 'ذکور'}}
                                            @else {{ 'اناث' }}
                                            @endif
                                        </b></p></div>
                                <div class="custom-prices card-text text-left"> کرایه فی ماه
                                    : {{ $hostel->room_rent }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
