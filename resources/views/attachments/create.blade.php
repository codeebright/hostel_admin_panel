    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
        <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">{{ trans('global.attachment_add') }}</h3>
        </div>
        </div>
        <div class="m-portlet__head-tools">
        <ul class="m-portlet__nav">
            <li class="m-portlet__nav-item">
            <a class="btn btn-default btn-sm border-dark" id="collapsBtn" data-toggle="collapse" href="#collapseDiv" role="button" aria-expanded="false" aria-controls="collapseDiv"><i class="la la-arrows-v"></i></a>
            </li>
        </ul>
        </div>
    </div>
    <div class="code notranslate cssHigh collapse" id="collapseDiv">
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" enctype="multipart/form-data" id="attachmentForm" method="post">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td scope="col" width="20%"><h5 class="font-weight-bold">{{ trans('global.name') }} <span style="color:red;">*</span></h5></td>
                <td>
                <input class="form-control m-input errorDiv" type="text" name="file_name" id="file_name" required>
                <div class="file_name error-div" style="display:none;"></div>
                </td>
            </tr>
            <tr>
                <td scope="col" width="20%"><h5 class="font-weight-bold">{{ trans('global.attachment') }} <span style="color:red;">*</span></h5></td>
                <td>
                <div class="custom-file" id="">
                    <input type="file" class="custom-file-input errorDiv" name="file" id="file" onchange="chooseFile(this.id)" required>
                    <label class="custom-file-label" id="file-label" for="file">{{ trans('global.att_choose') }}</label>
                </div>
                <div class="file error-div" style="display:none;"></div>
                <span class="m-form__help small" style="">{{ trans('global.file_extention') }}</span>
                </td>
            </tr>
            </tbody>
        </table>
        <input type="hidden" name="hostel_id" value="{{$hostel_id}}"/>
        <input type="hidden" name="table" value="{!!$table!!}"/>
        <input type="hidden" name="room_id" value="{{$room_id}}">
        <div class="col-lg-12">
            <div class="m-form__actions">
                <button type="button" onclick="store();" class="btn btn-primary">{{ trans('global.submit') }}</button>
                <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary">{{ trans('global.cancel') }}</button>
            </div>
        </div>
        </form>
        <!--end::Form-->
    </div>
