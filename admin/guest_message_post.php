<?php
session_start();
require_once '../db.php';

$guest_name = $_POST['guest_name'];
$guest_email = $_POST['guest_email'];
$guest_subject = $_POST['guest_subject'];
$guest_message = $_POST['guest_message'];


$flag = true;

if(!$guest_name){
    $_SESSION['$guest_name_err'] = "Guest Name Filed First";
    $flag = false;
}
if(!$guest_email){
    $_SESSION['$guest_email_err'] = "Guest Email Filed First";
    $flag = false;
}
if(!$guest_subject){
    $_SESSION['$guest_subject_err'] = "Guest Subject Filed First";
    $flag = false;
}
if(!$guest_message){
    $_SESSION['$guest_msg_err'] = "Guest Message Filed First";
    $flag = false;
}

if($flag){
    $message_insert_query = "INSERT INTO guest_messages (guest_name,guest_email,guest_subject,guest_message) VALUES ('$guest_name','$guest_email','$guest_subject','$guest_message')";

    mysqli_query($db_connect,$message_insert_query);
    $_SESSION['$guest_msg_done'] = "Your Message Sent Successfully";
    header('location: ../index.php');
}
else{
    header('location: ../index.php');
}



?>