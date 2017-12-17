<?php
function getExtension($str)
{
  $dotPosition = strrpos($str,".");
  if (!$dotPosition)
  {
    return "";
  }
  $extensionLenght = strlen($str) - $dotPosition;
  return substr($str,$dotPosition + 1, $extensionLenght);
}
