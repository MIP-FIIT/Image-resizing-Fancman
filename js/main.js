$(document).ready(function(){
  $('body').on('change','#photoimg', function(){
    var imgLoadStatus = $("#imageloadstatus");
    var imgLoadBtn = $("#imageloadbutton");

    $("#imageform").ajaxForm({target: '#preview',
      beforeSubmit:function(){
        swapVisibility(imgLoadStatus, imgLoadBtn);
      },
      success:function(){
        swapVisibility(imgLoadStatus, imgLoadBtn);
      },
      error:function(){
        swapVisibility(imgLoadStatus, imgLoadBtn);
      } }).submit();
    });
});

function swapVisibility(a, b){
  a.show();
  b.hide();
}
