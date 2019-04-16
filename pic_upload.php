<?php
session_start();
if (!IsSet($_SESSION["name"]))
    header("Location:index.php");
if (($_SESSION["user_type"]) == "Service Provider") {
}
if (($_SESSION["user_type"]) != "Service Provider") {
    header("Location:../cust_home.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                document.getElementById('filename1').value = fileName
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                document.getElementById('filename2').value = fileName
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                document.getElementById('filename3').value = fileName
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

<!--<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">-->
<body>
<header>
    <?php require '/Templates/navbar/navbar_sp.php';?>
<!--    <div class="row">
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
    </div>-->
</header>

<main>
    <div class="grid-container" style="padding-top: 120px">
    <section class="grid-50" name="left" id="left">
        <article name="upload_form" id="upload_form">
        <h3>Upload Images</h3>
        <form action="PHP_database_insert/upload.php" method="post" enctype="multipart/form-data" >
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="hidden" name="filename1" id="filename1">
            <input type="hidden" name="image_type" id="image_type" value="image">
            <p>Caption or description for the photo:<textarea name="caption" rows="3" cols="50" maxlength="45" ></textarea></p>
            <input type="submit" value="Upload Image" name="submit">
        </form>
        </article>
        <br>
        <article name="profile_pic" id="profile_pic">
                <h3>Profile Picture</h3>
                <form action="PHP_database_insert/upload.php" method="post" enctype="multipart/form-data">
                    Select image to be your profile picture:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="hidden" name="filename2" id="filename2">
                    <input type="hidden" name="image_type" id="image_type" value="profile">
                    <input type="hidden" name="caption" id="caption" value="Profile Picture">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
           <?php
           require 'PHP_database_insert/db.php';
            $sql = "SELECT photo_id, link, image_type FROM images WHERE SP_ID = '$_SESSION[SP_ID]' AND image_type = 'profile'";
            $result =mysqli_query($connection,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
           $count = mysqli_num_rows($result);
            if($count > 0) {
                $profile = $row['link'];
            }
            else{
                $profile = 'No Profile Picture Selected';
            }
            echo '<p>Current Profile Picture:</p>';
            echo "<img src ='{$profile}' alt='Profile Picture' height ='180'>"
            ?>
            </article>
    </section>
        <section class="grid-50" name="right" id="right">
            <article name="delete_form" id="delete_form">
            <h3>Delete Images</h3>
            <form action="PHP_database_insert/delete.php" method="post">
                Select image to delete:
                <select name="fileToDelete" id="fileToDelete">
                    <?php
                    require_once ('PHP_database_insert/db.php');
                    $sql = "SELECT photo_name, link FROM images WHERE SP_ID = '$_SESSION[SP_ID]'";
                    $result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
                    while($row =mysqli_fetch_array($result)){
                        echo "<option value='{$row['link']}'>{$row['photo_name']}</option>";
                    }
                    ?>
                </select>
                <input type="submit" value="Delete" name="submit">
            </form>
            </article>
            <br><br><br><br><br><br><br><br>
            <article name="logo" id="logo">
                <h3>Business Logo</h3>
                <form action="PHP_database_insert/upload.php" method="post" enctype="multipart/form-data">
                    Select image to be your business logo:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="hidden" name="filename3" id="filename3">
                    <input type="hidden" name="image_type" id="image_type" value="logo">
                    <input type="hidden" name="caption" id="caption" value="Business Logo">
                    <input type="submit" value="Upload Image" name="submit">
                </form>
                <?php
                require 'PHP_database_insert/db.php';
                $sql = "SELECT photo_id, link, image_type FROM images WHERE SP_ID = '$_SESSION[SP_ID]' AND image_type = 'logo'";
                $result =mysqli_query($connection,$sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                $count = mysqli_num_rows($result);
                if($count > 0) {
                    $logo = $row['link'];
                }
                else{
                    $logo = 'No Logo Selected';
                }
                echo '<p>Current Business Logo:</p>';
                echo "<img src ='{$logo}' alt='Business Logo' height='180'>"
                ?>
            </article>
        </section>
    </div>
</main>
<footer class="footer">
    <?php require 'Templates/footer/footer.php';
    ?>
</footer>


</body>
</html>