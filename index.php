<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Wedding PlanIt</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">


</head>
<!--<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">-->
<body>
<header>
<?php require 'Templates/navbar/navbar_out.php';?>
<header>
<!--    <div class="grid-container">
        <div class="grid-50">
            <div class="row">
    <div class="logo">
<img src="assets/images/logo1.png" alt="wedding band">
    </div>
    <nav>
        <ul class="main-nav">
            <li><a href="contact_us.php">CONTACT US</a></li>
            <li><a href="faq.php">FAQ</a></li>
        </ul>
    </nav>
    </div>-->

    <p><button class="btn2 info2" onclick="document.getElementById('id02').style.display='block'" style="width:110px;height:auto;float:right">Log In</button></p>

    <div id="id02" class="modal">

        <form class="modal-content animate" action="PHP_database_insert/login.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                <!--<img src="assets/images/avatar.png" alt="Avatar" height="50" width="50">-->
            </div>
            <div class="container">
                <h2>LOGIN</h2>

                <p>Your email:</p>
                <p><input type="email" required name="email"></p>
                <p>Your Password:</p>
                <p><input type="password" required name="pwd1"></p>

                <button type="submit">Log in</button>

                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
            </div>
        </form>
    </div>

    <p><button class="btn3 info3" onclick="document.getElementById('id01').style.display='block'" style="width:110px;height:auto;float:right">Sign up</button></p>

    <div id="id01" class="modal">

        <form class="modal-content animate" action="PHP_database_insert/register.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <!--<img src="assets/images/avatar.png" alt="Avatar" height="50" width="50px">-->
            </div>
            <div class="container">
                <h2>REGISTER</h2>
                <p>User type: You are a:
                    <select id="UserType" name="user_type">
                        <option>Service Provider</option>
                        <option>Customer</option>
                    </select>
                <p>Your email:</p>
                <p><input type="email" required name="email"></p>
                <p>Password: <input type="password" required name="pwd1"></p>
                <p>Confirm Password: <input type="password" required name="pwd2"></p>

                <button type="submit">Sign Up!</button>

                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
            </div>
        </form>
    </div>
        </div>
    </div>
</header>

<main>
<div class="grid-container2">
    <div class="grid-50">
        <div class = "bg-text4">
            <h1 style="font-size:50px">Wedding Plan<font color="red">I</font>t</h1>
            <p>Everything you need to plan your wedding</p>
        </div>
    </div>
</div>

</main>

<footer>

</footer>

</body>
</html>
