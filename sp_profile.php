<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.html");

require_once('PHP_database_insert/db.php');
if(isset ($_SESSION['sp_id'])) {
    unset ($_SESSION['sp_id']);
    $_SESSION['sp_id'] = $_GET['id']; // assign variable for id
}
else{
   // $_SESSION['sp_id'] = $_GET['id'];
}
// display service provider details
$sql = "Select * FROM service_provider WHERE '$_SESSION[name]' = email";
$result =mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<head>
    <title>Service Provider Profile Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

</head>

<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">

<header>
    <?php require 'PHP_database_insert/nav_bar.php';?>
</header>

<main>
    <div class="grid-container">
        <div class="grid-75">
    <div class="profile">

   <div style="background-color: #fef1ec">

       <?php

     echo "<h2 style='text-align: center; padding-top: 13px;color: #4CAF50'>". $row['business_name']."</h2>";
     echo "<hr>";
     echo "<p style='padding-left: 25px'>". "First Name"." : ".$row['first_name']."</p>";
     echo "<p style='padding-left: 25px'>". "Surname"." : ".$row['surname']."</p>";
     echo "<p style='padding-left: 25px'>". "Address"." : ".$row['address']."</p>";
     echo "<p style='padding-left: 25px'>". "Post Code"." : ".$row['postcode']."</p>";
     echo "<p style='padding-left: 25px'>". "Service Category"." : ".$row['category']."</p>";
     echo "<p style='padding-left: 25px'>". "Price"." : "."£".$row['price']."</p>";
     echo "<p style='padding-left: 25px'>". "Business Name"." : ".$row['business_name']."</p>";
     echo "<p style='padding-left: 25px;padding-bottom: 13px'>". "Description"." : ".$row['description']."</p>";

       ?>

   </div>
   </div>
    </div>
    </div>

</main>


</body>



</html>

