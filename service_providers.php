<?php
session_start();
if (!IsSet($_SESSION["name"]))
   header("Location:index.html");

    require_once('PHP_database_insert/db.php');
    $sp_id = $_GET['id']; // assign variable for id
    /*$sql = "SELECT * from service_provider WHERE sp_id = '$sp_id'"; //run query
    $result = mysqli_query($connection, $sql) or die ("Bad Query: $sql");
    $row = ($row = mysqli_fetch_array($result));*/


$sql = "Select C_ID FROM customer WHERE '$_SESSION[name]' = email";
$result =mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$cust_id = $row['C_ID'];

print $sp_id;
print $cust_id;
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



    </div>



</main>


<footer>

</footer>

</body>
</html>
