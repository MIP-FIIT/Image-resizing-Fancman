<?php
function compressImage($extension, $uploadedfile, $path, $actual_image_name, $newwidth)
{
  if($extension=="jpg" || $extension=="jpeg" )
  {
    $src = imagecreatefromjpeg($uploadedfile);
  }
  else if($extension == "png")
  {
    $src = imagecreatefrompng($uploadedfile);
  }
  else if($extension == "gif")
  {
    $src = imagecreatefromgif($uploadedfile);
  }
  else
  {
    $src = imagecreatefrombmp($uploadedfile);
  }

  list($width,$height) = getimagesize($uploadedfile);
  $newheight = ($height/$width) * $newwidth;
  $tmp = imagecreatetruecolor($newwidth, $newheight);
  imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
  $filename = $path.$newwidth . '_' . $actual_image_name;
  imagejpeg($tmp, $filename, 100);
  imagedestroy($tmp);
  return $filename;
}
?>
