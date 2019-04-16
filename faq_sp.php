<?php
/*session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.html");
*/ ?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>FAQs</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">
    <link rel="stylesheet" type="text/css" href="CSS/accordion.css">

<link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/superceded/favicon1.ico" type="image/x-icon">
</head>

<body>
<header>
    <?php require 'Templates/navbar/navbar_sp.php';?>
</header>

<main>
    <?php require 'Templates/about_us/faq_text.php';?>
</main>

<footer class="footer">
    <?php require 'Templates/footer/footer.php';?>
</footer>

</body>

</html>
