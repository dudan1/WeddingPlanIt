<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.html");

    require_once('PHP_database_insert/db.php');
    //$sp_id = $_GET['id']; // assign variable for id
    $sql = "SELECT C_ID FROM customer WHERE '$_SESSION[name]' = email";
    $result =mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $cust_id = $row['C_ID'];


// Join Contracts and Service_provider table
    $sql2 = "SELECT business_name, category 
            FROM contracts c, service_provider s
            WHERE c.SP_ID = s.SP_ID AND Cust_ID = '$cust_id'";
            $result2 =mysqli_query($connection,$sql2);
            $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);

            //Still working on the above

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Wedding Plan</title>
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
        <h2 style="color:darkseagreen">Wedding Plan</h2>
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
                    echo "<div class='container'>";
                    echo "<p>" . "Wedding date: " . $row['wed_date'] . "</p>";
                    echo "<h2>" . "<a href ='service_providers.php?id={$row['SP_ID']}'>" . $row['business_name'] . "</a>" . "</h2>";
                    echo "<p class='title'>" . $row['category'] . "</p>";
                    echo "<p class=''>" . $row['description'] . "</p>";
                    echo "<p><a href='service_providers.php?id={$row['SP_ID']}' class='button'>View Service Provider</a></p>";
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


</main>
<footer>

</footer>

</body>
</html>
