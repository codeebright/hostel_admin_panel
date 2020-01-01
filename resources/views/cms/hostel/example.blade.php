
@extends('layouts.master')
@section('title','تنظیمات اتاق')
@section('content')
<!--
    <h3 class="jumbotron"></h3>
    <form method="post" action="{{url('hostel/photos')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
        @csrf
    </form>
 -->

<!-- <style type="text/css">
    .main-section{
        margin: 0 auto;
        padding: 20px;
        margin-top: 100px;
        background-color: #fff;
        box-shadow: 0 0 20px #c1c1c1 ;
    }

</style>


<div class="bg-info">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 main-section">
                <h1>emage upload</h1>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <input type="file" id ="file-1" multiple class="file" data-overwrite-initial = "false"
                    data-min-file-count="3">
                </div>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
     $('#file-1').fileinput({
        theme: 'fa',
         uploadUrl:"/hostel/photos",
         uploadExtraData:function () {

            return{
                _token:$('input[name="_token"]').val()
            };
         },
         acceptedFiles: ".jpeg,.jpg,.png,.gif",
         addRemoveLinks: true,
         overwriteInitial:false,
         maxFilesize:2000,
         maxFileNum:8,
         timeout: 50000,
         slugCallback:function (filename) {
            return filename.replace('(','_').replace(']', '_');

         }

     });
</script> -->



@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-2"><img src="/32114.svg" width="80"/></div>
        <div class="col-md-8"><h2>Laravel Multiple File Uploading With Bootstrap Form</h2>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
w            <form action="/multiuploads" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="Product Name">Product Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Product Name">
                </div>
                <label for="Product Name">Product photos (can attach more than one):</label>
                <br/>
                <input type="file" class="form-control" name="photos[]" multiple/>
                <br/><br/>
                <input type="submit" class="btn btn-primary" value="Upload"/>
            </form>
        </div>
    </div>
</div>



@endsection
