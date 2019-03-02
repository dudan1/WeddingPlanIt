<?php
session_start();
#if (!IsSet($_SESSION["name"]))
 #   header("Location:index.html");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Customer Homepage</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <!--<link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">-->

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">

    <style>
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

<body style=" background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(assets/images/wed.jpg);">

<header>
    <div class="row">
        <div class="logo">
            <img src="assets/images/logo1.png" alt="wedding band">
        </div>
        <nav>
            <ul class="main-nav">
                <li><a href="cust_home.php">HOME</a></li>
                <li><a href="#">CONTACT US</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">MY PLAN</a></li>
                <li><a href="PHP_database_insert/logout.php">LOG OUT</a></li>
            </ul>
        </nav>
    </div>
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
</header>
<br><br><br><br><br><br><br><br>
<main>

    <div align="center">
        <h2>Search for Service Providers</h2>
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

    <div class="row">
        <div class="col-sm-2"></div>


        <div class="col-sm-8">

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
                    while ($row = mysqli_fetch_array($result)) {
                        //while($row = $result->fetch_array()){
                        echo "<div class='card'>";
                        echo "<div class='card-header'>" . $row['business_name'] . "</div>";
                        echo "<div class='card-body'>" . $row['category'] . "</div>";
                        echo "</div>" . "<br>";
                    }
//free result set
                    mysqli_free_result($result);
                }else{
                    echo "No records matching your query were found.";
                }
            }
            ?>
        </div>
        <div class="col-sm-2"></div>
    </div>

</main>


<footer>

</footer>

</body>
</html>
