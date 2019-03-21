<?php
/*session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.html");
require_once('PHP_database_insert/db.php');

$email = $_SESSION['name'];

$sql = "Select first_name, surname FROM customer WHERE email = '$email'";
$result =mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);


$firstname = $row['first_name'];
$surname = $row['surname'];

   // Join Contracts and Service_provider table
   SELECT business_name, category
   FROM contracts c, service_provider s
   WHERE c.sp_id = s.sp_id AND cust_id = "$customer_id"
*/?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Service Providers - WeddingPlanIt</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">

    <!-- <style>
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
   <style> }
    form {
    display: inline;
    }
   </style>
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
                <h1>Update your customer details</h1>
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

<div class="grid-container">
    <div class = "grid-25" style="background-color:lightgoldenrodyellow"><h2>Service Provider Categories</h2>
    <div padding="3">
        <p>Beautician</p>
        <p>Caterer</p>
        <p>Jeweller</p>
        <p>Venue</p>
        <p>Flowers</p>
        <p>Photography</p>
        <p>Music</p>
        <p>Beauticians</p>
        <p>Decor</p>
        <p>Wedding Planners</p>
        <p>Dresses</p>
    </div>
    </div>
    <div class = "grid-75" style="background-color:whitesmoke">
        <h2 style="color:darkseagreen">SERVICE PROVIDERS</h2>
        <hr>


        <form method="GET" action="providers.php?go">
            <div>
                <p><input type="text" name="search" placeholder="Search providers">
                <input type="submit" value="Search"></p>
            </div>
        </form>
        <?php
        require_once('PHP_database_insert/db.php');

       # if (IsSET($_GET['search'])){
        #$sql= "SELECT * FROM providers WHERE business_name LIKE '%$keyword%'";


echo "PEOPLE WORKING AGEAD. trying to implement a search button here";

        if ($connection === false) {
            die("Error: could not connect to database. " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM service_provider";

            if ($result = mysqli_query($connection, $sql)){
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        echo "<div class='container'>";
                        echo "<h2>" . "<a href ='service_providers.php?id={$row['SP_ID']}'>" . $row['business_name'] . "</a>" . "</h2>";
                        echo "<p class='title'>" . $row['category'] . "</p>";
                        #echo "<p class=''>" . $row['description'] . "</p>";
                        echo "<p><a href='service_providers.php?id={$row['SP_ID']}' class='button'>View Service Provider</a></p>";
                        echo "</div>" . "<br>";
                    }
                    //free result set
                    mysqli_free_result($result);
                }else {
                    echo "No results matching your query were found.";
                }
            }
        ?>


</div>

<footer>

</footer>

</body>
</html>
