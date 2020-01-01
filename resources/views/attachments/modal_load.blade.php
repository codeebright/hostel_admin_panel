 <span id="content_modal">
    <div class="m-alert m-alert--icon m-alert--outline alert alert-success alert-dismissible fade show col-lg-12" role="alert">
        <div class="m-alert__icon"><i class="la la-check-square"></i></div>
        <div class="m-alert__text">{!! __("global.success_att_msg") !!}</div>
        <div class="m-alert__close"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button></div>
    </div>
</span>
<table class="table table-bordered">
    <thead>
        <tr class="bg-light">
            <th scope="col" width="10%">{{ trans('global.number') }}</th>
            <th scope="col" width="70%">{{ trans('global.name') }}</th>
            <th scope="col" width="20%">{{ trans('global.opreation') }}</th>
        </tr>
    </thead>
    <tbody>
        @if($attachments)
            @foreach($attachments as $item)
                <tr id="attachment_{{$item->id}}">
                    <td>{!! $item->id !!}</td>
                    <td>{!! $item->file_name !!}</td>
                    <td>
                           <a class="text-decoration-none" href="{{ route("DownloadAttachments",array(encrypt($item->id),decrypt($table))) }}"><i class="fa fa-download"></i></a> |
                           <a class="text-decoration-none" href="#" onclick="serverRequest('{{route('attachment.edit')}}','id={{encrypt($item->id)}}&&room_id={{encrypt($item->room_id)}}&&hostel_id={{encrypt($item->hostel_id)}}&&table={{$table}}&&file_name={{$item->file_name}}','POST','attachment-div')"><i class="fa fa-edit text-dark"></i></a> |
                           <a class="text-decoration-none" href="#" onclick="destroy('{{route('attachment.destroy')}}','table={{$table}}&&record_id={{encrypt($item->id)}}','POST','content_modal','attachment_{{$item->id}}')"><i class="fa fa-trash text-danger"></i></a> 
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>