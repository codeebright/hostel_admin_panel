@extends('layout_front.mainlayout')
@section('content')
<!-- Room-Detail -->
<div class="container">
    <section class="container r-detail mt-5 pb-5">
        <div class="row">
            <div class="col-md-12 col-lg-8 px-2 ">
                <div class="card card-shadow c-radius">
                    <div>
                        <img src="/assets-/app/media/img/blog/rooms_img/{{$details->file_name}}" alt=""
                             style="width: 100%; height: 280px;">
                    </div>
                </div>
            </div>
            <!-- Sticky -->
            <div class=" col-12 col-md-10 col-lg-4 sticky">
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
                               <button type="submit" class="btn btn-outline-dark pl-3 pr-3 pt-2 pb-2">اتاق را پسندیدم</button>
                               {{--{{ flash('hello world') }}--}}
                           </div>
                           <input type="hidden" name="hostel_id" value="{{$hostel->id}}"/>
                           <input type="hidden" name="room_id" value="{{$room->id}}">
                        </form>
                    </div>  <!-- End-card-body-->
                </div>
            </div>
            <!-- End-sticky -->
            {{--descriptions--}}
            <div class="col-md-8 p-0  pr-4">
                <h5 class="mt-5 mb-2">توضیحات</h5>
                <p class="" style="color: #6c757d">
                    {{ $room->room_description }}
                </p>
            </div>

            <!-- view -->
            <div class="col-md-4 mt-5">
                <div class="row">
                    <div class="col-md-4 mt-1">
                        <div class="fa fa-star" style="color: #00a69a"></div>
                        <div class="fa fa-star" style="color: #00a69a"></div>
                        <div class="fa fa-star" style="color: #00a69a"></div>
                        <div class="fa fa-star" style="color: #00a69a"></div>
                        <div class="fa fa-star" style="color: #00a69a"></div>
                    </div>
                    <div class="p-1" style="background-color: #00a69a;  font-size: 15px">4.7</div>
                </div>
            </div>
            <!-- End-view -->

            {{-- facilities--}}
            <div class="col-md-8 mt-5 p-0">
                <header class="txt-line mb-4"><span class=""></span><h5>امکانات</h5></header>
                <div class="row posts">
                    <div class="col-md-8">
                        <article class="post">
                            <div class="info">
                                <table class="table border-0">
                                    <thead>
                                    <tr>

                                @foreach($hostel->facility->take(5) as $facility)
                                   <th scope="col"> <div class="mb-1"> {{ $facility->facility_name }} </div></th>
                                @endforeach
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </article>
                    </div>
                </div>
                {{-- charachterstics --}}
                <header class="txt-line mb-3"><span class=""></span><h5>مشخصات</h5></header>
                <div class="row posts ">
                    <div class="col-md-6">
                        <article class="post">
                            <div class="info">
                                <div class="mb-1">مساحت : {{ $room->area}} </div>
  <div class="mb-1">Id : {{ $room->id}} </div>
                                <div class="mb-1">گنجایش اطاق : {{ $room->total_bed}} نفر</div>
                                <div class="mb-1">بستر خالی : {{ $room->empty_bed}} </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-md-6">
                        <div class="info pl-3">
                            <div class="mb-1">قیمت اطاق : {{ $room->room_rent}} افغانی </div>
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
        </div>
    </section>
    <a class="mb-1" href="{{ route('hostel_details',$hostel->id) }}"
       style="color: #0a6aa1; font-size: 18px;">
         در مورد لیلیه بیشتر بدانید<span class="ml-2 fa fa-angle-double-left"></span>
    </a>
</div>

@endsection
