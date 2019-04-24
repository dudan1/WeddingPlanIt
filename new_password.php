<?php
$token = $_GET['token'];

include('PHP_database_insert/app_logic.php');

?>
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
            <h2 class="form-title">New password</h2>
            <!-- form validation messages -->
            <!--    --><?php //include('messages.php'); ?>
            <div class="form-group">
                <label>New password</label>
                <input type="password" name="new_pass">
            </div>
            <div class="form-group">
                <label>Confirm new password</label>
                <input type="hidden" value="<?php echo $token ?>" name="token">
                <input type="password" name="new_pass_c">
            </div>
            <div class="form-group">
                <button type="submit" name="new_password" class="login-btn">Submit</button>
            </div>
        </form>
    </div>
</main>
</body>

</html>

