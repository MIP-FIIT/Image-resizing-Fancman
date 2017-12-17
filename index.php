<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="jquery.form.js"></script>
<script type="text/javascript">
$(document).ready(function()
{

$('body').on('change','#photoimg', function()
 {
var A=$("#imageloadstatus");
var B=$("#imageloadbutton");

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
</script>
<?php
include('db.php');
session_start();
$session_id='1';
?>
<div id='preview'>
</div>
<form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
Upload image:
<div id='imageloadstatus' style='display:none'><img src="loader.gif" alt="Uploading...."/></div>
<div id='imageloadbutton'>
<input type="file" name="photoimg" id="photoimg" />

</div>
</form>
