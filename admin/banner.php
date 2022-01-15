<?php 
session_start();
require_once '../inc/header.php';
require_once 'navbar.php';
require_once '../db.php';

$get_banners_query= "SELECT * FROM banners";
$from_db = mysqli_query($db_connect,$get_banners_query);


?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card mt-4">
                        <div class="card-header">
                            <div class="card-title">Banner Add Form</div>
                        </div>
                        <div class="card-body">
                            <form action="banner_post.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="sub_title" placeholder="sub_title">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="title_top" placeholder="title_top">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="title_bottom" placeholder="title_bottom">
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="detail" placeholder="detail">
                                </div>
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="banner_image">
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary w-100">Add</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                     <div class="card mt-4">
                        <div class="card-header">
                            <h5 class="card-title">Banner</h5>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Sub Title</th>
                                    <th>Title Top</th>
                                    <th>Title Bottom</th>
                                    <th>Detail</th>
                                    <th>Location</th>
                                    <th>Active Status</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php foreach($from_db as $banners): ?>
                                    <tr>
                                        <td><?=$banners['sub_title']?></td>
                                        <td><?=$banners['title_top']?></td>
                                        <td><?=$banners['title_bottom']?></td>
                                        <td><?=$banners['detail']?></td>
                                        <td><img src="../<?=$banners['image_location']?>" alt="" style="width:150px;"></td>
                                        <td>
                                            <?php if($banners['active_status'] ==1): ?>
                                                <span class="badge badge-sm bg-success">Active</span>
                                                <?php else: ?>
                                                <span class="badge badge-sm bg-danger">De-active</span>
                                            <?php endif ?>
                                        </td>
                                        <td>-</td>
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