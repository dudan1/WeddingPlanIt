<?php
//session_start();
//if (!IsSet($_SESSION["name"]))
//    header("Location:index.php");
#if (($_SESSION["user_type"]) != "Service Provider")
 #   header("Location:sp_home.php");

?>
<!DOCTYPE html>
<html>
<!-- Acknowledgements of sources can be found in the footer of each page -->
<head>

    <meta charset="UTF-8">
    <title>Customer Profile</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">

    <style>
        .heading{
            position: absolute;
            padding-left: 400px;
            font-family:  "Comic Sans MS", cursive, sans-serif;
            font-size: 20px;
        }
        h2{
            color:darkseagreen;
            font-size: 70px;
            text-align: center;
            margin-top: 275px;
            font-family:  "Comic Sans MS", cursive, sans-serif;
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

<!--<body style=" background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(assets/images/wed.jpg);">-->
<body>

<header>
    <?php require 'Templates/navbar/navbar_cust.php';?>
<!--    <div class="row">
        <div class="logo">
            <img src="assets/images/logo1.png" alt="wedding band">
        </div>
    </div>-->
</header>

<div class = "bg-text1">

    <form action="PHP_database_insert/cust-reg-script.php" method="post">
        <h1>Your customer details</h1>
        <p>Please enter the following personal details:<!-- for email address (email)-->.</p>
        <!--<p>Your email: <input type="email" required name="email"></p>-->
        <p>Your first name: <input type="text" required name="first_name" maxlength="20"></p>
        <p>Your surname: <input type="text" required name="surname" maxlength="20"></p>
        <p>Phone number : <input type="text" required name="phone_number" maxlength="14"></p>
        <p>Wedding date: <input type="date" required name="wedding_date"></p>
        <p>Wedding budget: <input type="text" placeholder="£" required name="budget"></p>

        <button type="submit">Submit details</button>

        <button type="button" onclick="location.href='index.php';" class="cancelbtn">Cancel</button>
    </form>

</div>

<footer class="footer">
    <?php require 'Templates/footer/footer.php';?>
</footer>

</body>


</html>
