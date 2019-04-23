<?php
require 'db.php';
$email = htmlspecialchars($_POST['email']);
echo $email;
$form_type = htmlspecialchars($_POST['form_type']);
echo $form_type;
if ($form_type =='activate'){
    $sql = "UPDATE service_provider SET isVetted = 1 WHERE email = '$email'";
    if (mysqli_query($connection, $sql) or die(mysqli_error($connection))) {
        echo"account activate";

        header('Location:../admin_manage_accounts.php');
    }
}
elseif ($form_type =='remove') {
    $sql = "UPDATE service_provider SET isVetted = 0 WHERE email = '$email'";
    if (mysqli_query($connection, $sql) or die(mysqli_error($connection))) {

        echo "account removed";
        header('Location:../admin_manage_accounts.php');

    }
}
?>