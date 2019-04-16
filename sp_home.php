<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.php");
if (($_SESSION["user_type"]) == "Service Provider") {
    if (($_SESSION["user_type"]) != "Service Provider")
        header("Location:../cust_home.php");

require_once('PHP_database_insert/db.php');

$email = $_SESSION['name'];

$sql = "SELECT * FROM service_provider WHERE email = '$email'";
$result =mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$sp_id = $row['SP_ID'];
$_SESSION['SP_ID']= $sp_id;
$firstname = $row['first_name'];
$surname = $row['surname'];
$address = $row['address'];
$postcode = $row['postcode'];
$business_name = $row['business_name'];
$category = $row['category'];
$description = $row['description'];
} else{
    header("Location: sp_home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Service Provider Homepage</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

<link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/superceded/favicon1.ico" type="image/x-icon">

<!--    <style>-->
<!--        .heading{-->
<!--            position: absolute;-->
<!--            padding-left: 400px;-->
<!--            font-family:  "Comic Sans MS", cursive, sans-serif;-->
<!--            font-size: 20px;-->
<!--        }-->
<!--        h3{-->
<!--            color:darkseagreen;-->
<!--            font-size: 70px;-->
<!--            text-align: center;-->
<!--            margin-top: 275px;-->
<!--            font-family:  "Comic Sans MS", cursive, sans-serif;*/-->
<!--        }-->
<!--        .row{-->
<!--            max-width: 1200px;-->
<!--            margin: auto;-->
<!--        }-->
<!--        .logo img{-->
<!--            width: 200px;-->
<!--            height:auto;-->
<!--            float: left;-->
<!--        }-->
<!--        .main-nav{-->
<!--            float: right;-->
<!--            list-style: none;-->
<!--            margin-top: 30px;-->
<!--        }-->
<!--        .main-nav li{-->
<!--            display:inline-block;-->
<!--        }-->
<!--        .main-nav li a{-->
<!--            color: darkseagreen;-->
<!--            text-decoration: none;-->
<!--            padding: 5px 35px;-->
<!--            font-family: "Trebuchet MS","Helvetica", "Sans-serif";-->
<!--            font-size: 20px;-->
<!--        }-->
<!--        .main-nav li a:hover{-->
<!--            border: 1px goldenrod;-->
<!--        }-->
<!--        body{-->
<!--            height: 100vh;-->
<!--            background-size: cover;-->
<!--            background-position: center;-->
<!--   }-->
<!--    </style>-->

</head>

<body>
<header>
    <?php require '/Templates/navbar/navbar_sp.php';?>

</header>

<main>
    <div class = "bg-text5">
<!--    <div class="grid-container">-->
<!--        <div class="tablet-grid-75">-->
        <h1>Welcome to your Home Page!</h1>
<!--        </div>-->
<!--    </div>-->
    </div>

</main>

<footer class="footer">
    <?php require 'Templates/footer/footer.php';?>
</footer>

</body>
</html>




