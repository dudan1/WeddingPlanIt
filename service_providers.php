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

    <style>

        .container {
            padding: 0 16px;
        }
        .container::after, .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .title {
            color:darkgoldenrod;
        }
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

        .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
        }
        .button:hover {
            background-color: #555;
        }
        body{
            height: 100vh;
            background-size: cover;
            background-position: center;
    </style>
</head>

<body style=" background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(assets/images/wed.jpg);">

<header>
    <?php include 'PHP_database_insert/nav_bar.php';?>
</header>
<br><br><br><br><br><br><br><br>
<main>
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



</main>


<footer>

</footer>

</body>
</html>
