<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/navbar.css">

<div class="topnav" id="myTopnav">
    <div>
        <a href="../cust_home.php"><img src="../assets/images/logo1.png" alt="image link back to portal"
                                 title="image link back to portal" class="responsive"></a>
    </div>
    <a href="../cust_home.php">Homepage</a>
    <a href="../faq_cust.php">About Us/FAQs</a><!-- class="active"-->
    <a href="../contact_us_cust.php">Contact Us</a>
    <a href="../plan.php">My Plan</a>
    <a href="../checklist.php">Checklist</a>
    <a href="../PHP_database_insert/logout.php">Logout</a>
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


