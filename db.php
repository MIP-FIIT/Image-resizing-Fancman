<?php
// Database creditials
$servername = "localhost";
$username = "username";
$password = "password";
// Connecting into database
try
{
  $db = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
  // Set the PDO error mode to exception
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
}
catch(PDOException $e)
{
  echo "Connection failed: " . $e->getMessage();
}
