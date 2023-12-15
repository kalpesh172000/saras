<?php

$usernameErr = $passwordErr = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty($_POST["uname"])) {
        $usernameErr = "Username is required";
    } else {
        $usernameErr = "";
        $username = input_data($_POST["uname"]);
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $usernameErr = "Only a-z, A-Z, and 0-9 are allowed.";
        }
    }

    // Validate password
    if (empty($_POST["ps"])) {
        $passwordErr = "Password is required";
    } else {
        $passwordErr = "";
        $password = input_data($_POST["ps"]);
    }

    // Check for errors
    if ($usernameErr || $passwordErr) {
        // Display errors on the same page
        echo "<form><h3>Username: $usernameErr</h3><h3>Password: $passwordErr</h3></form>";
    } else {
        // Perform login logic (with prepared statements)
        $db_host = 'localhost';
        $db_user = 'root';
        $db_password = '';
        $db_name = 'saras';

        $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                session_start();
                $_SESSION['logged_user'] = $username;
                header("Location: main.php");
                exit;
            } else {
                echo "<form><h3>Incorrect Password</h3></form>";
            }
        } else {
            echo "<form><h3>Username does not exist</h3></form>";
        }
    }
}

function input_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
