<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="../css/new_craft.css" rel="stylesheet">
</head>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
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
        <h1><strong>Show case your stuff with style !!</strong> </h1>
        
        <div class="form-group">
            <label for="title"><span>Name/Title of your art</span></label>
            <input type="text" name="title" id="title" class="form-controll"/>
        </div>
        <div class="form-group">
            <label for="title"><span>Type your Correct Email</span></label>
            <input type="text" name="title" id="title" class="form-controll"/>
        </div>
        <div class="form-group">
            <label for="caption"> <span>Write Description Here !</span></label>
            <input type="text" name="caption" id="caption" class="form-controll"/>
        </div>
        
        <div class="form-group file-area">
            Select image to upload:
            <input type="file" name="image" required="required" multiple="multiple"/>
            <br><br>
            <input type="submit" name="submit" value="UPLOAD"/>
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