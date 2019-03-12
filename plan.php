<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.html");

    require_once ('PHP_database_insert/db.php');
    //$sp_id = $_GET['id']; // assign variable for id
    $sql = "SELECT C_ID FROM customer WHERE '$_SESSION[name]' = email";
    $result =mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $cust_id = $row['C_ID'];




?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Wedding Plan</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">
</head>

<body style=" background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(assets/images/wed.jpg);">

<header>
    <?php include 'PHP_database_insert/nav_bar.php';?>
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
<br>
<main>




<div class ="grid-container">
    <div class = "grid-25"><h2>Dashboard</h2></div>
    <div class = "grid-75">
        <h2 style="color:darkseagreen">WEDDING PLAN</h2>
        <?php
echo "Your customer id is: " . $cust_id;
        // Join Contracts and Service_provider table
        require_once ('PHP_database_insert/db.php');
        $sql2 = "SELECT business_name, category 
            FROM contracts c, service_provider s
            WHERE c.SP_ID = s.SP_ID AND Cust_ID = '$cust_id'";
        $result2 = mysqli_query($connection, $sql2);
        while ($row2 = mysqli_fetch_array($result2)) {
            echo "<h3>" . $row2['category'] . "</h3>";
            echo  "<p>" . $row2['business_name'] . "</p>";

        }


        //Still working on the above
        ?>
    </div>
</div>




</main>
<footer>

</footer>

</body>
</html>