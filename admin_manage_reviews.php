<?php
session_start();
if($_SESSION['user_type'] != 'Admin'){
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>Manage Reviews</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <script type="text/javascript">
        function getReviews(str) {
            if (str == "") {
                document.getElementById("reviewTable").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("reviewTable").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","PHP_database_insert/admin_view_reviews.php?sp_id="+str,true);
                xmlhttp.send();
            }
        }

    </script>

</head>

<body>
<header>
    <?php require 'Templates/navbar/navbar_admin.php';?>
</header>
<main>
    <div class = grid-container>
         <div class = 'grid-100'>
            <div class ='review-container'>
    <div style="padding-top: 50px">
    <form action="PHP_database_insert/admin_view_reviews.php">
        <h3>Select which service provider's reviews you want to display</h3>
        Time Period: <select id="sp_id" name="sp_id" onchange="getReviews(this.value)">
            <option value =""></option>
           <?php require_once ('PHP_database_insert/db.php');
            $sql = "SELECT SP_ID, business_name FROM service_provider";
            $result=mysqli_query($connection,$sql) or die(mysqli_error($connection));
            while($row =mysqli_fetch_array($result)){
            echo "<option value='{$row['SP_ID']}'>{$row['business_name']}</option>";
            }
            ?>
        </select>
    </form>
    </div>
    <div id="reviewTable"><b>Reviews will be listed here.</b></div>
            </div>
         </div>
    </div>
</main>


</body>

</html>

