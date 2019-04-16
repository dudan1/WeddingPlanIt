<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.php");
require_once 'PHP_database_insert/db.php';
$sql = "Select email, business_name FROM service_provider WHERE SP_ID = '$_SESSION[sp_id]'";
$result =mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$sp_email = $row['email'];
$sp_name = $row['business_name'];

$sql = "Select first_name, surname FROM customer WHERE email = '$_SESSION[name]'";
$result =mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$c_email = $_SESSION['name'];
$c_name = $row['first_name']." ".$row['surname'];

?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Request a Service</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

<link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/superceded/favicon1.ico" type="image/x-icon">


</head>

<!--<body style="background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">-->
<body>
<header>
    <?php require '/Templates/navbar/navbar_cust.php';?>
</header>

<main>

    <div class="bg-text3">

    <h3>Request a Service</h3>
<!--    <hr/>-->
    <p>Please submit your request to <?php echo $sp_name ?></p>
<div class="">
    <form id="myform" onsubmit="emailjs.sendForm('outlook', 'Outlook_Customer_Request', this); return false;" method="post">
        <p align="centre"><textarea rows="4" cols="40" required name="message_html" placeholder="Type your service request here..."></textarea></p>
        <input type="hidden" name="supplier_email" id="SP_email" value='<?php echo $sp_email ?>'>
        <input type="hidden" name="reply_to" id="Cust_email" value='<?php echo $c_email ?>'>
        <input type="hidden" name="to_name" id="SP_name" value='<?php echo $sp_name ?>'>
        <input type="hidden" name="from_name" id="Cust_name" value='<?php echo $c_name ?>'>

        <button type="submit">Submit details</button>

        <button type="button" onclick="location.href='index.html';" class="cancelbtn">Cancel and leave</button>
    </form>
</div>

    <script type="text/javascript" src="https://cdn.emailjs.com/sdk/2.3.2/email.min.js"></script>
    <script type="text/javascript">
        (function(){
            emailjs.init("user_LFwLsmo7J3ufzDn6n6g3j");
        })();
    </script>
</div>



</main>

<footer class="footer">
    <?php require 'Templates/footer/footer.php';?>
</footer>

</body>


</html>
