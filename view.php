<?php
  if(!empty($_GET['id'])){
      //DB details
      $db_host = 'localhost';
      $db_user = 'muskan';
      $db_password = 'saras123';
      $db_name = 'saras';

      $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

     //Get image data from database
     $result = $db->query("SELECT image FROM images WHERE id = {$_GET['id']}");

     if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();

        //Render image
        header("Content-type: image/jpg"); 
        echo $imgData['image']; 
    }
    else{
        echo 'Image not found...';
    }
   }
  ?>