<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="main.css" rel="stylesheet">
</head>
<body>
<form method="post">    
<center>
        <div class="container">
            <div class="row">
                <br>
                <label class="animate-charcter">SARAS</label>
            </div>
        </div>
    </center>
    <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="profile.php">Profile</a>
    <a href="new_craft.php">New Craft</a>
    <a href="favourites.php">Favourites & Cart</a>
    <a href="settings.php">Settings</a>
    </div>
    <div id="main">
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
    </div>
    </div>
    <div id="d1" class="playarea">
        <div class="row">
                <div class="well">
                    <h3><b>🔸 About You</b></h3>
                    <?php 
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
                        $query="select * from users"; 
                        $result=$conn->query($query);
                        if($rows=$result->fetch_assoc())
                        { ?>
                            <p class="about">
                            <?php echo "Name : ".$rows['fname'];?><br>
                            <?php echo "Username : ".$rows['uname'];?><br>
                            <?php echo "Email : ".$rows['email'];?><br>
                            <?php echo "Phone Number : ".$rows['pno'];?><br>
                            <?php echo "Gender : ".$rows['gender']; ?></p>
                        <?php 
                        } 
                    }
                    ?>
                    <br>
                    <h3><b>Name : </b>Muskan Varma</h3>
                    <h3><b>Email : </b>muskanvarma0304@gmail.com</h3>
                    <h3><b>Phone No. : </b>7249856966</h3>
                    <h3><b>Gender : </b>Female</h3>
                    <h3><b>Password : **********</h3>
                </div>
        </div><br>
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-4">
                <div class="image-container">
                    <img src="img/il_340x270.2688985221_1lhs.avif" width="100%" height="100%" class="image image-responsive"></div>
                    <h3><b>₹ 1,662 (Original Price:₹ 2800)</b></h3>
                    <h3>Embroidered Portrait</h3>
                </div>
                <div class="col-xs-4">
                <div class="image-container">
                    <img class="image image-responsive" width="100%" height="100%" src="img/il_340x270.5360419717_do9e.avif"></div>
                    <h3><b>₹ 10,603 (Original Price:₹ 20,180+Shipping)</b></h3>
                    <h3>Wall Painting</h3>
                </div>
            </div>
        </div>
    </div>
    <script>
            function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            }

            function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
            }
        </script>
</form>   
</body>
</html> 