// Call data from server side
function serverRequest(url,params,method,response_div)
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
      $(".m-page-loader.m-page-loader--base").css("display","none");
      $('#'+response_div).html(response);
      $(".datePicker").css('width','100%');
      @if($lang=="en")
        $(".datePicker").attr('type', 'date');
      @else
        $(".datePicker").persianDatepicker({cellWidth: 38, cellHeight: 28, fontSize: 11});
      @endif
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
