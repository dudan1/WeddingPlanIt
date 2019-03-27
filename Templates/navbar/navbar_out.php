<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/navbar.css">
</head>
<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">

<div class="logo">
    <a href="index.php"><img height="100px" src="assets/images/logo1.png" alt="wedding band" title="wedding band"></a>

<div class="topnav" id="myTopnav">

    <a href="faq.php">FAQs</a><!-- class="active"-->
    <a href="contact_us.php">Contact Us</a>
    <a href="cust_home.php">Back to Customer Homepage</a>
    <a href="sp_home.php">Back to Service Provider Homepage</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</div>
</div>

<!--<div class="logo" style="padding-left:10%"; padding-right: 0%"; padding-left:10%">
    <img align="left" height="100px" src="../assets/images/logo1.png" alt="wedding band" title="wedding band">
</div>-->

<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>

</body>
</html>
