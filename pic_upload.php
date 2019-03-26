<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                document.getElementById('filename').value = fileName
            });
        });
    </script>

    <title>Upload Picture</title>
    <style>
        .block {
            display: block;
            width: 80%;
            border: none;
            background-color:burlywood;
            color:black;
            padding: 14px 28px;
            font-size: 16px;
            font-family: "Trebuchet MS", "Helvetica", "Sans-serif";
            cursor: pointer;
            text-align: center;
        }

        .block:hover {
            background-color:darkseagreen;
            color: black;
        }
    </style>
</head>

<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">
<header>
    <div class="row">
        <div class="logo">
            <img src="assets/images/logo1.png" alt="wedding band">
        </div>
        <nav>
            <ul class="main-nav">
                <li><a href="sp_home.php">HOME</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="my_calendar.php">MY CALENDAR</a></li>
                <li><a href="PHP_database_insert/logout.php">LOG OUT</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <div class="grid-container">
    <div class="grid-50" name="upload_form" id="upload_form">
        <h3>Upload Images</h3>
        <form action="PHP_database_insert/upload.php" method="post" enctype="multipart/form-data" >
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="hidden" name="filename" id="filename">
            <p>Caption or description for the photo:<textarea name="caption" rows="3" cols="50" maxlength="45" ></textarea></p>
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>
        <div class="grid-50" name="delete_form" id="delete_form">
            <h3>Delete Images</h3>
            <form action="PHP_database_insert/upload.php" method="post" enctype="multipart/form-data" >
                Select image to delete:
                <select name="fileToDelete" id="fileToDelete">
                    <?php
                    require_once ('PHP_database insert/db.php');
                    $sql = "SELECT photo_name FROM images WHERE SP_ID = '$_SESSION[SP_ID]'";

                    ?>
                </select>
                <input type="hidden" name="filename" id="filename">
                <input type="submit" value="Upload Image" name="submit">
            </form>
        </div>
    </div>
</main>



</body>
</html>