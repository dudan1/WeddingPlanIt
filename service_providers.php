<?php
session_start();
if (!IsSet($_SESSION["name"]))
   header("Location:index.html");

    require_once('PHP_database_insert/db.php');
    $sp_id = $_GET['id']; // assign variable for id
    $sql = "Select C_ID FROM customer WHERE '$_SESSION[name]' = email";
    $result =mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $cust_id = $row['C_ID'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Service Provider Details</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <!--<link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">-->

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">

</head>

<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">

<header>
    <?php include 'PHP_database_insert/nav_bar.php';?>
</header>
<br><br><br><br><br>
<main>
    <div class="grid-container" style="background-color:whitesmoke">
    <div>
        <form action ="PHP_database_insert/contract.php" method="post">
            <input type = "hidden" name = "cust_id" value="<?php echo $cust_id; ?>">
            <input type = "hidden" name = "sp_id" value="<?php echo $sp_id; ?>">
            <button type="submit">BOOK THIS SERVICE PROVIDER</button>
        </form>
    </div>

    <div align="center">
        <h2 style="color:darkseagreen"><?php echo $row['business_name'] ?></h2>
        <p>Here goes further details about the service provider</p>



    </div>


    </div>
</main>


<footer>

</footer>

</body>
</html>
