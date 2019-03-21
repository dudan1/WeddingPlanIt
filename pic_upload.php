<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">


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
                <li><a>HOME</a></li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="my_calendar.php">MY CALENDAR</a></li>
                <li><a href="PHP_database_insert/logout.php">LOG OUT</a></li>
            </ul>
        </nav>
    </div>
</header>

<main>
    <div class="grid-container">
    <div align="center">

        <form action="PHP_database_insert/upload.php" method="post" enctype="multipart/form-data" >
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <p>Name of photo:<input type="text" name="photo_name" id="photo_name"></p>
            <p>Caption or description for the photo:<textarea name="caption" rows="4" cols="50"></textarea></p>
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>
    </div>
</main>


</body>
</html>