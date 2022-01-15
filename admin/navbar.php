<?php
    require_once 'check_admin.php';

?>



<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php" target="blank">Visit Website</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Frontend
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="guest_message_show.php">Guest Message
              <?php 
              require_once '../db.php';

              $get_total_msg_query= "SELECT COUNT(*) AS unread_message FROM guest_messages WHERE read_status = 1";

              $get_msg_from_db = mysqli_query($db_connect,$get_total_msg_query);

              $after_assoc = mysqli_fetch_assoc($get_msg_from_db);

              ?>
            <span class="badge bg-danger ms-2"><?=$after_assoc['unread_message']?></span></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="banner.php">Banner</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
                <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <?=$_SESSION['email']?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="change_password.php">Password Change</a></li>
                <li><a class="dropdown-item text-danger" href="../logout.php">Logout</a></li>
            </ul>
            </div>
    </div>
  </div>
</nav>