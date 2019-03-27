<?php
session_start();
if (!IsSet($_SESSION["name"]))
   header("Location:index.html");

    require_once('PHP_database_insert/db.php');
    if(isset ($_SESSION['sp_id'])) {
        unset ($_SESSION['sp_id']);
        $_SESSION['sp_id'] = $_GET['id']; // assign variable for id
    }
    else{
        $_SESSION['sp_id'] = $_GET['id'];
    }
    $sql = "Select C_ID FROM customer WHERE '$_SESSION[name]' = email";
    $result =mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $_SESSION['cust_id'] = $row['C_ID'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Service Provider Details</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

    <link rel="shortcut icon" href="assets/favicons/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicons/favicon.ico" type="image/x-icon">

</head>

<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">

<header>
    <?php include 'PHP_database_insert/nav_bar.php';?>
</header>
<br><br><br><br><br>
<main>
    <div class="grid-container">
        <div class="grid-25"><a href="javascript:history.go(-1)">Return to search results</a>
        </div>


        <br>

        <?php

        $id = $_GET['id']; // assign variable for id
        $sql2 = "SELECT * from service_provider WHERE sp_id = '$id'"; //run query
        $result2 = mysqli_query($connection, $sql2) or die ("Bad Query: $sql2");
        $row2 = ($row2 = mysqli_fetch_array($result2));
        echo "<h2>" . $row2['business_name'] . "</h2>";
        echo "<p>". "£".$row2['price']. "</p>";
        echo "<h3>" . $row2['category'] . "</h3>";
        echo "<p>" . $row2['description'] . "</p>";
        ?>


    </div>
        <div class="gallery_container">


            <?php
            $sql = "select link, photo_name, caption from images where SP_ID = $_SESSION[sp_id]";

            if ($result = mysqli_query($connection, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<div class='gallery'>";
                        echo "<a target='_blank' href={$row['link']} ><img src='{$row['link']}' alt='{$row['photo_name']}' width='150', height='100'></a>";
                        echo "<div class='caption'>{$row['caption']}</div> </div>";
                    }
//free result set
                    mysqli_free_result($result);
                }else{
                    echo "No records matching your query were found.";
                }
            }
            ?>
        </div>


    </div>
    <div class="grid-75" style="background-color:whitesmoke">
        <form action ="calendar/calendar.php" method="post">
            <input type = "hidden" name = "c" value="<?php echo $cust_id; ?>">
            <input type = "hidden" name = "sp" value="<?php echo $sp_id; ?>">
            <button type="submit">BOOK THIS SERVICE PROVIDER</button>
        </form>
</main>


<footer>

</footer>

</body>
</html>
