<?php
session_start();
require_once '../db.php';


$user_email = $_POST['user_email'];
$user_name = $_POST['user_name'];
$user_mobile = $_POST['user_mobile'];

$update_query= "UPDATE users SET user_name='$user_name', user_mobile='$user_mobile' WHERE user_email='$user_email'";

mysqli_query($db_connect,$update_query);
header('location: profile.php');

?>