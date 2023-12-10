<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
  $db_host = 'localhost';
  $db_user = 'muskan';
  $db_password = 'saras123';
  $db_name = 'saras';

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $pno = $_POST['pno'];
    $pass1 = $_POST['ps1'];
    $pass2 = $_POST['ps2'];
    $gender = $_POST['gender'];

    if ($pass1 == $pass2) {
        $sql = "INSERT INTO users (fname, uname, email, pno, pass, gender) VALUES (?,?,?,?,?,?)";
        $result = $conn->prepare($sql);
        $result->bind_param("sssdss", $name, $username, $email, $pno, $pass2, $gender);

        if ($result->execute()) {
            $_SESSION['registration_success'] = true;
            header("Location: login.html");
            exit; // Add an exit to stop further script execution
        } else {
            $_SESSION['registration_error'] = "Registration failed. Please try again.";
            header("Location: register.php");
            exit; // Add an exit to stop further script execution
        }
    }
}
?>