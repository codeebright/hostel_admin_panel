<script>
// Call data from server side
function serverRequest(url,params,method,response_div)
{
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$.ajax({
  url: url,
  data:params,
  type:method,
  beforeSend: function()
  {
    // $(".m-page-loader.m-page-loader--base").css("display","block");
    $("#"+response_div).html('<span style="float:center;"><img alt="" src="/img/loader.gif)" /></span>');
  },
  success: function(response)
  {
    $(".m-page-loader.m-page-loader--base").css("display","none");
    $('#'+response_div).html(response);
    $(".datePicker").css('width','100%');
  },
  error: function (request, status, error) {
      json = $.parseJSON(request.responseText);
      $.each(json.errors, function(key, value){
          $('.'+key).show();
          $('.'+key).html('<span class="text-danger">'+value+'</span>');
          $('#'+key).css('border-bottom','1px solid #dc3545');
      });
  },
  cache: false,
  processData: false
})
}


function destroy(url,params,method,response_div,removed_id)
{
swal({
    text: "{{trans('global.conf_msg')}}",
    icon: "success",
    type: "question",
    confirmButtonText: "<span>{{trans('global.yes')}}</span>",
    confirmButtonClass: "btn btn-danger m-btn btn-sm m-btn--icon",
    showCancelButton: !0,
    cancelButtonText: "<span><span>{{trans('global.no')}}</span></span>",
    cancelButtonClass: "btn btn-secondary btn-sm m-btn--icon"
}).then(function (e) {
    e.value && deleteRecord(url,params,method,response_div,removed_id);
});
}

// Delete Records
function deleteRecord(url,params,method,response_div,removed_id)
{
$.ajax({
    url : url,
    data: params,
    type: method,
    beforeSend: function(){
      $('#'+response_div).html('<span style="float:center;"><img alt="" src="{!!asset('img/loader.gif')!!}" /></span>');
    },
    success: function(response)
    {
      if(removed_id!='')
      {
        $('#'+removed_id).slideUp();
      }
      $('#'+response_div).html(response);
    }
});
}

// Pass result to the function form server side
function serverRequestResponse(url,params,method,response_div,nameOfFucntion)
{
$.ajax({
  url: url,
  data:params,
  type:method,
   beforeSend: function()
  {
     $(".m-page-loader.m-page-loader--base").css("display","block");
    // $("#"+response_div).html('<span style="float:center;"><img alt="" src="{!!asset('img/loader.gif')!!}" /></span>');
  },
  success: function(response)
  {
    //return console.log(response);
    nameOfFucntion(response);
  },
  error: function (request, status, error) {
    json = $.parseJSON(request.responseText);
    $.each(json.errors, function(key, value){
      $('.'+key).show();
      $('.'+key).html('<span class="text-danger">'+value+'</span>');
      $('#'+key).css('border-bottom','1px solid #dc3545');
    });
  },
  cache: false,
  processData: false,
  contentType: false,
})
}


/*
*
* Load both the create and specific Attachments
*/
function loadCreateAttachments(url,params,method,response_div,attach_rep_div,load_attachment_url)
{
serverRequest(url,params,method,response_div);
serverRequest(load_attachment_url,params,method,attach_rep_div);

}


</script>
