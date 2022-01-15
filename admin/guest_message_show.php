<?php
    session_start();
    require_once '../inc/header.php';
    require_once 'navbar.php';
    require_once '../db.php';

    if(!isset($_SESSION['user_status'])){
        header('location: ../../login.php');
    }

    $get_messages_query = "SELECT * FROM guest_messages";
    $messages_from_db = mysqli_query($db_connect,$get_messages_query);

?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-4">
                    <div class="card-header bg-warning">
                        <h5 class="card-title text-capitalize">Guest Message List</h5>
                    </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Serial</th>
                                    <th>Guest Name</th>
                                    <th>Guest Email</th>
                                    <th>Guest Subject</th>
                                    <th>Guest Message</th>
                                    
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php foreach($messages_from_db as $key=> $message): ?>
                                        <tr class="<?=($message['read_status'] == 1)? "bg-info" : "text-dark"
                                            
                                            ?>">
                                            <td><?=$key+1?></td>
                                            <td><?=$message['guest_name']?></td>
                                            <td><?=$message['guest_email']?></td>
                                            <td><?=$message['guest_subject']?></td>
                                            <td><?=$message['guest_message']?></td>
                                            <td>
                                                <?php if($message['read_status'] == 1): ?>
                                                    <a href="read_message.php?msg_id=<?=$message['id']?>" class="btn btn-sm btn-warning">Mark as Read</a>
                                                
                                                <?php endif ?>
                                                <a href="delete_message.php?msg_id=<?=$message['id']?>" class="btn btn-sm btn-danger">Delete</a>
                                                


                                            </td>
                                        </tr>

                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>


<?php
    require_once '../inc/footer.php';


?>