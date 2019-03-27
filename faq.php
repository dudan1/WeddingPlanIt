<?php
/*session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.html");
*/?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Contact Us Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">

<!--    <style>
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
            width:auto;
            height:100px;
            float: center;
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
            padding: 5px 30px;
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
<!--<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">-->
<body>
<header>
    <?php include 'Templates/navbar/navbar_out.php';

    ?>


</header>
<br><br><br><br><br><br><br><br>
<main>
<div class = "bg-text3">

    <h1>FAQs</h1>
    <hr/>
    <p align="left">FAQ</p>
    <p align="left">FAQ</p>
    <p align="left">FAQ</p>
    <p align="left">FAQ</p>

        <form action="PHP_database_insert?" method="post">
            <p align="left">Search: <input type="search" required name="address" maxlength="60"<br/><button type="submit">Search</button><br/><button type="button" onclick="location.href='index.html';" class="cancelbtn">Cancel</button></p>
            <hr/>
            <p align="left">Search Results</p>
            <p align="left">Result</p>
            <p align="left">Result</p>
            <p align="left">Result</p>
            <p align="left">Result></p>
        </form>

</div>
</main>

<footer class="footer">
    <!--<p>DJNT (c) 2019</p>
    <p>Join us on</p>
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-google"></a>
    <a href="#" class="fa fa-instagram"></a>
    <a href="#" class="fa fa-youtube"></a>
    -->

</footer>

</body>


</html>
