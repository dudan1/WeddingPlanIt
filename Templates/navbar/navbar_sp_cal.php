<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/navbar.css">

<div class="topnav" id="myTopnav">
    <div>
        <a href="../sp_home.php"><img src="assets/images/logo1.png" alt="image link back to portal"
                                 title="image link back to portal" class="responsive"></a>
    </div>
    <a href="sp_home.php">Homepage</a>
    <a href="faq_sp.php">About Us/FAQs</a>
    <a href="contact_us_sp.php">Contact Us</a>
    <a href="my_calendar.php">Calendar</a>
    <a href="sp_profile.php">Profile</a>
    <a href="pic_upload.php">Manage My Photos</a>
    <a href="PHP_database_insert/logout.php">Logout</a>
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


