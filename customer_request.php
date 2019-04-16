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

<body link="#C0C0C0" vlink="#808080" alink="#FF0000" style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">

<header>
    <?php require 'Templates/navbar/navbar_out.php';?>
</header>

<main>
<div class = "bg-text1">

    <h1>Request a Service</h1>
    <hr/>
    <p>Please submit a query:</p>

    <form id="myform" onsubmit="emailjs.sendForm('Outlook', 'Outlook_Customer_Request', this); return false;" method="post">
        <p align="left"><textarea rows="4" cols="47" required name="message_html" placeholder="Type your query here..."></textarea></p>
        <p align="left">Your name: <input type= rows="1" cols="23" required name="from_name" maxlength="30" placeholder="to fetch..."></input></p>
        <p align="left">Your email: <input type="email" required name="reply_to" maxlength="60" placeholder="to fetch..."></p>
        <p align="left">Supplier name: <textarea rows="1" cols="23" required name="to_name" maxlength="30" placeholder="to fetch..."></textarea></p>
        <p align="left">Supplier email <input type="email" required name="supplier_email" maxlength="60" placeholder="to fetch..."></p>

        <button type="submit">Submit details</button>

        <button type="button" onclick="location.href='index.html';" class="cancelbtn">Cancel and leave</button>
    </form>

    <script type="text/javascript" src="https://cdn.emailjs.com/sdk/2.3.2/email.min.js"></script>
    <script type="text/javascript">
        (function(){
            emailjs.init("user_LFwLsmo7J3ufzDn6n6g3j");
        })();
    </script>
    <hr/>
<!--    <p>Or via email:</p>
    <p><a href="mailto:0006664@rgu.ac.uk?subject="Wedding PlanIt Customer Query">Email: WPSupport@rgu.ac.uk</a></p>-->

</div>
</main>

<footer class="footer">
    <?php require 'Templates/footer/footer.php';?>
</footer>

</body>


</html>
