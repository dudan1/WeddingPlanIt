<?php
require 'db.php';
$email = htmlspecialchars($_POST['email']);
echo $email;
$form_type = htmlspecialchars($_POST['form_type']);
echo $form_type;
if ($form_type =='suspend'){
$sql = "UPDATE users SET isSuspended = 1 WHERE email = '$email'";
if (mysqli_query($connection, $sql) or die(mysqli_error($connection))) {
    echo"account suspended";

  header('Location:../admin_manage_accounts.php');
}
}
elseif ($form_type =='reactivate') {
    $sql = "UPDATE users SET isSuspended = 0 WHERE email = '$email'";
    if (mysqli_query($connection, $sql) or die(mysqli_error($connection))) {

        echo "account reactivated";
         header('Location:../admin_manage_accounts.php');

    }
}
?>