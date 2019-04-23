
<?php
require 'db.php';
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}
$review_id = $_POST['bad_review'];
$sql = "DELETE FROM reviews WHERE review_id='$review_id'";
if(mysqli_query($connection,$sql)or die(mysqli_error($connection))){
    header('Location:../admin_manage_reviews.php');
};
