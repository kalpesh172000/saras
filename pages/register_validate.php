<?php
    session_name("register");
    session_start();
    $_SESSION["fullNameErr"] = "";
    $_SESSION["usernameErr"] = $_SESSION["emailErr"] = $_SESSION["passwordErr"] = $_SESSION["phoneErr"] = $_SESSION["passwordMatchErr"] = $_SESSION["genderErr"] = $_SESSION["databaseErr"] = "";
    $name = $username = $email = $pno = $pass1 = $pass2 = $gender = $hashed_password = "";
    
    function input_data($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


    if (isset($_POST['submit'])) {
        $_SESSION["fullNameErr"] = $_SESSION["usernameErr"] = $_SESSION["emailErr"] = $_SESSION["passwordErr"] = $_SESSION["phoneErr"] = $_SESSION["passwordMatchErr"] = $_SESSION["genderErr"] = $_SESSION["databaseErr"] = "";
        $name = $username = $email = $pno = $pass1 = $pass2 = $gender = $hashed_password = "";

        if(empty($_POST['name']))
        {
            $_SESSION["fullNameErr"] = "full name is required";
        }
        else 
        {
            $name = input_data($_POST['name']);
            if (!preg_match("/^[a-zA-Z ]{1,}$/", $name)) 
            {
			    $_SESSION["fullNameErr"] = "Only alphabets are allowed in name";
		    }
            else
            {
                $name = strtolower($name);
                $_SESSION["fullNameErr"] = "";
            }
        }
        
        if(empty($_POST['uname']))
        {
            $_SESSION["usernameErr"] = "username is required";
        }
        else 
        {
            $_SESSION["usernameErr"] = "";
            $username = input_data($_POST['uname']);
            if (!preg_match("/^[a-zA-Z0-9#@_]*$/", $username)) {
                // Invalid username
                $_SESSION["usernameErr"] = "Username should only contain a-z,A-Z,0-9,#,@,_";
            }
            else
            {
                $_SESSION["usernameErr"] = "";
            }
            if (!preg_match("/^.{8,}$/",$username))
            {
                //Invalid username
                $_SESSION["usernameErr"] = $_SESSION["usernameErr"] . "Username should be atleast 8 character in length";
            }
            else
            {
                $_SESSION["usernameErr"] = $_SESSION["usernameErr"] . "";
            }
        }


        if(empty($_POST['email']))
        {
            $_SESSION["emailErr"] = "Email is required";
        }
        else 
        {
            $email = input_data($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Invalid Email
                $_SESSION["emailErr"] = "Invalid Email";
            } else {
                //Valid Email
                $_SESSION["emailErr"] = "";
            }
        }        
        

        if(empty($_POST['pno']))
        {
            $_SESSION["phoneErr"] = "Phone number is required";
        }
        else 
        {
            $_SESSION["phoneErr"] = "";
            $pno = input_data($_POST['pno']);
            if (!preg_match("/^[0-9]{10}$/", $pno)) {
                // Invalid phone number
                $_SESSION["phoneErr"] = "Phone number should contain exactly 10 digits";
            } else {
                //valid number
                $_SESSION["phoneErr"] = "";
            }
        }

        if(empty($_POST['ps1']) || empty($_POST['ps2']))
        {
            $_SESSION["passwordErr"] = "both password fields are required";
        }
        else 
        {
            $pass1 = input_data($_POST['ps1']);
            $pass2 = input_data($_POST['ps2']);
            if($pass1 != $pass2)
            {
                $_SESSION["passwordMatchErr"] = "passwords didn't match with each other";
            }
            else
            {
                $_SESSION["passwordMatchErr"] = "";
            }
            if (!preg_match("/^[a-zA-Z0-9#@_]{8,}$/", $pass1)) {
                // Invalid password
                $_SESSION["passwordErr"] = "Password should only contain a-z,A-Z,0-9,#,@,_";
                $_SESSION["passwordMatchErr"] = "";
            } else {
                //valid Password
                $_SESSION["passwordErr"] = "";
            }
        }

        if(empty($_POST['gender']))
        {
            $_SESSION["genderErr"] = "gender is required";
        }
        else
        {
            $gender = $_POST['gender'];
            $_SESSION["genderErr"] = "";
        }
        
        if($_SESSION["fullNameErr"] == "" && $_SESSION["usernameErr"] ==  "" && $_SESSION["phoneErr"] == "" && $_SESSION["emailErr"] == "" && $_SESSION["passwordErr"] == "" && $_SESSION["passwordMatchErr"] == "" && $_SESSION["genderErr"] == "")
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
                        $_SESSION["databaseErr"] = "";
                        $_SESSION['registration_success'] = true;
                        $conn->close();
                        header("Location: login.html");
                        exit; // Add an exit to stop further script execution
                    }
                    else
                    {
                        $_SESSION["databaseErr"] = "username/email is already taken";
                    }
                } catch (Exception $e) {
                    $_SESSION["databaseErr"] = "username/email is already taken";
                }
            }
            $conn ->close();
        }
        $_SESSION['header_redirect_flag'] = true;
        header("Location: registration.php");
    }
    ?>