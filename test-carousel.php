<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.html");
if (($_SESSION["user_type"]) == "Service Provider") {
    if (($_SESSION["user_type"]) != "Service Provider")
        header("Location:../cust_home.php");

    require('PHP_database_insert/db.php');

    $email = $_SESSION['name'];

    $sql = "SELECT * FROM service_provider WHERE email = '$email'";
    $result =mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    $sp_id = $row['SP_ID'];
    $_SESSION['SP_ID']= $sp_id;
    $firstname = $row['first_name'];
    $surname = $row['surname'];
    $address = $row['address'];
    $postcode = $row['postcode'];
    $business_name = $row['business_name'];
    $category = $row['category'];
    $description = $row['description'];
} else{
    header("Location: cust_home.php");
}
?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
        font-family: Arial;
        margin: 0;
    }

    * {
        box-sizing: border-box;
    }

    img {
        vertical-align: middle;
    }

    /* Position the image container (needed to position the left and right arrows) */
    .container {
        position: relative;
    }

    /* Hide the images by default */
    .mySlides {
        display: none;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor {
        cursor: pointer;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 40%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* Container for image text */
    .caption-container {
        text-align: center;
        background-color: #222;
        padding: 2px 16px;
        color: white;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Six columns side by side */
    .column {
        float: left;
        width: 16.66%;
    }

    /* Add a transparency effect for thumnbail images */
    .demo {
        opacity: 0.6;
    }

    .active,
    .demo:hover {
        opacity: 1;
    }
</style>
<body>

<h2 style="text-align:center">Slideshow Gallery</h2>

<div class="container">



        <?php
        $sql = "select link, photo_name, caption from images where SP_ID = $sp_id";

        if ($result = mysqli_query($connection, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo "<div class='mySlides'>";
                    echo "<img src='{$row['link']}' alt='{$row['photo_name']}' width='80%'>";
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



    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>

    <div class="caption-container">
        <p id="caption"></p>
    </div>

    <div class="row">
        <div class="column">
            <?php

            $sql2 = "select link, photo_name, caption from images where SP_ID = $sp_id";

            if ($result2 = mysqli_query($connection, $sql2)) {
                if (mysqli_num_rows($result2) > 0) {
                    #echo "<div class='row'>";
                   # echo " <div class='column'>";
                    while ($row = mysqli_fetch_array($result2)) {
                        echo " <img class='demo cursor' src='{$row['link']}' style='width:100%' onclick='currentSlide(1)' alt='{$row['caption']}'>";
                       # echo "<img src='{$row['link']}' alt='{$row['photo_name']}' width='80%'>";
                        #echo "<div class='caption'>{$row['caption']}</div> </div>";
                    }
                   # echo "</div>";
                   # echo "</div>";
//free result set
                    mysqli_free_result($result2);
                }else{
                    echo "No records matching your query were found.";
                }
            }

            ?>

        </div>
        <div class="column">
            <img class="demo cursor" src="img_5terre.jpg" style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
        </div>


    </div>


<script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
    }
</script>

</body>
</html>
