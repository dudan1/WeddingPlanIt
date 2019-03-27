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
   // $_SESSION['sp_id'] = $_GET['id'];
}
$email = $_SESSION['name'];
$sql = "SELECT * FROM service_provider WHERE email = '$email'";
$result =mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$sp_id = $row['SP_ID'];
$_SESSION['SP_ID']= $sp_id;
$firstname = $row['first_name'];
$surname = $row['surname'];
$address = $row['address'];
$postcode = $row['postcode'];
$business_name = $row['business_name'];
$category = $row['category'];
$description = $row['description'];
$price = $row['price'];
// display service provider details
$sql = "Select * FROM service_provider WHERE '$_SESSION[name]' = email";
$result =mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

?>


<!DOCTYPE html>
<head>
    <title>Service Provider Profile Page</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/unsemantic-grid-responsive-tablet.css">

</head>

<body style=" background-image:/*linear-gradient(rgba(0,0,0,0.05),rgba(0,0,0,0.05)),*/url(assets/images/wed.jpg);">

<header>
    <?php require 'PHP_database_insert/nav_bar.php';?>

</header>

<main>
    <div class="grid-container">
        <div class="grid-75">
    <div class="profile">

   <div style="background-color: #fef1ec">

       <?php

     echo "<h2 style='text-align: center; padding-top: 13px;color: #4CAF50'>". $row['business_name']."</h2>";
     echo "<hr>";
     echo "<p style='padding-left: 25px'>". "First Name"." : ".$row['first_name']."</p>";
     echo "<p style='padding-left: 25px'>". "Surname"." : ".$row['surname']."</p>";
     echo "<p style='padding-left: 25px'>". "Address"." : ".$row['address']."</p>";
     echo "<p style='padding-left: 25px'>". "Post Code"." : ".$row['postcode']."</p>";
     echo "<p style='padding-left: 25px'>". "Service Category"." : ".$row['category']."</p>";
     echo "<p style='padding-left: 25px'>". "Price"." : "."£".$row['price']."</p>";
     echo "<p style='padding-left: 25px'>". "Business Name"." : ".$row['business_name']."</p>";
     echo "<p style='padding-left: 25px;padding-bottom: 13px'>". "Description"." : ".$row['description']."</p>";

       ?>

   </div>
   </div>
    </div>
        <div class = "grid-25">
            <p><button class="btn4 info4" onclick="document.getElementById('id01').style.display='block'" style="width:110px;height:auto;">Update Profile</button></p>
            <div id="id01" class="modal">

                <form class="modal-content animate" action="PHP_database_insert/sp_update.php" method="post">
                    <div class="imgcontainer">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                        <!--<img src="assets/images/avatar.png" alt="Avatar" height="50" width="50">-->
                    </div>
                    <div class="container">
                        <h1>Update your service provider details</h1>
                        <p>The name of your business: <input type="text" required name="business_name" maxlength="40" width="200"value ="<?php echo $business_name ?>"></p>
                        <p>Your personal first name: <input type="text" required name="first_name" maxlength="20" value ="<?php echo $firstname ?>"></p>
                        <p>Your personal surname: <input type="text" required name="surname" maxlength="20" value ="<?php echo $surname ?>"></p>
                        <p>Your personal address: <input type="text" required name="address" maxlength="60" value ="<?php echo $address ?>"></p>
                        <p>Your personal postcode: <input type="text" required name="postcode" maxlength="8" value ="<?php echo $postcode ?>"></p>
                        <p>The category of your business:
                            <select name="category">
                                <option value="beautician" <?php if($category =="beautician") echo 'selected="selected"' ?>>Beautician</option>
                                <option value="caterer" <?php if($category =="caterer") echo 'selected="selected"' ?>>Caterer</option>
                                <option value="jeweller" <?php if($category =="jeweller") echo 'selected="selected"' ?>>Jeweller</option>
                                <option value="venue" <?php if($category =="venue") echo 'selected="selected"' ?>>Venue</option>
                                <option value="flowers" <?php if($category =="flowers") echo 'selected="selected"' ?>>Flowers </option>
                                <option value="photography" <?php if($category =="photography") echo 'selected="selected"' ?>>Photography </option>
                                <option value="music" <?php if($category =="music") echo 'selected="selected"' ?>>Music</option>
                                <option value="decor" <?php if($category =="decor") echo 'selected="selected"' ?>>Decor</option>
                                <option value="weddingplanners" <?php if($category =="weddingplanners") echo 'selected="selected"' ?>>Wedding Planners</option>
                                <option value="dressers" <?php if($category =="dressers") echo 'selected="selected"' ?>>Dresses</option>
                            </select></p>
                        <div class="tb">
                            <table>
                                <tr>
                                    <td> <label>Price:</label></td>
                                    <td><input type="text" required name="price" value="<?php echo $price ?>"placeholder="£"></td>
                                </tr>
                            </table>
                        </div>
                        <p>Say something about your business: <textarea required name="description" rows="7" cols="42"><?php echo $description; ?></textarea></p>
                        <button type="submit">Submit details</button>
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="gallery_header" style="right:30px;">
        <h2>Your Images</h2>
    </div>
    <div class="gallery_container">
        <?php
        $sql = "select link, photo_name, caption from images where SP_ID = $sp_id AND image_type = 'image'";

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
                echo "No Images Found.";
            }
        }
        ?>
    </div>

</main>


</body>



</html>

