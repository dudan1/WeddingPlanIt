<!DOCTYPE html>
<html>
<head>
    <<<<<<< HEAD
    <meta charset="UTF-8">
    <title>Service Provider Search Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <!--<link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">-->

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">

    <style>
        .heading{
            position: absolute;
            padding-left: 400px;
            font-family:  "Comic Sans MS", cursive, sans-serif;
            font-size: 20px;
        }
        h2{
            color:darkseagreen;
            font-size: 70px;
            text-align: center;
            margin-top: 275px;
            font-family:  "Comic Sans MS", cursive, sans-serif;
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


    </style>
</head>

<body style=" background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(assets/images/wed.jpg);">

<header>
    <div class="row">
        <div class="logo">
            <img src="assets/images/logo1.png" alt="wedding band">
        </div>
    </div>
</header>
<?php
$search_value = $_GET['search'];

require_once('PHP_database_insert/db.php');

//check connection
if ($db === false) {
    die ("Error: could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * from service_provider WHERE category = $search_value";
if ($result = mysqli_query($db, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        #  echo "All Contractors";

        //while ($row = mysqli_fetch_array($result)) {
        while($row = $result->fetch_array()){

            echo "<div class='card'>";
            echo "<div class='card-header'>" . $row['business_name'] . "</div>";
            # echo "<div class='card-body'>" . $row['category'] . "</div>";
            echo "</div>" . "<br>";
        }

//free result set
        mysqli_free_result($result);
    }
}else{
    echo "No records matching your query were found.";
}

?>

</body>
</html>

