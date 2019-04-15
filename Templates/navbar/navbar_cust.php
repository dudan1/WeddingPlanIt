<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/navbar.css">
</head>

<div class="logo">
    <a href="index.php"><img src="assets/images/logo1.png" alt="Image link back to Portal" title="Image link back to Portal"></a>

<div class="topnav" id="myTopnav">

    <a href="cust_home.php">Homepage</a>
    <a href="faq.php">FAQs</a><!-- class="active"-->
    <a href="contact_us.php">Contact Us</a>
    <a href="plan.php">My Plan</a>
    <a href="checklist.php">Checklist</a>
    <a href="PHP_database_insert/logout.php">Logout</a>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</div>
</div>

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
