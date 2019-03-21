<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:../index.html");
require_once('PHP_database_insert/db.php');

$email = $_SESSION['name'];

$sql = "Select first_name, surname, address, postcode, business_name, category, description FROM service_provider WHERE email = '$email'";
$result =mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);


$firstname = $row['first_name'];
$surname = $row['surname'];
$address = $row['address'];
$postcode = $row['postcode'];
$business_name = $row['business_name'];
$category = $row['category'];
$description = $row['description'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Service Provider Homepage</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <!--<link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">-->

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">

    <style>
        .heading{
            position: absolute;
            padding-left: 400px;
            font-family:  "Comic Sans MS", cursive, sans-serif;
            font-size: 20px;
        }
        h3{
            color:darkseagreen;
            font-size: 70px;
            text-align: center;
            margin-top: 275px;
            font-family:  "Comic Sans MS", cursive, sans-serif;*/
        }
        .row{
            max-width: 1200px;
            margin: auto;
        }
        .logo img{
            width: 200px;
            height:auto;
            float: left;
        }
        .main-nav{
            float: right;
            list-style: none;
            margin-top: 30px;
        }
        .main-nav li{
            display:inline-block;
        }
        .main-nav li a{
            color: darkseagreen;
            text-decoration: none;
            padding: 5px 35px;
            font-family: "Trebuchet MS","Helvetica", "Sans-serif";
            font-size: 20px;
        }
        .main-nav li a:hover{
            border: 1px goldenrod;
        }
        body{
            height: 100vh;
            background-size: cover;
            background-position: center;
   }


    </style>
</head>

<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">

<header>
    <div class="row">
    <div class="logo">
<img src="assets/images/logo1.png" alt="wedding band">
    </div>
    <nav>
        <ul class="main-nav">
            <li><a>HOME</a></li>
            <li><a href="contact_us.php">CONTACT US</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="my_calendar.php">MY CALENDAR</a></li>
            <li><a href="PHP_database_insert/logout.php">LOG OUT</a></li>
            <li><a href="pic_upload.php">MY PHOTOS</a></li>
        </ul>
    </nav>
    </div>
    <p><button class="btn3 info3" onclick="document.getElementById('id01').style.display='block'" style="width:110px;height:auto;float:right">Profile</button></p>
    <div id="id01" class="modal">

        <form class="modal-content animate" action="PHP_database_insert/sp_update.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <!--<img src="assets/images/avatar.png" alt="Avatar" height="50" width="50">-->
            </div>
            <div class="container">
                <h1>Update your service provider details</h1>
                <p>The name of your business: <input type="text" required name="business_name" maxlength="40" width="200"value ="<?php echo $business_name ?>"></p>
                <p>Your personal first name: <input type="text" required name="first_name" maxlength="20" value ="<?php echo $firstname ?>"></p>
                <p>Your personal surname: <input type="text" required name="surname" maxlength="20" value ="<?php echo $surname ?>"></p>
                <p>Your personal address: <input type="text" required name="address" maxlength="60" value ="<?php echo $address ?>"></p>
                <p>Your personal postcode: <input type="text" required name="postcode" maxlength="8" value ="<?php echo $postcode ?>"></p>
                <p>The category of your business:
                    <select name="category">
                        <option value="beautician" <?php if($category =="beautician") echo 'selected="selected"' ?>>Beautician</option>
                        <option value="caterer" <?php if($category =="caterer") echo 'selected="selected"' ?>>Caterer</option>
                        <option value="jeweller" <?php if($category =="jeweller") echo 'selected="selected"' ?>>Jeweller</option>
                        <option value="venue" <?php if($category =="venue") echo 'selected="selected"' ?>>Venue</option>
                        <option value="flowers" <?php if($category =="flowers") echo 'selected="selected"' ?>>Flowers </option>
                        <option value="photography" <?php if($category =="photography") echo 'selected="selected"' ?>>Photography </option>
                        <option value="music" <?php if($category =="music") echo 'selected="selected"' ?>>Music</option>
                        <option value="decor" <?php if($category =="decor") echo 'selected="selected"' ?>>Decor</option>
                        <option value="weddingplanners" <?php if($category =="weddingplanners") echo 'selected="selected"' ?>>Wedding Planners</option>
                        <option value="dressers" <?php if($category =="dressers") echo 'selected="selected"' ?>>Dresses</option>
                    </select></p>
                <p>Say something about your business: <textarea required name="description" rows="7" cols="42"><?php echo $description; ?></textarea></p>
                <button type="submit">Submit details</button>
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
            </div>
        </form>
    </div>
</header>

<main>
            <div class="heading">
                <h1>Welcome to your Home Page!</h1>
            </div>

</main>

</body>
</html>



