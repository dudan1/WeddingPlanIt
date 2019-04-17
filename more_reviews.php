<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.html");

require_once('PHP_database_insert/db.php');

$sql = "SELECT * from service_provider WHERE sp_id = '$_SESSION[sp_id]'"; //run query
$result = mysqli_query($connection, $sql) or die ("Bad Query: $sql");
$row = ($row = mysqli_fetch_array($result));

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>More Reviews</title>
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
    <p><button class="btn3 info3" onclick="document.getElementById('id02').style.display='block'" style="width:110px;height:auto;float:right">Leave a Review</button></p>
    <div id="id02" class="modal">

        <form class="modal-content animate" action="PHP_database_insert/post_review.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                <!--<img src="assets/images/avatar.png" alt="Avatar" height="50" width="50">-->
            </div>
            <div class="container">
                <h1>Review for <?php echo $row['business_name']; ?></h1>
                <p>Please enter your review here<!-- for email address (email)-->.</p>
                <!--<p>Your email: <input type="email" required name="email"></p>-->
                <p>Header for your Review: <input type="text" required name="review_title" maxlength="100"></p>
                <p>Review:</p>
                <p><textarea required name="review_text" rows="9" cols="42"></textarea></p>
                <p>Review Score : <input type="text" required name="review_score" maxlength="3""></p>

                <button type="submit">Submit details</button>

                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
            </div>
        </form>
    </div>
</header>
<br><br><br><br><br>
<main>


    <div class = grid-container>
        <div class = 'grid-100'>
            <div class ="review-container">
                <?php
                $sql = " select r.review_title, r.review_score , r.review_text, r.review_date, c.first_name, c.surname 
                        from reviews r JOIN customer c ON r.SP_ID = '$_SESSION[sp_id]' AND c.C_ID = r.C_ID ORDER BY RAND()";

                if ($result = mysqli_query($connection, $sql)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                            $score = $row['review_score'];
                            if($score ==1){
                                $image = "<img src = 'assets/images/1_star.PNG' alt = '1_star' height = '15px'>";
                            }
                            elseif($score ==2){
                                $image = "<img src = 'assets/images/2_stars.PNG' alt = '2_star' height = '15px'>";
                            }
                            elseif($score ==3){
                                $image = "<img src = 'assets/images/3_stars.PNG' alt = '3_star' height = '15px'>";
                            }
                            elseif($score ==4){
                                $image = "<img src = 'assets/images/4_stars.PNG' alt = '4_star' height = '15px'>";
                            }
                            elseif($score ==5){
                                $image = "<img src = 'assets/images/5_stars.PNG' alt = '5_star' height = '15px'>";
                            }

                            echo "<div class='review'>";
                            echo "<h3>{$row['review_title']} &nbsp;&nbsp;&nbsp;&nbsp; {$image} </h3>";;
                            echo "<p>{$row['review_text']}</p>";
                            echo "<p>{$row['first_name']} {$row['surname']}<br>{$row['review_date']}</p></div>";
                        }
//free result set
                        mysqli_free_result($result);
                    }else{
                        echo "No records matching your query were found.";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="grid-50" style="background-color:whitesmoke">
            <form action ="calendar/calendar.php" method="post">
                <input type = "hidden" name = "c" value="<?php echo $cust_id; ?>">
                <input type = "hidden" name = "sp" value="<?php echo $sp_id; ?>">
                <button type="submit" style="width: 300px; margin-left: 180px;">BOOK THIS SERVICE PROVIDER</button>
            </form>
        </div>
        <div class="grid-50" style="background-color:whitesmoke">
            <form action ='cust_request.php'>
                <button type="submit" onclick="" style="width: 300px; margin-left: 110px;">CONTACT THIS SERVICE PROVIDER</button>
            </form>
        </div>
    </div>
    </div>
</main>


<footer class="footer">
    <?php require 'Templates/footer/footer.php';?>
</footer>


</body>
</html>
