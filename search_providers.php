<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.php");
?>
<!DOCTYPE html>
<html>
<!-- Acknowledgements of sources can be found in the footer of each page -->
<head>
    <meta charset="UTF-8">
    <title>Search Service Providers</title>
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
            $sql = "SELECT s.SP_ID, i.SP_ID, s.category, s.business_name, s.price, s.description, s.IsVetted, i.image_type, i.photo_name, i.link
            from service_provider s, images i WHERE s.SP_ID = i.SP_ID AND s.category = '$search_value'  AND i.image_type = 'logo'
             AND s.IsVetted = '1' ORDER BY price ASC";
            if ($result = mysqli_query($connection, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<div class='sp-row'>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<div class='sp_column'>";
                        echo "<div class='sp_card'>";
                        echo "<div class='container'>";
                        //to display average of reviews made by customers
               /*        $sid  =$_SESSION['sp_id'];

                        $query = "SELECT SP_ID, review_score FROM reviews WHERE SP_ID = '$sid'";
                        $result3 = mysqli_query($connection,$query);

                        $row3 = mysqli_num_rows($result3);
                        $score = 0;
                        $counter = 0;
                        while ($row3 = mysqli_fetch_array($result3)) {
                            $score += $row3['review_score'];
                            $counter++;

                        }
                        if($counter !=0){

                            $average = $score/$counter;
                            echo "<p><b><i STYLE='color: goldenrod'>". "Overall rating: ".$average. " based on ".$counter. " reviews"."</i></b></p>";
                        } else{
                            echo "There are no reviews for this Service Provider";
                        }*/
                        //end
                        echo "<h2>" . "<a href ='service_providers.php?id={$row['SP_ID']}'>" . $row['business_name'] . "</a>" . "</h2>"."<img src='{$row['link']}' alt='{$row['photo_name']}' width='250', height='100'>";
                        echo "<p>"."£".$row['price']."</p>";
                        echo "<p class='title'>" . $row['category'] . "</p>";

                        echo "<p class=''>" . $row['description'] . "</p>";
                        echo "<form action = 'service_providers.php' method='get'><button type = 'submit' class='bt1'><input type ='hidden' name = 'id' value = '{$row['SP_ID']}'>"
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
            $sql = "SELECT SP_ID, category, business_name, price, description, IsVetted
            from service_provider WHERE category = '$search_value'  AND i.image_type = 'logo'
             AND s.IsVetted = '1' ORDER BY price ASC";

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


<footer class="footer">
    <?php require 'Templates/footer/footer.php';?>
</footer>

</body>
</html>
