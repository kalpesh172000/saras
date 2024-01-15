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
    <div class="container">
        <div class="title">Register</div>
        <div class="content">
            <form id='myform' onsubmit="return validateForm()" method="POST" action="register_validate.php">
                <br><br>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" id='name' name="name" placeholder="Enter your name" required>
                        <span class="error" id="fullNameErr"><?php 
                        session_name("register");
                        session_start();
                        
                        if (isset($_SESSION['header_redirect_flag']) && $_SESSION['header_redirect_flag'] === true) {
                        } else {
                            // Page loaded in a normal way
                            // Destroy and restart the session
                            session_destroy();
                            session_start();
                        }

                        // Set the flag for the next request
                        $_SESSION['header_redirect_flag'] = false;
                        echo $_SESSION["fullNameErr"]; ?> </span>
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" id='uname' name="uname" placeholder="Enter your username" required>
                        <span class="error" id="usernameErr"><?php echo $_SESSION["usernameErr"]; ?> </span>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" id='email' name="email" placeholder="Enter your email" required>
                        <span class="error" id="emailErr"><?php echo $_SESSION["emailErr"]; ?> </span>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="number" id='pno' name="pno" placeholder="Enter your number" required>
                        <span class="error" id="phoneErr"><?php echo $_SESSION["phoneErr"]; ?> </span>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" id='ps1' name="ps1" placeholder="Enter your password" required>
                        <span class="error" id="passwordErr"><?php echo $_SESSION["passwordErr"]; ?> </span>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" id='ps2' name="ps2" placeholder="Confirm your password" required>
                        <span class="error" id="passwordErr"><?php echo $_SESSION["passwordErr"]; ?> </span>
                        <span class="error" id="passwordMatchErr"><?php echo $_SESSION["passwordMatchErr"]; ?> </span>
                    </div>
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" id="dot-1" value="male" >
                    <input type="radio" name="gender" id="dot-2" value="female" >
                    <input type="radio" name="gender" id="dot-3" value="pn" >
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
                    <span class="error" id="genderErr" ><?php echo $_SESSION["genderErr"]; ?> </span>
                </div>
                <div>
                    <span><?php
                        echo $_SESSION["databaseErr"];
                    ?></span>
                </div>
                <div class="button">
                    <input type="submit" id='submit' name="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
    <script src="./register_validate.js"></script>
</body>
</html>