function validateForm() {
    var flag = true;
    var name = document.getElementById('name').value;
    var username = document.getElementById('uname').value;
    var email = document.getElementById('email').value;
    var pno = document.getElementById('pno').value;
    var pass1 = document.getElementById('ps1').value;
    var pass2 = document.getElementById('ps2').value;
    var gender = document.querySelector('input[name="gender"]:checked');

    // Clear previous errors
    document.getElementById('fullNameErr').innerHTML = "";
    document.getElementById('usernameErr').innerHTML = "";
    document.getElementById('emailErr').innerHTML = "";
    document.getElementById('phoneErr').innerHTML = "";
    document.getElementById('passwordErr').innerHTML = "";
    document.getElementById('passwordMatchErr').innerHTML = "";
    document.getElementById('genderErr').innerHTML = "";

    if (name.length === 0) {
        document.getElementById('fullNameErr').innerHTML = "Full name is required";
        console.log("name");
        flag = false;
    }

    if (!/^[a-zA-Z ]{1,}$/.test(name)) {
        document.getElementById('fullNameErr').innerHTML = "Only alphabets are allowed in name";
        console.log("name");
        flag = false;
    }

    if (username.length === 0) {
        document.getElementById('usernameErr').innerHTML = "Username is required";
        console.log("username");
        flag = false;
    }

    if (!/^[a-zA-Z0-9#@_]*$/.test(username)) {
        document.getElementById('usernameErr').innerHTML = "Username should only contain a-z, A-Z, 0-9, #, @, _ ";
        console.log("username");
        flag = false;
    }

    if (!/^.{8,}$/.test(username)) {
        document.getElementById('usernameErr').innerHTML += "Username should be at least 8 characters in length";
        console.log("username");
        flag = false;
    }

    if (email === "") {
        document.getElementById('emailErr').innerHTML = "Email is required";
        console.log("email");
        return false;
    }

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        document.getElementById('emailErr').innerHTML = "Invalid email format";
        console.log("email");
        return false;
    }

    if (!gender) {
        document.getElementById('genderErr').innerHTML = "Gender is required";
        console.log("gender");
        flag = false;
    }

    if (pno === "") {
        document.getElementById('phoneErr').innerHTML = "Phone number is required";
        flag = false;
    }

    if (!/^\d{10}$/.test(pno)) {
        document.getElementById('phoneErr').innerHTML = "Phone number should contain exactly 10 digits";
        flag = false;
    }

    if (pass1 === "" || pass2 === "") {
        document.getElementById('passwordErr').innerHTML = "Both password fields are required";
        return false;
    }

    if (!/^[a-zA-Z0-9#@_]+$/.test(pass1)) {
        document.getElementById('passwordErr').innerHTML = "Password should only contain a-z, A-Z, 0-9, #, @, _";
        return false;
    }

    if (pass1.length < 8) {
        document.getElementById('passwordErr').innerHTML = "Password should be at least 8 characters long";
        return false;
    }
    
    if (pass1 !== pass2) {
        document.getElementById('passwordMatchErr').innerHTML = "Passwords didn't match with each other";
        return false;
    }
    return flag; 
}