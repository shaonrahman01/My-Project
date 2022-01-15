<?php
require_once '../db.php';
$id=$_GET['msg_id'];
$update_message= "UPDATE guest_messages SET read_status = 2 WHERE id=$id";

mysqli_query($db_connect,$update_message);

header('location: guest_message_show.php');



?>