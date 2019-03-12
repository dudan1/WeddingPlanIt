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
</head>

<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">

<header>
    <?php include 'PHP_database_insert/nav_bar.php';

    ?>

    <p><button class="btn3 info3" onclick="document.getElementById('id02').style.display='block'" style="width:110px;height:auto;float:right">Profile</button></p>
    <div id="id02" class="modal">

        <form class="modal-content animate" action="/PHP_database_insert/cust_update.php" method="post">
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

                <button type="submit">Submit details</button>

                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
            </div>
        </form>
    </div>
</header>
<br><br><br><br><br><br><br><br>
<main>
<div class = "bg-text1">

    <h1>Contact Us</h1>
    <hr/>
    <p>Please submit a query:</p>

        <form action="PHP_database_insert?" method="post">
        <!--<p>Your email: <input type="email" required name="email"></p>-->
        <p align="left"><textarea rows="4" cols="47" required name="cust_query" placeholder="Type your query here..."></textarea></p>
            <p align="left">Your first name: <textarea rows="1" cols="20" required name="first_name" maxlength="20"></textarea></p>
            <p align="left">Your  surname: <textarea rows="1" cols="20" required name="surname" maxlength="20"></textarea></p>
        <p align="left">Your email: <input type="email" required name="address" maxlength="60"></p>

            <button type="submit">Submit details</button>

            <button type="button" onclick="location.href='index.html';" class="cancelbtn">Cancel</button>
        </form>
    <hr/>
    <p>Or via email:</p>
    <p align="left"><a href="mailto:0006664@rgu.ac.uk">Email: WPfake@rgu.ac.uk</a></p>

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
