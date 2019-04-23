<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">


</head>

<body>
<header><?php require 'Templates/navbar/navbar_out.php';?></header>

<div class = "bg-text3">

    <!-- Main -->

    <h1>Wedding Planit<br/></h1>

    <H2>Change password (you will receive an email containing a token to reset your password):</H2>

    <form id="myform" onsubmit="emailjs.sendForm('outlook', 'Reset', this); return false;" method="post">

        <input type="hidden" name="reply_to" value="ncfbuy@gmail.com">
        <input type="hidden" name="from_name" value="Mr Pickle">
        <input type="hidden" name="insert_token_var" value="R2D2C3P0">

        <button type="submit">Reset</button>

        <!--            <button type="button" onclick="location.href='index.php';" class="cancelbtn">Cancel</button>-->
        <!--        </form>-->

</div>

<script type="text/javascript" src="https://cdn.emailjs.com/sdk/2.3.2/email.min.js"></script>
<script type="text/javascript">
    (function(){
        emailjs.init("user_ckWAao4PCR1a26IP36zAp");
    })();
</script>


<footer class="footer">
    <?php require 'Templates/footer/footer.php';?>
</footer>
</body>

</html>

