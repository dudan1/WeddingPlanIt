<?php
session_start();
require_once('db.php');

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}

$fileLink = $_POST['fileToDelete'];
unlink('../'.$fileLink);

$sql = "DELETE FROM images WHERE link='$fileLink' AND SP_ID = '$_SESSION[SP_ID]'";
if(mysqli_query($connection,$sql)or die(mysqli_error($connection))){
    header('Location:../pic_upload.php');
};





?>