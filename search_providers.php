<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.html");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Customer Homepage</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">
</head>

<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">

<header>
    <div class="grid-container">
        <div class="grid-50">
    <?php require 'PHP_database_insert/nav_bar.php';?>

    </div>
        </div>

</header>
<br><br><br>
<main>
<div class="grid-container">
    <div align="center">
        <h2 style="color:darkseagreen">Search for Service Providers</h2>
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

<div>



            <?php
            //check connection
            require_once('PHP_database_insert/db.php');
            if ($connection === false) {
                die ("Error: could not connect. " . mysqli_connect_error());
            }
            //assign search variable
            $search_value = $_GET['search_value'];
            //run query
            $sql = "SELECT s.SP_ID, i.SP_ID, s.category, s.business_name, s.price, s.description, i.image_type, i.photo_name, i.link
            from service_provider s, images i WHERE s.SP_ID = i.SP_ID AND s.category = '$search_value' AND i.image_type = 'logo' ORDER BY price ASC";
            if ($result = mysqli_query($connection, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='sp-row'>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<div class='sp_column'>";
                        echo "<div class='sp_card'>";
                        echo "<div class='container'>";
                        echo "<h2>" . "<a href ='service_providers.php?id={$row['SP_ID']}'>" . $row['business_name'] . "</a>" . "</h2>"."<img src='{$row['link']}' alt='{$row['photo_name']}' width='250', height='100'>";
                        echo "<p>"."£".$row['price']."</p>";
                        echo "<p class='title'>" . $row['category'] . "</p>";

                        echo "<p class=''>" . $row['description'] . "</p>";
                        echo "<form><button class='bt1' action = 'get'><input type ='hidden' name = 'sp_id' value = '{$row['SP_ID']}'>"
                              . "View Service Provider" . "</button></form>";
                        echo "</div>" . "<br>";
                        echo "</div>";
                        echo "</div>";
                    }
                    echo "</div>";
//free result set
                    mysqli_free_result($result);
                }else{
                    echo "No records matching your query were found.";
                }
            }

     // to sort price in ascending order
          if(isset($_GET['cost'])) {

                $cost = $_GET['cost'];

                $sql2 = "SELECT * FROM service_provider WHERE category = '$search_value' ORDER BY price ASC";
                $result2 = mysqli_query($connection, $sql2) or die ("Bad Query: $sql2");
                while ($row = mysqli_fetch_array($result2)) {
                    $row2 = ($row2 = mysqli_fetch_array($result2));
                    echo "<h2>" . $row2['business_name'] . "</h2>";
                    echo "<p>" . "£" . $row2['price'] . "</p>";
                }
            }
            ?>

</div>
    </div>
</main>


<footer>

</footer>

</body>
</html>
