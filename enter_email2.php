<?php include('PHP_database_insert/app_logic.php'); ?>
<!DOCTYPE html>
<html>
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
    <?php require 'Templates/navbar/navbar_cust.php';?>
</header>
<main>
<div class="bg-text3">
<form class="login-form" action="PHP_database_insert/app_logic.php" method="post">
    <h2 class="form-title">Reset password</h2>
    <!-- form validation messages -->
    <?php include('messages.php'); ?>
    <div class="form-group">
        <label>Your email address</label>
        <input required type="email" name="email">
    </div>
    <div class="form-group">
        <button type="submit" name="reset-password" class="login-btn">Submit</button>
    </div>
</form>
</div>
</main>
</body>

</html>

