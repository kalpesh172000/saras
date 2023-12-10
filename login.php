<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = '';
    $db_name = 'saras';

    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['uname'];
    $password = $_POST['ps'];

    header("Location: main.php");
} else {
    // Handle cases where the form was not submitted.
    header("Location: login.html");
}
?>
