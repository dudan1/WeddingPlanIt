<?php
/**
 * Created by PhpStorm.
 * User: 1809591
 * Date: 18/02/2019
 * Time: 16:11
 */
session_start();
require_once('test-db.php');

// Check connection
if ($connection === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}
if(!isset($_POST['email'], $_POST['pwd1'])){
    die('Username or password does not exist');
}

session_destroy();


