@extends('layout_front.mainlayout')

@section('content')
    <section class="container-fluid" id="myHeader" style="background-color:lightgray;height: 75px">
    </section>
    <section class="container custom-margin ">
        <h5 class="text-center" style="text-shadow:  1px 1px 2px black; color: #1b1e21">مجموعه ما با بیشترین خوابگا در سطح
            کشور</h5>
        <div class="justify-content-center thin-underline-1"></div>
        <div class="row justify-content-center">
            @foreach($hostels as $hostel)
                {{--@foreach($hostel->hostelPhotos as $image)--}}
                <div class=" col-12 col-sm-6 col-md-6  col-lg-3 px-1 mt-3">
                    <div class="card card-shadow custom-height-1" style="border-radius: 0%">
                        <a href="{{route('hostel_details',$hostel->id)}}">
                            <img src="/assets-/app/media/img/blog/hostels_img/{{ $hostel->filename }}"
                                 class="card-img-top card-img custom-card-img-height" alt=""></a>
                        <div class="car-body">
                            <div class="card-footer">
                                <div class="custom-circle"><p class="custom-circle-text card-text"><b>
                                            @if($hostel->type == 1)
                                                {{ 'ذکور'}}
                                            @else {{ 'اناث' }}
                                            @endif
                                        </b></p></div>
                                <div class="custom-prices card-text text-left"> آدرس
                                    : {{$hostel->state }}{{$hostel->rood }} {{$hostel->station }} {{$hostel->alley }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--@endforeach--}}
            @endforeach
        </div>
    </section>
@endsection
