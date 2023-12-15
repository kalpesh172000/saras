<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>Saras Register</title>
    <link rel="stylesheet" href="../css/login_register.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
		.error {
			color: #FF0001;
		}
	</style>
</head>

<body>
    <?php
    
    function input_data($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


    if (isset($_POST['submit'])) {
        $fullNameErr = $usernameErr = $emailErr = $passwordErr = $phoneErr = $passwordMatchErr = $genderErr = $databaseErr = "";
        $name = $username = $email = $pno = $pass1 = $pass2 = $gender = $hashed_password = "";

        if(empty($_POST['name']))
        {
            $fullNameErr = "full name is required";
        }
        else 
        {
            $name = input_data($_POST['name']);
            if (!preg_match("/^[a-zA-Z ]{1,}$/", $name)) 
            {
			    $fullNameErr = "Only alphabets are allowed in name";
		    }
            else
            {
                $name = strtolower($name);
                $fullNameErr = "";
            }
        }
        
        if(empty($_POST['uname']))
        {
            $usernameErr = "username is required";
        }
        else 
        {
            $usernameErr = "";
            $username = input_data($_POST['uname']);
            if (!preg_match("/^[a-zA-Z0-9#@_]*$/", $username)) {
                // Invalid username
                $usernameErr = "Username should only contain a-z,A-Z,0-9,#,@,_";
            } else if (!preg_match("/^{8,0}$/",$username))
            {
                //Invalid username
                $usernameErr = "Username should be atleast 8 character in length";
            }
            else
            {
                $usernameErr = "";
            }
        }
        if(empty($_POST['email']))
        {
            $emailErr = "Email is required";
        }
        else 
        {
            $email = input_data($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Invalid Email
                $emailErr = "Invalid Email";
            } else {
                //Valid Email
                $emailErr = "";
            }
        }
        
        if(empty($_POST['pno']))
        {
            $phoneErr = "Phone number is required";
        }
        else 
        {
            $pno = input_data($_POST['name']);
            if (!preg_match("/^[0-9]{10,10}$/", $pno)) {
                // Invalid phone  number
                $phoneErr = "Phone number should contain exact 10 digits";
            } else {
                //valid number
                $phoneErr = "";
            }
        }

        if(empty($_POST['ps1']) || empty($_POST['ps2']))
        {
            $passwordErr = "both password fields are required";
        }
        else 
        {
            $pass1 = input_data($_POST['ps1']);
            $pass2 = input_data($_POST['ps2']);
            if($pass1 != $pass2)
            {
                $passwordMatchErr = "passwords didn't match with each other";
            }
            else
            {
                $passwordMatchErr = "";
            }
            if (!preg_match("/^[a-zA-Z0-9#@_]{8,}$/", $pass1)) {
                // Invalid password
                $passwordErr = "Password should only contain a-z,A-Z,0-9,#,@,_";
                $passwordMatchErr = "";
            } else {
                //valid Password
                $passwordErr = "";
            }
        }

        if(empty($_POST['gender']))
        {
            $genderErr = "gender is required";
        }
        
        if($fullNameErr == "" && $usernameErr ==  "" && $phoneErr == "" && $emailErr == "" && $passwordErr == "" && $passwordMatchErr == "" && $genderErr == "")
        {
            $_SESSION['regiErr'] = ""; 
            $db_host = 'localhost';
            $db_user = 'root';
            $db_password = '';
            $db_name = 'saras';

            $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            //hashing the password for extra protection 
            $hashed_password = password_hash($pass2, PASSWORD_DEFAULT);

            if ($pass1 == $pass2) {

                $sql = "INSERT INTO users (full_name, username, email, phone_number, password, gender) VALUES (?,?,?,?,?,?)";
                $result = $conn->prepare($sql);
                $result->bind_param("sssdss", $name, $username, $email, $pno, $hashed_password, $gender);

                try {
                    $result->execute();
                    if ($result->affected_rows == 1) {
                        echo "helowro";
                        $databaseErr = "";
                        $_SESSION['registration_success'] = true;
                        $conn->close();
                        header("Location: login.html");
                        exit; // Add an exit to stop further script execution
                    }
                    else
                    {
                        $databaseErr = "username/email is already taken";
                    }
                } catch (Exception $e) {
                    echo "hellow"; 
                    $databaseErr = "username/email is already taken";
                }
            }
            $conn ->close();
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
                        <span class="error"><?php echo $fullNameErr; ?> </span>
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" name="uname" placeholder="Enter your username" required>
                        <span class="error"><?php echo $usernameErr; ?> </span>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" placeholder="Enter your email" required>
                        <span class="error"><?php echo $emailErr; ?> </span>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="number" name="pno" placeholder="Enter your number" required>
                        <span class="error"><?php echo $phoneErr; ?> </span>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="ps1" placeholder="Enter your password" required>
                        <span class="error"><?php echo $passwordErr; ?> </span>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" name="ps2" placeholder="Confirm your password" required>
                        <span class="error"><?php echo $passwordErr; ?> </span>
                        <span class="error"><?php echo $passwordMatchErr; ?> </span>
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
                    <span class="error"><?php echo $genderErr; ?> </span>
                </div>
                <div>
                    <span><?php
                        echo $databaseErr;
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