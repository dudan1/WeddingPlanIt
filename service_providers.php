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
        $_SESSION['sp_id'] = $_GET['id'];
    }
    $sql = "Select C_ID FROM customer WHERE '$_SESSION[name]' = email";
    $result =mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $_SESSION['cust_id'] = $row['C_ID'];

    $id = $_GET['id']; // assign variable for id
    $sql2 = "SELECT * from service_provider WHERE sp_id = '$id'"; //run query
    $result2 = mysqli_query($connection, $sql2) or die ("Bad Query: $sql2");
    $row2 = ($row2 = mysqli_fetch_array($result2));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Service Provider Details</title>
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
                <h1>Review for <?php echo $row2['business_name']; ?></h1>
                <p>Please enter your review here<!-- for email address (email)-->.</p>
                <!--<p>Your email: <input type="email" required name="email"></p>-->
                <p>Header for your Review: <input type="text" required name="review_title" maxlength="100"></p>
                <p>Review:</p>
                <p><textarea required name="review_text" rows="9" cols="42"></textarea></p>
                <p>Review Score : <select name="review_score">
                    <option></option>
                        <option value="1.0">1</option>
                        <option value="2.0">2</option>
                        <option value="3.0">3</option>
                        <option value="4.0">4</option>
                        <option value="5.0">5</option>
                    </select>

                    <!--required name="review_score" maxlength="3""></p> -->

                <button type="submit">Submit details</button>

                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->

            </div>
        </form>
    </div>
</header>
<br><br><br><br><br>
<main>
    <div class="grid-container">
        <div class="grid-70"><a href="javascript:history.go(-1)">Return to search results</a>



        <br>

        <?php
// average score for service provider reviews
        $sid  =$_SESSION['sp_id'];

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

       //echo "<p>"."counter ".$counter."</p>";
      //  echo "<p>". "score ".$score."<p>";
        echo "<p><i STYLE='color: goldenrod'>". "Average ".$average. " based on ".$counter. " reviews"."</i></p>";
        } else{
            echo "There are no reviews for this Service Provider";
        }

///end


        // display service provider details
        $id = $_GET['id']; // assign variable for id
        $sql2 = "SELECT * from service_provider WHERE sp_id = '$id'"; //run query
        $result2 = mysqli_query($connection, $sql2) or die ("Bad Query: $sql2");
        $row2 = ($row2 = mysqli_fetch_array($result2));
        echo "<h2>" . $row2['business_name'] . "</h2>";
       //  echo "<p>". "average ".$average. "</p>";
        echo "<p>". "Standard price per day: £".$row2['price']. "</p>";
        echo "<p>" . $row2['description'] . "</p>";
        ?>
    </div>
        <div class ='grid-30'>
            <?php
            $sql = "select link, photo_name, caption, image_type from images where SP_ID = $_SESSION[sp_id] AND image_type ='profile'";

            if ($result = mysqli_query($connection, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<a target='_blank' href={$row['link']} ><img src='{$row['link']}' alt='{$row['photo_name']}', height='150' style='margin: 30px'></a>";
                    }
//free result set
                    mysqli_free_result($result);
                }else{
                    echo "";
                }
            }
            $sql = "select link, photo_name, caption, image_type from images where SP_ID = $_SESSION[sp_id] AND image_type ='logo'";

            if ($result = mysqli_query($connection, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<a target='_blank' href={$row['link']} ><img src='{$row['link']}' alt='{$row['photo_name']}', height='150' style='margin: 30px'></a>";
                        echo "</div>";
                    }
//free result set
                    mysqli_free_result($result);
                }else{
                    echo "";
                }
            }
            ?>

        </div>
    </div>

    <div class = grid-container>
    <div class = 'grid-100'>
        <div class="gallery_container">


            <?php
            $sql = "select link, photo_name, caption, image_type from images where SP_ID = $_SESSION[sp_id] AND image_type ='image'";

            if ($result = mysqli_query($connection, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<div class='gallery'>";
                        echo "<a target='_blank' href={$row['link']} ><img src='{$row['link']}' alt='{$row['photo_name']}' width='150', height='100'></a>";
                        echo "<div class='caption'>{$row['caption']}</div> </div>";
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

    <div class = grid-container>
        <div class = 'grid-100'>
            <div class ="review-container">
                <?php
                // to display reviews
              $sql =  " select r.review_title, r.review_score , r.review_text, r.review_date, c.first_name, c.surname 
                        from reviews r JOIN customer c ON r.SP_ID = '$id' AND c.C_ID = r.C_ID ORDER BY RAND()";

                /*$sql = "select r.review_title, r.review_score , r.review_text, r.review_date, c.first_name, c.surname
                        from reviews r, customer c where c.C_ID = $_SESSION[cust_id] AND c.C_ID = r.C_ID ORDER BY RAND() LIMIT 3";*/

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
                        echo "No reviews have been submitted for this Service Provider.";
                    }
                }
                ?>
                <p><a href="more_reviews.php">More Reviews</a></p>
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
