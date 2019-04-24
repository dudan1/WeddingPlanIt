<?php include('PHP_database_insert/app_logic.php'); ?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Password Reset - Wedding PlanIt</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">


</head>

<body>
<header>
    <?php require 'Templates/navbar/navbar_cust.php';?>
</header>
<main>
    <div class="bg-text3">

        <form class="login-form" action="login.php" method="post" style="text-align: center;">
            <p>
                We sent an email to  <b><?php echo $_GET['email'] ?></b> to help you recover your account.
            </p>
            <p>Please login into your email account and click on the link we sent to reset your password</p>
        </form>


    </div>
</main>
</body>

</html>

