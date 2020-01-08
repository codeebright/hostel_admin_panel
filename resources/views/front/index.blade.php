@extends('layout_front.mainlayout')
@section('content')

    <section class="container-fluid main-page">
        <!--search-box-->
        <div class="row justify-content-center mr-0 ml-0">
            <div class="col-md-4">
                <h5 class="text-center search-box-space" style=" color: #1b1e21"><b>اتاق مورید نظر تانرا در اینجا جستجو
                        کنید</b></h5>
                <div class="input-group mb-3">
                    <form class="input-group" name="search" action="{{ route('home_search') }}" method="post"
                          role="search">
                        @csrf
                        <input type="text" role="search" name="q"
                               class="form-control custom-border-left custom-border-dark"
                               placeholder="حوزه پنجم ، کارته چهار ، دهمزنگ ،...">
                        <div class="input-group-append custom-ingroup">
                            <button class="btn btn-outline-secondary search-box-btnn btn-lg " type="submit">جستجو</button>
                        </div>
                        <div class="flash-message mt-5">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }}">
                                        {{ Session::get('alert-' . $msg) }}
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    </p>
                                @endif
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--<div class="line-custom"></div>-->
    <!--the best hostel-->
    <section class="container custom-margin">
        <h5 class="text-center" style="text-shadow:  1px 1px 2px black; color: #1b1e21">بهترین خوابگاها در شهر</h5>
        <div class="justify-content-center thin-underline-1"></div>

        <div class="row justify-content-center">
            @foreach($hostels as $hostel)
                <div class=" col-12 col-sm-6 col-md-6  col-lg-3 px-1">
                    <div class="card card-shadow custom-height-1 " style="border-radius: 0%">
                        <a class="page-scroll"
                           href="{{route('room_details',$hostel->id)}}" id="hamid">
                        <img src="/attachments/{{ $hostel->file_id }}"
                             class="card-img-top card-img custom-card-img-height" alt=""></a>
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
<b></b>
