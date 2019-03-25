<?php
session_start();
require_once('db.php');
if (!IsSet($_SESSION["name"]))
    header("Location:../index.html");
$session_email = $_SESSION["name"];

$sql = "SELECT SP_ID FROM service_provider WHERE '$session_email' = email";
$result =mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$sp_id = $row['SP_ID'];

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // Check connection
        if ($connection === false) {
            die("Error: Could not connect. " . mysqli_connect_error());
        }
        // create file path
        $link = "uploads/".$_POST['filename'];
// Attempt to insert into database
        $sql = "INSERT INTO images (SP_ID, photo_name, caption, link) 
            VALUES ('$sp_id','$_POST[filename]','$_POST[caption]','$link')";
        if (mysqli_query($connection, $sql)){
            #echo "Successfully registred.";
            header('Location:../pic_upload.php');
        } else {
            echo "Error: Could not execute." . mysqli_error($connection);
        }
        mysqli_close($connection);
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
