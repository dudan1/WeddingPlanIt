<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.php");

?>

<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">

</head>
<!--<body style=" background-image:linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.1)),url(assets/images/wed.jpg);">-->
<body>
<header>
    <?php require '/Templates/navbar/navbar_sp.php';?>

</header>

<h2>Service Providers</h2>
<p>All current (insert service provider)</p>
<br>

<div class="sp_row">
    <div class="sp_column">
        <div class="sp_card">
            <img src="/w3images/team1.jpg" alt="Jane" style="width:100%">
            <div class="sp_container">
                <h2>Jane Doe</h2>
                <p class="sp_title">Jeweller</p>
                <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                <p>Price £400</p>
                <p><button class="button">Contact</button></p>
            </div>
        </div>
    </div>

    <div class="sp_column">
        <div class="sp_card">
            <img src="/w3images/team2.jpg" alt="Mike" style="width:100%">
            <div class="sp_container">
                <h2>Mike Ross</h2>
                <p class="sp_title">Jeweller</p>
                <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                <p>Price £400</p>
                <p><button class="button">Contact</button></p>
            </div>
        </div>
    </div>
    <div class="sp_column">
        <div class="sp_card">
            <img src="/w3images/team3.jpg" alt="John" style="width:100%">
            <div class="sp_container">
                <h2>John Doe</h2>
                <p class="sp_title">Jeweller</p>
                <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                <p>Price £400</p>
                <p><button class="button">Contact</button></p>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <?php require 'Templates/footer/footer.php';?>
</footer>

</body>

