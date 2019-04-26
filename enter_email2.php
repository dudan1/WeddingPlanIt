<?php include('PHP_database_insert/password_reset.php'); ?>
<!DOCTYPE html>
<html>
<!-- Acknowledgements of sources can be found in the footer of each page -->
<head>

    <meta charset="UTF-8">
    <title>Enter Email - Wedding PlanIt</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">


</head>


<body>
<header>
    <?php require 'Templates/navbar/navbar_out.php';?>
</header>
<main>
<div class="bg-text3">
<form class="login-form" action="PHP_database_insert/password_reset.php" method="post">
    <h2 class="form-title">Reset password</h2>
    <!-- form validation messages -->
<!--    --><?php //include('messages.php'); ?>
    <div class="form-group">
        <label>To reset your password, please enter the email address associated with your account.<br><p>&nbsp;</p></label>
        <input required type="email" name="email" size="30" placeholder="Insert email here">
    </div>
    <div class="form-group">
        <button type="submit" name="reset-password" class="login-btn">Submit</button>
    </div>
</form>
</div>
</main>
</body>

<footer class="footer">
    <?php require 'Templates/footer/footer.php'; ?>
</footer>

</html>

