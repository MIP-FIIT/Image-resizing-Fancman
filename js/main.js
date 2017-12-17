$(document).ready(function(){
  $('body').on('change','#photoimg', function(){
  var A = $("#imageloadstatus");
  var B = $("#imageloadbutton");

  $("#imageform").ajaxForm({target: '#preview',
    beforeSubmit:function(){
      A.show();
      B.hide();
    },
    success:function(){
      A.hide();
      B.show();
    },
    error:function(){
      A.hide();
      B.show();
    } }).submit();
  });
});
