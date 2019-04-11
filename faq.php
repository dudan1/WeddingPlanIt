<?php
/*session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.html");
*/ ?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>FAQs</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">
    <link rel="stylesheet" type="text/css" href="CSS/accordion.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">


    <!--<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">-->
<body>



<header>
    <?php include 'Templates/navbar/navbar_out.php';

    ?>


</header>

<div class="bg-text3">

    <h1>Wedding Plan<font color="red">I</font>t<br />FAQs</h1>
    <hr/>
    <div class="accordion-bral">

        <!-- accordion item 1 -- start -->
        <div>
            <input class="ac-input" id="ac-1" name="accordion-1" type="checkbox"/>
            <label class="ac-label" for="ac-1">How do i join Wedding Plan<font color="red">I</font>t?<i></i></label>
            <div class="article ac-content">
                <p>Easy, just click the "Sign Up" Button above.</p>
            </div>
        </div>
        <!-- accordion item 1 -- end -->

        <!-- accordion item 2 -- start -->
        <div>
        <input class="ac-input" id="ac-2" name="accordion-1" type="checkbox"/>
        <label class="ac-label" for="ac-2">How can I change my password?<i></i></label>
        <div class="article ac-content">
            <p>After login, go to your profile and select "Change Password".</p>
        </div>
    </div>
    <!-- accordion item 2 -- end -->

        <!-- accordion item 3 -- start -->
        <div>
            <input class="ac-input" id="ac-3" name="accordion-1" type="checkbox"/>
            <label class="ac-label" for="ac-3">Who runs Wedding Plan<font color="red">I</font>t?<i></i></label>
            <div class="article ac-content">
                <p>"JDTN" Group D.</p>
            </div>
        </div>
        <!-- accordion item 3 -- end -->

        <!-- accordion item 4 -- start -->
        <div>
            <input class="ac-input" id="ac-4" name="accordion-1" type="checkbox"/>
            <label class="ac-label" for="ac-4">How can I contact Wedding Plan<font color="red">I</font>t?<i></i></label>
            <div class="article ac-content">
                <p>Select "Contact Us" from the Navigation Bar above.</p>
            </div>
        </div>
        <!-- accordion item 4 -- end -->

        <!-- accordion item 5 -- start -->
        <div>
            <input class="ac-input" id="ac-5" name="accordion-1" type="checkbox"/>
            <label class="ac-label" for="ac-5">Will I have a happy marriage?<i></i></label>
            <div class="article ac-content">
                <p>We give you a "25 Years of Happiness" warranty. Warranty can be extended in 5 year blocks thereafter.</p>
            </div>
        </div>
        <!-- accordion item 5 -- end -->

        <!-- accordion item 6 -- start -->
    <div>
        <input class="ac-input" id="ac-6" name="accordion-1" type="checkbox"/>
        <label class="ac-label" for="ac-6">How much is the extended warranty?<i></i></label>
        <div class="article ac-content">
            <p>For each 5 year extension, we merely ask for 10% of your soul.</p>
        </div>
    </div>
    <!-- accordion item 6 -- end -->
    </div>
    </div>
<!---->
<!--    <main id="accordion">-->
<!---->
<!--        <section id="item1">-->
<!--            <a href="#item1">How can I change my password?</a>-->
<!--            <p>After login, go to your profile and select "Change Password".</p>-->
<!--        </section>-->
<!---->
<!--        <section id="item2">-->
<!--            <a href="#item2">How can I contact Wedding PlanIt?</a>-->
<!--            <p>Select "Contact Us" from the Navigation Bar above.</p>-->
<!--        </section>-->
<!---->
<!--        <section id="item3">-->
<!--            <a href="#item3">Who runs Wedding PlanIt?</a>-->
<!--            <p>D Group.</p>-->
<!--        </section>-->
<!---->
<!--        <section id="item4">-->
<!--            <a href="#item4">Will I have a happy marriage?</a>-->
<!--            <p>We give you a 25 year happiness warranty. Warranty can be extended in 5 year blocks thereafter.</p>-->
<!--        </section>-->
<!---->
<!--        <section id="item5">-->
<!--            <a href="#item5">How much is the extended warranty?</a>-->
<!--            <p>For each 5 year extension, we <merely></merely> ask for 10% of your soul.</p>-->
<!--        </section>-->
<!--        <hr/>-->
<!---->
<!--    </main>-->
<!---->
<!--    <hr/>-->
<!--    <form action="PHP_database_insert?" method="post">-->
<!--        <p align="left">Search: <input type="search" required name="address" maxlength="60"<br/>-->
<!--            <button type="submit">Search</button>-->
<!--            <br/>-->
<!--            <button type="button" onclick="location.href='index.php';" class="cancelbtn">Cancel</button>-->
<!--        </p>-->
<!--        <hr/>-->
<!--        <p align="left">Search Results</p>-->
<!--        <p align="left">Result</p>-->
<!--        <p align="left">Result</p>-->
<!--        <p align="left">Result</p>-->
<!--        <p align="left">Result></p>-->
    </form>
</div>


<footer class="footer">
    <!--<p>DJNT (c) 2019</p>
    <p>Join us on</p>
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-google"></a>
    <a href="#" class="fa fa-instagram"></a>
    <a href="#" class="fa fa-youtube"></a>
    -->

</footer>

</body>


</html>

<!--    <style>
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
            width:auto;
            height:100px;
            float: center;
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
            padding: 5px 30px;
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


    </style>-->
