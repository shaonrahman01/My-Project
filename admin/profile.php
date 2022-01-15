<?php
    session_start();
    require_once '../inc/header.php';
    require_once 'navbar.php';
    require_once '../db.php';
    require_once 'check_admin.php';

    $login_email = $_SESSION['email'];

    

    $get_profile_query= "SELECT user_name,user_mobile FROM users WHERE user_email='$login_email'";
    $from_db= mysqli_query($db_connect,$get_profile_query);
    $after_assoc=mysqli_fetch_assoc($from_db);



?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title">Profile</h5>
                        <a href="profile_edit.php" class="btn-btn-sm">Edit</a>
                    </div>
                    <div class="card-body">
                    
                        <table class="table table-bordered">
                            <thead>
                                <th>User Name</th>
                                <th>User Mobile</th>
                            </thead>
                            <tbody>
                                
                                <tr>
                                   <td><?=$after_assoc['user_name']?></td>
                                   <td><?=$after_assoc['user_mobile']?></td>
                                   
                                </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once'../inc/footer.php';

?>