<?php
include('db.php');

function tableExists($pdo, $table) // Function checks if table already exists
{
  try
  {
    $result = $pdo->query("SELECT 1 FROM $table LIMIT 1");
  }
  catch (Exception $e)
  {
    return FALSE;
  }
  return $result !== FALSE;
}

if(tableExists($db, "users") == FALSE) // If table doesnt exist create it
{
  $sql = file_get_contents('users.sql');

  if ($db->query($sql) === TRUE) {
      // Random user data
      $users = array(
        array("tomas", "12345", null),
        array("andrej", "123456", null),
        array("test", "123457", null),
        array("lojzo", "123458", null)
      );

      foreach ($users as $user) {
        try // Inserting users data into table
        {
          $stmt = $dbh->prepare("INSERT INTO users (username, password, profile_image) VALUES (:username, :password, :profile_image)");
          $stmt->bindParam(':username', $user[0]);
          $stmt->bindParam(':password', $user[1]);
          $stmt->bindParam(':profile_image', $user[2]);
          $stmt->execute();
        } catch (\Exception $e) {
          echo $e->getMessage();
        }

      }
  } else {
      echo "Error creating table: " . $db->error;
  }
  $db->close();
}
