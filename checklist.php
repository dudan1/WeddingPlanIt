<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.html");
if (($_SESSION["user_type"]) != "Customer")
    header("Location:index.php");


    require_once ('PHP_database_insert/db.php');
    //$sp_id = $_GET['id']; // assign variable for id
    $sql = "SELECT C_ID, first_name, surname, wedding_date, budget FROM customer WHERE '$_SESSION[name]' = email";
    $result =mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $cust_id = $row['C_ID'];
    $cust_fname = $row['first_name'];
    $cust_sname = $row['surname'];
    $wed_date = $row['wedding_date'];
    $budget = $row['budget'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wedding Plan Checklist</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">
</head>

<!--<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">-->
<body>

<header>
    <?php require 'Templates/navbar/navbar_cust.php';?>

</header>

<main>
<div class ="grid-container" style="padding-top: 120px">

    <div class = "grid-25" style="background-color:lightgoldenrodyellow"><h2>Dashboard</h2>
        <?php
            echo "<p>" . $cust_fname . " " . $cust_sname . "</p>";
            echo "<p>" . "Wedding Date: " . $wed_date . "</p>";
            echo "<p>" . "Your budget is £" . "$budget" . "</p>";
            ?>

    </div>
    <div class = "grid-75">
        <h2 style="color:darkseagreen">WEDDING PLAN CHECKLIST</h2>



        <hr>

<div id="checklist">
    <p>This checklist helps you build your wedding plan. WeddingPlanIt helps you choose and book providers in the following categories:</p>

    <p>Beautician</p>

    <p>Caterer</p>
    <p>Decor</p>
    <p>Dresses</p>
    <p>Flowers </p>
    <p>Jeweller</p>
    <p>Music</p>
    <p>Photography </p>
    <p>Venue</p>
    <p>Wedding Planners</p>


</div>
    </div>
</div>




</main>
<footer class="footer">
    <?php require 'Templates/footer/footer.php';

    ?>
</footer>


</body>
</html>
