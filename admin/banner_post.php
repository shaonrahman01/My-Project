<?php
    session_start();
    require_once '../db.php';

    $sub_title = $_POST['sub_title'];
    $title_top = $_POST['title_top'];
    $title_bottom = $_POST['title_bottom'];
    $detail = $_POST['detail'];


     $uploaded_image_size = $_FILES['banner_image']['size'];
     
     if($uploaded_image_size <=2000000)
     {
         
         $uploaded_image_name = $_FILES['banner_image']['name'];
         $after_explode= explode('.',$uploaded_image_name);
         $uploaded_image_ext= end($after_explode);
         $allowed_ext= array('jpg','jpeg','png','JPG','JPEG','PNG');
         if(in_array($uploaded_image_ext,$allowed_ext))
         {
            $insert_banner_query="INSERT INTO banners (sub_title,title_top,title_bottom,detail,image_location) 
            VALUES ('$sub_title','$title_top','$title_bottom','$detail','primary location')";
            $from_db = mysqli_query($db_connect,$insert_banner_query);
            $id_from_db= mysqli_insert_id($db_connect);
                 
             $new_name= $id_from_db . "." . $uploaded_image_ext;
             $upload_location= "../uploads/banner/" . $new_name;
             move_uploaded_file($_FILES['banner_image']['tmp_name'],$upload_location);
             
             $db_location="uploads/banner/" . $new_name;
             $upload_location_query= "UPDATE banners SET image_location='$db_location' WHERE id='$id_from_db'";
             mysqli_query($db_connect,$upload_location_query);
             header('location: banner.php');
         }

         else{
             echo "This File Format is not Allowed";
         }

          
     }
        else{
            echo "Upload Hobe na";     
     }


?>