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

if(!is_dir('../uploads/'.$sp_id)){
    $new_dir = "../uploads/".$sp_id;
    mkdir($new_dir, 0777);

}
$target_dir = "../uploads/".$sp_id."/";
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
        if (isset($_POST['filename1'])) {
            $file_name = $_POST['filename1'];
        } elseif (isset($_POST['filename2'])) {
            $file_name = $_POST['filename2'];
        } elseif (isset($_POST['filename3'])) {
            $file_name = $_POST['filename3'];
        }
        $link = "uploads/" . $sp_id . "/" . $file_name;

        $sql = "SELECT photo_id, link, image_type FROM images WHERE SP_ID = $sp_id AND image_type = 'profile'";
        $result =mysqli_query($connection,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count > 0){
            $old_profile = $row['link'];
        }
        else{
            $old_profile ='';
        }
        $sql = "SELECT photo_id, link, image_type FROM images WHERE SP_ID = $sp_id AND image_type = 'logo'";
        $result =mysqli_query($connection,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count > 0){
            $old_logo = $row['link'];
        }
        else{
            $old_logo ='';
        }
// Attempt to insert into database
        $sql = "INSERT INTO images (SP_ID, photo_name, caption, link, image_type) 
            VALUES ('$sp_id','$file_name','$_POST[caption]','$link', '$_POST[image_type]')";
        if (mysqli_query($connection, $sql)) {
        } else {
            echo "Error: Could not execute." . mysqli_error($connection);
        }
        mysqli_close($connection);
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";

    }
    else {
        echo "Sorry, there was an error uploading your file.";
    }
    //DELETE OLD PROFILE PIC
    require 'db.php';
    $sql = "SELECT photo_id, image_type FROM images WHERE SP_ID = $sp_id AND image_type = 'profile'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($count > 1) {
        unlink('../'.$old_profile);
        $sql = "DELETE FROM images WHERE link='$old_profile' AND SP_ID = '$sp_id'";
        if (mysqli_query($connection, $sql) or die(mysqli_error($connection))) {
            echo "Old profile picture deleted";
        }
    }
    // DELETE OLD LOGO
    $sql = "SELECT photo_id, image_type FROM images WHERE SP_ID = $sp_id AND image_type = 'logo'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if ($count > 1) {
        unlink('../'.$old_logo);
        $sql = "DELETE FROM images WHERE link='$old_logo' AND SP_ID = '$sp_id'";
        if (mysqli_query($connection, $sql) or die(mysqli_error($connection))) {
            echo "Old logo deleted";
            header('Location:../pic_upload.php');
        }
        else{
            header('Location:../pic_upload.php');
        }
    }
    else{
        header('Location:../pic_upload.php');
    }
}
?>
