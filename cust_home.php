<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.php");
if (($_SESSION["user_type"]) != "Customer")
    header("Location:index.php");

require_once('PHP_database_insert/db.php');

$email = $_SESSION['name'];

$sql = "Select first_name, surname, phone_number, wedding_date, budget FROM customer WHERE email = '$email'";
$result =mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);


$firstname = $row['first_name'];
$surname = $row['surname'];
$phone_number = $row['phone_number'];
$wedding_date = $row['wedding_date'];
$budget = $row['budget'];
?>

<!DOCTYPE html>
<html>
<!-- Acknowledgements of sources can be found in the footer of each page -->
<head>
    <meta charset="UTF-8">
    <title>Customer Homepage</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">

<!--    <style>
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
    </style>-->
</head>

<body>
<header>
    <?php require 'Templates/navbar/navbar_cust.php';?>

<p><button class="btn3 info3" onclick="document.getElementById('id02').style.display='block'" style="width:110px;height:auto;float:right">Profile</button></p>
<div id="id02" class="modal">

    <form class="modal-content animate" action="PHP_database_insert/cust_update.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
            <!--<img src="assets/images/avatar.png" alt="Avatar" height="50" width="50">-->
        </div>
        <div class="container">
            <h1>Update your details</h1>
            <p>Please enter the following personal details<!-- for email address (email)-->.</p>
            <!--<p>Your email: <input type="email" required name="email"></p>-->
            <p>Your first name: <input type="text" required name="first_name" maxlength="20" value ="<?php echo $firstname ?>"/></p>
            <p>Your surname: <input type="text" required name="surname" maxlength="20" value ="<?php echo $surname ?>"/></p>
            <p>Phone number : <input type="text" required name="phone_number" maxlength="14" value ="<?php echo $phone_number ?>"></p>
            <p>Wedding date: <input type="date" required name="wedding_date" value ="<?php echo $wedding_date ?>"></p>
            <p>Wedding budget £: <input type="text" required name="budget" value ="<?php echo $budget ?>"></p>

            <button type="submit">Submit details</button>

            <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
            <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
        </div>
    </form>
</div>
</header>
<!--<br><br><br><br><br><br><br><br>-->
<main>
<!--<div class="grid-container">
    <div class="grid-50">-->
    <div class = "bg-text">
    <div align="center">
        <h2 color="white">Search for Service Providers</h2>
        <form method="GET" action="search_providers.php">
            <div>

                <select  name="search_value">

                    <option value="">Select Service Provider category to search</option>
                    <option value="beautician">Beautician</option>
                    <option value="caterer">Caterer</option>
                    <option value="jeweller">Jeweller</option>
                    <option value="venue">Venue</option>
                    <option value="flowers">Flowers </option>
                    <option value="photography">Photography </option>
                    <option value="music">Music</option>
                    <option value="Beauticians">Beauticians</option>
                    <option value="decor">Decor</option>
                    <option value="weddingplanners">Wedding Planners</option>
                    <option value="dressers">Dresses</option>
                </select>
                &nbsp;
                <input type="submit" value="Search">
            </div>
    </div>
    </div>
<!--    </div>
    </div>-->
        </form>


    </div>
</main>


<footer class="footer">
    <?php require 'Templates/footer/footer.php';

    ?>
</footer>

</body>
</html>
