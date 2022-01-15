<?php
session_start();
require_once 'db.php';



$user_email=$_POST['user_email'];
$user_pass=md5($_POST['user_pass']);



if($user_email == NULL || $user_pass == NULL)
{
    $_SESSION['log_err']= "All Filed must required";
    header('location: login.php');
}
else{
    
    $checking_query = "SELECT COUNT(*) AS total_users FROM users WHERE user_email='$user_email' AND user_pass='$user_pass'";

    $results_from_db = mysqli_query($db_connect,$checking_query);
    
    $after_assoc= mysqli_fetch_assoc($results_from_db);
    if($after_assoc['total_users']==1)
    {
        $_SESSION['email'] =$user_email;
        $_SESSION['user_status'] ="Yes";
        header('location: admin/dashboard.php');
    }
    else{
        $_SESSION['log_err']= "Your creditial are wrong or Register";
        header('location: login.php');
    }

}


?>