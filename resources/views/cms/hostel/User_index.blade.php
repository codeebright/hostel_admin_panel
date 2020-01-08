@extends('layouts.master',['out_of_content' => true])
@section('title','ورایش حساب شخصی')
@section('out-of-content')
    <div class="m-content">
        <div class="row">

            @if($User && count($User))
                <div class="col-xl-12 col-lg-12">

                    <div class="m-portlet   ">
                        <div class="m-portlet__body">
                            <div class="m-card-profile">
                                <div class="m-card-profile__title m--hide">
                                    Your Profile
                                </div>
                                <div class="m-card-profile__pic">
                                    <div class="m-card-profile__pic-wrapper">
                                        <img src="assets/app/media/User/user4.jpg" alt="عکس پروفایل شما">
                                    </div>
                                </div>
                                <div class="m-card-profile__details">
                                    <span class="m-card-profile__name">{{$User->name}}</span>
                                    <a href="" class="m-card-profile__email m-link">{{$User->email}}</a>
                                </div>
                                <div class="m-card-profile__details">

                                    <span class="m-card-profile__email m-link">{{$User->phone_number}}</span>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions">
                                    <div class="row mt-4">
                                        <div class="col-2">
                                        </div>
                                        <div class="col-7">
                                            <a href="{{route('User.edit', $User->id)}}">
                                            <button  class="btn btn-accent m-btn m-btn--air m-btn--custom">ورایش پروفایل</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            @endif
            {{--<div class="col-xl-9 col-lg-8">--}}
                {{--<div class="m-portlet m-portlet--full-height m-portlet--tabs  ">--}}
                    {{--<div class="m-portlet__head">--}}
                        {{--<div class="m-portlet__head-tools">--}}
                            {{--<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">--}}
                                {{--<li class="nav-item m-tabs__item">--}}
                                    {{--<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">--}}
                                        {{--<i class="flaticon-share m--hide"></i>--}}
                                        {{--بروز رسانی پروفایل--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="m-portlet__head-tools">--}}
                            {{--<ul class="m-portlet__nav">--}}
                                {{--<li class="m-portlet__nav-item m-portlet__nav-item--last">--}}
                                    {{--<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">--}}
                                        {{--<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">--}}
                                            {{--<i class="la la-gear"></i>--}}
                                        {{--</a>--}}

                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="tab-content">--}}
                        {{--<div class="tab-pane active" id="m_user_profile_tab_1">--}}
                            {{--@include('cms.hostel.User_form')--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane " id="m_user_profile_tab_2">--}}
                        {{--</div>--}}
                        {{--<div class="tab-pane " id="m_user_profile_tab_3">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        </div>
    </div>
@endsection
