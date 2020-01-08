@extends('layout_front.mainlayout')

@section('content')
    <section class="container mt-5 rom-filter">
        <div class="row justify-content-center ">
            <!-- first-section-second/big-part -->
            <div class=" col-12 col-md-12 col-lg-12">
                <div class="row">
                  @foreach($address as $result)
                    <div class="col-md-6 col-lg-6 px-lg-1 pr-md-1">
                        <a class="page-scroll"
                           href="{{route('room_details',$result->id)}}">
                            <div class="card card-shadow custom-height-1 common-negative-margin-1"
                                 style="border-radius: 0%">
                                <img src="/attachments/{{$result->file_name}}"
                                class="card-img-top card-img custom-card-img-height"
                                     alt="">
                                <div class="car-body">
                                    <div class="card-footer">
                                        <div class="custom-circle"><p class="custom-circle-text card-text">
                                                <b>{{$result->name}}</b>
                                            </p></div>
                                        <div class="custom-prices card-text text-left"> کرایه فی ماه
                                          :  {{$result->room_rent}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
