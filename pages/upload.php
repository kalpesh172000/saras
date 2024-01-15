<?php
      if(isset($_POST["submit"])){
          $check = getimagesize($_FILES["image"]["tmp_name"]);
          if($check !== false)
          {
            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            $db_host = 'localhost';
            $db_user = 'root';
            $db_password = '';
            $db_name = 'saras';

            $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $dataTime = date("Y-m-d H:i:s");

            //Insert image content into database
            $insert = $conn->query("INSERT into images (image, created) VALUES ('$imgContent', '$dataTime')");
            if($insert)
            {
                echo "File uploaded successfully.";
                header("Location: main.php");
            }else 
            {
                echo "File upload failed, please try again.";
                header("Location: upload.php");
            } 
        }else{
            echo "Please select an image file to upload.";
        }
    }
    ?>