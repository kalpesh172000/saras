<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Saras Register</title>
    <link rel="stylesheet" href="login_register.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    if (isset($_POST['submit'])) {
        session_start(); 
        $_SESSION['regiErr'] = ""; 
        $db_host = 'localhost';
        $db_user = 'root';
        $db_password = '';
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
        $hashed_password = password_hash($pass2, PASSWORD_DEFAULT);

        if ($pass1 == $pass2) {

            $sql = "INSERT INTO users (full_name, username, email, phone_number, password, gender) VALUES (?,?,?,?,?,?)";
            $result = $conn->prepare($sql);
            $result->bind_param("sssdss", $name, $username, $email, $pno, $hashed_password, $gender);

            try {
                $result->execute();
                if ($result->affected_rows == 1) {
                    $_SESSION['registration_success'] = true;
                    unset($_SESSION['regiErr']);
                    $conn->close();
                    header("Location: login.html");
                    exit; // Add an exit to stop further script execution
                } 
            } catch (Exception $e) {
                
                $_SESSION['regiErr'] = "username is already taken"; 
            }
        }
    }
    ?>
    <div class="container">
        <div class="title">Register</div>
        <div class="content">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <br><br>
                <!-- ... (Previous HTML content) ... -->

                <!-- ... (Remaining HTML content) ... -->
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" name="uname" placeholder="Enter your username" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="number" name="pno" placeholder="Enter your number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="ps1" placeholder="Enter your password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" name="ps2" placeholder="Confirm your password" required>
                    </div>
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1" value="male">
                    <input type="radio" name="gender" id="dot-2" value="female">
                    <input type="radio" name="gender" id="dot-3" value="pn">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Prefer not to say</span>
                        </label>
                    </div>
                </div>
                <div>
                    <span><?php
                    if (isset($_SESSION['regiErr']))
                    {
                        echo " $_SESSION[regiErr] ";
                        unset($_SESSION['regiErr']);
                    }
                    ?></span>
                </div>
                <div class="button">
                    <input type="submit" name="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
    
</body>

</html>