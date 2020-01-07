@extends('layouts.master')
@section('title', 'جدول ')
@section('content')

        <form class="m-form m-form--fit m-form--label-align-right" method="post" action="{{route('food.store')}}">
            @csrf
            <div class="m-portlet__body">
                <div class="form-group  row">
                    <label class="col-form-label col-lg-2 col-sm-12 mt-2">صبح هنگام</label>
                    <div class="form-group  pr-1 ">
                        <label for="exampleInputEmail1 " class="mb-2 pl-2">شنبه</label>
                        <div></div>
                        <select class="form-control m-select2" name="1_1" id="m_select2_2_1" style="width: 130px">
                            <option selected="">صبح</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <label for="exampleInputEmail1 " class="mb-2 pl-2">یک شبنه</label>
                        <div></div>
                        <select class="form-control m-select2" name="1_2" id="m_select2_2_2" style="width: 130px">
                            <option selected="">انتخاب کنید</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <label for="exampleInputEmail1 " class="mb-2 pl-2">دو شبنه</label>
                        <div></div>
                        <select class="form-control m-select2" name="1_3" id="m_select2_2_3" style="width: 130px">
                            <option selected="">صبح</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <label for="exampleInputEmail1 " class="mb-2 pl-2">سه شنبه</label>
                        <div></div>
                        <select class="form-control m-select2" name="1_4" id="m_select2_2_4" style="width: 130px">
                            <option selected="">صبح</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <label for="exampleInputEmail1 " class="mb-2 pl-2">چهار شنبه</label>
                        <div></div>
                        <select class="form-control m-select2" name="1_5" id="m_select2_2_5" style="width: 130px">
                            <option selected="">صبح</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <label for="exampleInputEmail1 " class="mb-2 pl-2">پنج شنبه</label>
                        <div></div>
                        <select class="form-control m-select2" name="1_6" id="m_select2_2_6" style="width: 130px">
                            <option selected="">صبح</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach>
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <label for="exampleInputEmail1 " class="mb-2 pl-2">جمعه</label>
                        <div></div>
                        <select class="form-control m-select2" name="1_7" id="m_select2_2_7" style="width: 130px">
                            <option selected="">صبح</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-form-label col-lg-2 col-sm-12 ">چاشت</label>
                    <div class="form-group  pr-1 ">
                        <div></div>
                        <select class="form-control m-select2" name="2_1" id="m_select2_2_8" style="width: 130px">
                            <option selected="">چاشت</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <div></div>
                        <select class="form-control m-select2" name="2_2" id="m_select2_2_9" style="width: 130px">
                            <option selected="">چاشت</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <div></div>
                        <select class="form-control m-select2" name="2_3" id="m_select2_2_10" style="width: 130px">
                            <option selected="">چاشت</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <div></div>
                        <select class="form-control m-select2" name="2_4" id="m_select2_2_11" style="width: 130px">
                            <option selected="">چاشت</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <div></div>
                        <select class="form-control m-select2" name="2_5" id="m_select2_2_12" style="width: 130px">
                            <option selected="">چاشت</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <div></div>
                        <select class="form-control m-select2" name="2_6" id="m_select2_2_13" style="width: 130px">
                            <option selected="">چاشت</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <div></div>
                        <select class="form-control m-select2" name="2_7" id="m_select2_2_14" style="width: 130px">
                            <option selected="">چاشت</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group  row">
                    <label class="col-form-label col-lg-2 col-sm-12">شام</label>
                    <div class="form-group  pr-1 ">
                        <div></div>
                        <select class="form-control m-select2" name="3_1" id="m_select2_2_15" style="width: 130px">
                            <option selected="">شام</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <div></div>
                        <select class="form-control m-select2" name="3_2" id="m_select2_2_16" style="width: 130px">
                            <option selected="">شام</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <div></div>
                        <select class="form-control m-select2" name="3_3" id="m_select2_2_17" style="width: 130px">
                            <option selected="">شام</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <div></div>
                        <select class="form-control m-select2" name="3_4" id="m_select2_2_18" style="width: 130px">
                            <option selected="">شام</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <div></div>
                        <select class="form-control m-select2" name="3_5" id="m_select2_2_19" style="width: 130px">
                            <option selected="">شام</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <div></div>
                        <select class="form-control m-select2" name="3_6" id="m_select2_2_20" style="width: 130px">
                            <option selected="">شام</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group  pr-1 ">
                        <div></div>
                        <select class="form-control m-select2" name="3_7" id="m_select2_2_21" style="width: 130px">
                            <option selected="">شام</option>
                            @foreach($foods as $food)
                                <option value="{{$food->id}}">{{$food->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="m-portlet__foot m-portlet__foot--fit mb-5">
                    <div class="m-form__actions pull-left">
                        <button type="submit" class="btn btn-primary">ذخیره</button>
                        <button type="reset" href="{{url()->previous()}}" class="btn btn-secondary">لغوه</button>
                    </div>
                </div>

            </div>
        </form>

        <div class="m-portlet__body">

            <!--begin::Section-->
            <div class="m-section">
                <div class="m-section__content">
                    <table class="table table-striped m-table">
                        <thead>
                        <tr>
                            <th>ایام هفته</th>
                            <th>صبح</th>
                            <th>چاشت</th>
                            <th>شام</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">شنبه</th>
                            <td>{{ organizeFoodMenue($food_menue,'sat','mor') }}</td>
                            <td>{{ organizeFoodMenue($food_menue,'sat','lun') }}</td>
                            <td>{{ organizeFoodMenue($food_menue,'sat','din') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">یک شنبه</th>
                            <td>{{ organizeFoodMenue($food_menue,'sun','mor') }}</td>
                            <td>{{ organizeFoodMenue($food_menue,'sun','lun') }}</td>
                            <td>{{ organizeFoodMenue($food_menue,'sun','din') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">دو شنبه</th>
                            <td>{{ organizeFoodMenue($food_menue,'mon','mor') }}</td>
                            <td>{{ organizeFoodMenue($food_menue,'mon','lun') }}</td>
                            <td>{{ organizeFoodMenue($food_menue,'mon','din') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">سه شنبه</th>
                            <td>{{ organizeFoodMenue($food_menue,'thu','mor') }}</td>
                            <td>{{ organizeFoodMenue($food_menue,'thu','lun') }}</td>
                            <td>{{ organizeFoodMenue($food_menue,'thu','din') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">چهارشنبه</th>
                            <td>{{ organizeFoodMenue($food_menue,'wen','mor') }}</td>
                            <td>{{ organizeFoodMenue($food_menue,'wen','lun') }}</td>
                            <td>{{ organizeFoodMenue($food_menue,'wen','din') }}</td>
                        </tr>
                        <tr>
                            <th scope="row">پنج شنبه</th>
                            <td>{{ organizeFoodMenue($food_menue,'thr','mor') }}</td>
                            <td>{{ organizeFoodMenue($food_menue,'thr','lun') }}</td>
                            <td>{{ organizeFoodMenue($food_menue,'thr','din') }}</td>
                        </tr>
                        <tr>
                            <th scope="row"><b>جمعه</b></th>
                            <td>{{ organizeFoodMenue($food_menue,'fri','mor') }}</td>
                            <td>{{ organizeFoodMenue($food_menue,'fri','lun') }}</td>
                            <td>{{ organizeFoodMenue($food_menue,'fri','din') }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="m-portlet__foot m-portlet__foot--fit mb-5">
                <div class="m-form__actions pull-left">
                    <a href="{{route('food.edit',$hostel_id)}}" class="btn btn-primary">ویرایش</a>
                </div>
            </div>


        <div class="m-portlet__foot m-portlet__foot--fit mb-5">
            <div class="m-form__actions pull-left">
                <button type="submit" class="btn btn-primary">ذخیره</button>
                <button type="reset" href="{{url()->previous()}}" class="btn btn-secondary">لغوه</button>
            </div>
        </div>

    </div>
</form>

@endif
@endsection
