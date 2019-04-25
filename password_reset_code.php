<?php
session_start();
$token = $_SESSION['token'];
$email = $_SESSION['email'];

?>


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
<header><?php require 'Templates/navbar/navbar_out.php'; ?></header>

<main>

    <div class="bg-text3">

        <!-- Main -->


        <h1>Wedding Planit</h1>

        <H3>In order to complete your password reset, we will email you a verification code token. Please click the blue
            "GET TOKEN" button below and wait for your email to arrive.</H3>

        <form id="myform" onsubmit="emailjs.sendForm('outlook', 'Reset', this); return false;" method="post">

            <input type="hidden" name="reply_to" value="<?php echo $email ?>">
            <!--        <input type="hidden" name="from_name" value="User password change request">-->
            <input type="hidden" name="insert_token_var" value="<?php echo $token ?>">

            <button class="button1" type="submit">GET TOKEN</button>

        </form>
        <hr>
        <H3>When you have received your code, type it in the box below and click the green "Submit Token" button.</H3>
        <form id="another form" action="new_password.php" method="GET">
            <!--        <p align="left">Enter Token: <textarea rows="1" cols="23" required name="from_name" maxlength="30"></textarea></p>-->
            <p align="left">Enter Token:<input type="text" required name="token"></p>

            <button class="button2" type="submit" name="new_password">Submit Token</button>
        </form>

    </div>

    <script type="text/javascript" src="https://cdn.emailjs.com/sdk/2.3.2/email.min.js"></script>
    <script type="text/javascript">
        (function () {
            emailjs.init("user_ckWAao4PCR1a26IP36zAp");
        })();
    </script>
</main>

<footer class="footer">
    <?php require 'Templates/footer/footer.php'; ?>
</footer>
</body>

</html>

