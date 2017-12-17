<?php
include('db.php');
session_start();
$session_id = '1';  // User session id.
$path = "uploads/"; // Images folder path.

$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
// If there is any POST request
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
  include_once 'includes/getExtension.php';

  $imagename = $_FILES['photoimg']['name'];
  $size = $_FILES['photoimg']['size'];
  if(strlen($imagename))
  {
    $extension = strtolower(getExtension($imagename));
    if(in_array($extension, $valid_formats))
    {
      if($size < (1024*1024)) // Image size max 1 MB.
      {
        $actual_image_name = time() . $session_id . "." . $extension;
        $uploadedfile = $_FILES['photoimg']['tmp_name'];

        // Re-sizing image.
        include 'includes/compressImage.php';
        $widthArray = array(200, 100, 50);  // Image dimensions.
        foreach($widthArray as $newwidth)   // Compressing images and echoing them on page
        {
          $filename = compressImage($extension, $uploadedfile, $path, $actual_image_name, $newwidth);
          echo "<img src='".$filename."' class='img'/>";
        }

        if(move_uploaded_file($uploadedfile, $path.$actual_image_name))
        {
          //Insert upload image files names into user_uploads table
          try
          {
            $sql = "UPDATE users SET profile_image='$actual_image_name' WHERE uid='$session_id';"
            $stmt = $conn->prepare($sql);
            // Execute the query
            $stmt->execute();
            // Show image on page
            echo "<img src='uploads/".$actual_image_name."' class='preview'>";
         }
         catch(PDOException $e)
         {
           echo $sql . "<br>" . $e->getMessage();
         }
        }
        else
          echo "Uploading failed.";
      }
      else
        echo "Image file max size is 1 MB";
    }
    else
      echo "Invalid file format.";
  }
  else
    echo "You didn't select any image.";
  exit;
}
?>
