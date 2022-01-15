<?php
require_once '../db.php';
$id=$_GET['msg_id'];
$delete_message= "DELETE FROM guest_messages WHERE id=$id";

mysqli_query($db_connect,$delete_message);

header('location: guest_message_show.php');



?>