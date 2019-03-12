<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.html");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Customer Homepage</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">
</head>

<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">

<header>
    <div class="grid-container">
        <div class="grid-50">
    <?php require 'PHP_database_insert/nav_bar.php';?>
    <p><button class="btn3 info3" onclick="document.getElementById('id02').style.display='block'" style="width:110px;height:auto;float:right">Profile</button></p>
    <div id="id02" class="modal">

        <form class="modal-content animate" action="php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                <!--<img src="assets/images/avatar.png" alt="Avatar" height="50" width="50">-->
            </div>
            <div class="container">
                <h1>Update your customer details</h1>
                <p>Please enter the following personal details<!-- for email address (email)-->.</p>
                <!--<p>Your email: <input type="email" required name="email"></p>-->
                <p>Your first name: <input type="text" required name="first_name" maxlength="20"></p>
                <p>Your surname: <input type="text" required name="surname" maxlength="20"></p>

                <button type="submit">Submit details</button>

                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
            </div>
        </form>
    </div>
        </div>

</header>
<br><br><br>
<main>
<div class="grid-container" style: "background-color=white">

    <div align="center">
        <h2 style="color:darkseagreen">Search for Service Providers</h2>
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
                    <option value=" Beauticians">Beauticians</option>
                    <option value="decor">Decor</option>
                    <option value="weddingplanners">Wedding Planners</option>
                    <option value="dressers">Dresses</option>
                </select>
                &nbsp;
                <input type="submit" value="Search">
            </div>
        </form>
    </div>

<div>



            <?php
            //check connection
            require_once('PHP_database_insert/db.php');
            if ($connection === false) {
                die ("Error: could not connect. " . mysqli_connect_error());
            }
            //assign search variable
            $search_value = $_GET['search_value'];
            //run query
            $sql = "SELECT * from service_provider WHERE category = '$search_value'";
            if ($result = mysqli_query($connection, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='sp-row'>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<div class='sp_column'>";
                        echo "<div class='sp_card'>";
                        echo "<div class='container'>";
                        echo "<h2>" . "<a href ='service_providers.php?id={$row['SP_ID']}'>" . $row['business_name'] . "</a>" . "</h2>";
                        echo "<p class='title'>" . $row['category'] . "</p>";
                        echo "<p class=''>" . $row['description'] . "</p>";
                        echo "<button class='bt1' >" . "<a href='service_providers.php?id={$row['SP_ID']}'>" . "View Service Provider" . "</a>" . "</button>";
                        echo "</div>" . "<br>";
                        echo "</div>";
                        echo "</div>";
                    }
                    echo "</div>";
//free result set
                    mysqli_free_result($result);
                }else{
                    echo "No records matching your query were found.";
                }
            }
            ?>
</div>
    </div>
</main>


<footer>

</footer>

</body>
</html>
