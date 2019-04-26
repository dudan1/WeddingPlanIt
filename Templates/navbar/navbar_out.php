<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/navbar.css">

<div class="topnav" id="myTopnav" itemscope>
    <div>
    <a href="index.php"><img src="assets/images/logo1.png" alt="image link back to portal"
                                 title="image link back to portal" class="responsive"></a>
    </div>
    <a href="faq.php">About Us/FAQs</a>
    <a href="contact_us.php">Contact Us</a>
<!--    <a href="sp_home.php">Back to Homepage</a>-->
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
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
