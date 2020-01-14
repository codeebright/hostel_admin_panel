<!-- Attachments Start-->
<div id="AttachmentModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header profile-head">
        <div class="m-portlet__head-caption">
          <div class="m-portlet__head-title">
            <h3 class="m-portlet__head-text">{{ trans('global.attachments') }}</h3>
          </div>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;
        </button>
      </div>
      <div class="attachment-div" id="attachment-div">

      </div>
      <div class="attachment-div">
        <div class="m-portlet__head">
          <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
              <h3 class="m-portlet__head-text">{{ trans('global.attachment_list') }}</h3>
            </div>
          </div>
        </div>
        <div id="pagination-div" class="mt-2 mb-2 m-scrollable" data-scrollable="true" data-height="350" data-mobile-height="200">
          <span id="content_modal"></span>
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
                    <td>{!! $item->filename !!}.{!! $item->extension !!}</td>
                    <td>
                       <a class="text-decoration-none" href="{{ route("DownloadAttachments",array(encrypt($item->id),$table)) }}"><i class="fa fa-download"></i></a> |
                       <a class="text-decoration-none" href="#" onclick="serverRequest('{{route('attachment.edit')}}','id={{encrypt($item->id)}}&&record_id={{encrypt($item->record_id)}}&&parent_id={{encrypt($item->parent_id)}}&&table={{encrypt($table)}}&&section={{encrypt($section)}}&&file_name={{$item->filename}}','POST','attachment-div')"><i class="fa fa-edit text-dark"></i></a> |
                       <a class="text-decoration-none" href="#" onclick="destroy('{{route('attachment.destroy')}}','table={{encrypt($table)}}&&record_id={{encrypt($item->id)}}','POST','content_modal','attachment_{{$item->id}}')"><i class="fa fa-trash text-danger"></i></a>
                    </td>

                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function store()
  {
    $('.error-div').html('');
    var formData = new FormData($("#attachmentForm")[0]);
    $.ajax({
        url: '{{ route("store_attachments") }}',
        data: formData,
        contentType: false,
        type: 'post',
        beforeSend: function()
        {
          $(".m-page-loader.m-page-loader--base").css("display","block"); // Initiliae the loader
        },
        success: function(response)
        {
          $('#file_name').val('');
          $('#file').val('');
          $('#file-label').html('');
          $('#pagination-div').html(response);
          // Hide the loader
          $(".m-page-loader.m-page-loader--base").css("display","none");
        },
        error: function (request, status, error) {
            json = $.parseJSON(request.responseText);
            $.each(json.errors, function(key, value){
                $('.'+key).show();
                $('.'+key).html('<span class="text-danger">'+value+'</span>');
            });
        },
        cache: false,
        processData: false
    });
  }
</script>
<!-- Attachments End-->
