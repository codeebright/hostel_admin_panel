@extends('layout_front.mainlayout')
@section('content')
    <!-- Small-hostel-properties -->
    <section class="container-fluid hostel">
        {{-- slide show part --}}
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <!-- @foreach($hostel->hostelPhotos->take() as $photo)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <img class="d-block w-100"
                             src="/assets-/app/media/img/blog/hostels_img/{{$photo->filename}}"
                             alt="First slide" height="520">
                    </div>
                @endforeach -->
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>  <!-- End-small-hostel-properties -->
    <div class="row mt-5">
        <div class="clo-4 offset-5">
            <h4 class="text-center unline"> عکس اطاق های لیلیه {{ $hostel->name }}  </h4>
        </div>
    </div>

    <!-- All hostel images -->
    <section class="container mt-5">
        <div class="row justify-content-center">
            @foreach($hostel->attachments->take(8) as $hostels)
                {{--@foreach($hostel->hostelPhotos as $image)--}}
                <div class=" col-12 col-sm-6 col-md-6  col-lg-3 px-1 mt-3">
                    <div class="card card-shadow custom-height-1" style="border-radius: 0%">
                        <img src="/assets-/app/media/img/blog/rooms_img/{{ $hostels->file_name }}"
                             class="card-img-top card-img custom-card-img-height" alt="">
                        <div class="car-body">
                            <div class="card-footer">
                                <div class="custom-circle"><p class="custom-circle-text card-text"><b>
                                            @if($hostel->type == 1)
                                                {{ 'ذکور'}}
                                            @else {{ 'اناث' }}
                                            @endif
                                        </b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--@endforeach--}}
            @endforeach
        </div>
    </section>

    {{-- Hostel properties and descriptions--}}
    <section class="container mt-4">
        <div class="row mb-3">
            <!-- hostel properties -->
            <div class="col-md-6 mt-4 list-group bg-light">
                <p class="text-center mt-4"> امکانات لیلیه </p>
                <div class="row ml-3 mt-5">
                    @foreach($hostel->facilities as $facilities)
                        <div class="col-md-4 col-sm-4">
                            <ul class="custom-li-padding">
                                <li class="list-group">
                                    <b> {{ $facilities->name}}</b>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6 pr-0 mt-4" id="accordion">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">توضیحات لیلیه</h5>
                    </div>
                    <div>
                        <p class="card-body justify-content m-2"> {{ $hostel->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Hostels Food menu tabs section --}}
    <section class="container">
        <div class="row">
            <div class="col-md-12 nav-padding mb-3 pr-3 text-center">
                <table class="table table-striped">
                    <h4 class="text-center mb-4">مینوی غذا</h4>
                    <thead class="black white-text">
                    <tr>
                        <th class="border-bottom-0 border-top-0"></th>
                        <th scope="col" class="text-primary text-center"> شنبه</th>
                        <th scope="col" class="text-primary text-center">یک شنبه</th>
                        <th scope="col" class="text-primary text-center">دوشنبه</th>
                        <th scope="col" class="text-primary text-center">سه شنبه</th>
                        <th scope="col" class="text-primary text-center">چهار شنبه</th>
                        <th scope="col" class="text-primary text-center">پنچ شنبه</th>
                        <th scope="col" class="text-primary text-center">جمعه</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--morning foods menus--}}
                    <tr>
                        <th class="border-top-0 text-primary">صبحانه</th>
                        @foreach($sat_mor as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                        @foreach($sun_mor as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach

                        @foreach($mon_mor as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                        @foreach($thu_mor as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                        @foreach($wed_mor as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                        @foreach($thur_mor as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                        @foreach($fri_mor as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                    </tr>
                    {{--lunch foods menu--}}
                    <tr>
                        <th class="border-top-0 text-primary">چاشت</th>
                        @foreach($sat_lun as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                        @foreach($sun_lun as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach

                        @foreach($mon_lun as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                        @foreach($thu_lun as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                        @foreach($wed_lun as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                        @foreach($thur_lun as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                        @foreach($fri_lun as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                    </tr>
                    {{-- neight foods menus --}}
                    <tr>
                        <th class="border-top-0 text-primary">شب</th>
                        @foreach($sat_nig as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                        @foreach($sun_nig as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach

                        @foreach($mon_nig as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                        @foreach($thu_nig as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                        @foreach($wed_nig as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                        @foreach($thur_nig as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                        @foreach($fri_nig as $t)
                            <td class="border text-center">{{$t->foods->name}}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
<b></b>
