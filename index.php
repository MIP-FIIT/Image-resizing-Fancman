<?php
  include('db.php');
  session_start();
  $session_id = '1';
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Image uploading and resizing site</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">

        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="jquery.form.js"></script>
    </head>
    <body>
        <div id='preview'>
        </div>
        <form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
        Upload image:
        <div id='imageloadstatus' style='display:none'><img src="loader.gif" alt="Uploading...."/></div>
        <div id='imageloadbutton'>
        <input type="file" name="photoimg" id="photoimg" />
        </div>
        </form>

        <script src="js/main.js"></script>
    </body>
</html>
