<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Request a Service</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">


</head>

<!--<body style="background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">-->
<body>
<header>

<!--    <div class="grid-container">
        <div class="grid-50">
            <div class="row">
                <div class="logo">
                    <img src="assets/images/logo1.png" alt="wedding band">
                </div>
                <nav>
                    <ul class="main-nav">
                        <li><a href="contact_us.php">CONTACT US</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>-->
    <?php require '/Templates/navbar/navbar.php';?>
</header>

<main>

    <div class="bg-text3">

    <h3>Request a Service</h3>
<!--    <hr/>-->
    <p>Please submit your request to {{get SP name}}:</p>

    <form id="myform" onsubmit="emailjs.sendForm('outlook', 'Outlook_Customer_Request', this); return false;" method="post">
        <p align="centre"><textarea rows="4" cols="40" required name="message_html" placeholder="Type your service request here..."></textarea></p>
        <p align="left">Your name: <textarea rows="1" cols="23" required name="from_name" maxlength="30" placeholder="get cust name..."></textarea></p>
        <p align="left">Your email: <input type="email" required name="reply_to" maxlength="60" placeholder="get cust email..."></p>
        <p align="left">SP name: <textarea rows="1" cols="23" required name="to_name" maxlength="30" placeholder="get SP name..."></textarea></p>
        <p align="left">SP email: <input type="email" required name="supplier_email" maxlength="60" placeholder="get SP email..."></p>

        <button type="submit">Submit details</button>

        <button type="button" onclick="location.href='index.html';" class="cancelbtn">Cancel and leave</button>
    </form>

    <script type="text/javascript" src="https://cdn.emailjs.com/sdk/2.3.2/email.min.js"></script>
    <script type="text/javascript">
        (function(){
            emailjs.init("user_LFwLsmo7J3ufzDn6n6g3j");
        })();
    </script>
</div>



</main>

<footer class="footer">


</footer>

</body>


</html>
