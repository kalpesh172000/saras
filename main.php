<?php 
$db_host = 'localhost';
$db_user = 'muskan';
$db_password = 'saras123';
$db_name = 'saras';

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
/* $uname = $_POST['uname'];
$ps = $_POST['ps'];
$query='select * from users where uname="$uname" and pass="$ps"'; 
$result=$conn->query($query); */
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="main.css" rel="stylesheet">
</head>
<body>
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
    <div id="d1" class="playarea">
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
                    <img class="image image-responsive" width="100%" height="100%" src="img/il_340x270.3432204051_bu5x.avif"></div>
                    <h3><b>₹ 6,002 (Original Price:₹ 10,180+Shipping)</b></h3>
                    <h3>Madhubani Painting of Radha Krishna</h3>
                </div>
                <div class="col-xs-4">
                <div class="image-container">
                    <img src="img/il_340x270.4055370581_k0dv.avif" width="100%" height="100%" class="image image-responsive"></div>
                    <h3><b>₹ 3500 (Original Price:₹ 5,000)</b></h3>
                    <h3>Kaushalam Hand painted Tea Kettle</h3>
                </div>
            </div>
        </div><br><br><br>
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-4">
                <div class="image-container">
                    <img src="img/il_340x270.4855623542_1584.avif" width="100%" height="100%" class="image image-responsive"></div>
                    <h3><b>₹ 500 (Original Price:₹ 1,500)</b></h3>
                    <h3>Beutiful Embroidered Portrait</h3>
                </div>
                <div class="col-xs-4">
                <div class="image-container">
                    <img class="image image-responsive" width="100%" height="100%" src="img/il_340x270.5360419717_do9e.avif"></div>
                    <h3><b>₹ 10,603 (Original Price:₹ 20,180+Shipping)</b></h3>
                    <h3>Wall Painting</h3>
                </div>
                <div class="col-xs-4">
                <div class="image-container">
                    <img src="img/il_300x300.3489706986_ltsh.avif" width="100%" height="100%" class="image image-responsive"></div>
                    <h3><b>₹ 3,000 (Original Price:₹ 5,000)</b></h3>
                    <h3>Hand Decorated Flower Pot</h3>
                </div>
            </div>
        </div><br><br><br>
        <div class="row">
            <div class="col-xs-12">
                <div class="col-xs-4">
                <div class="image-container">
                    <img src="img/il_340x270.2333220564_tn5l.avif" width="100%" height="100%" class="image image-responsive"></div>
                    <h3><b>₹ 8,000 (Original Price:₹ 15,280+Shipping)</b></h3>
                    <h3>Embroidered Portrait</h3>
                </div>
                <div class="col-xs-4">
                <div class="image-container">
                    <img class="image image-responsive" width="100%" height="100%" src="img/il_340x270.4143573747_70bv.webp"></div>
                    <h3><b>₹ 500 per plate (Original Price:₹ 999+Shipping)</b></h3>
                    <h3>Handmade Cup Plate</h3>
                </div>
                <div class="col-xs-4">
                <div class="image-container">
                    <img src="img/il_340x270.1273905845_6nl2.webp" width="100%" height="100%" class="image image-responsive"></div>
                    <h3><b>₹ 4,662 (Original Price:₹ 5,180+Shipping)</b></h3>
                    <h3>Pottery rustic blue bowl</h3>
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
   
</body>
</html> 