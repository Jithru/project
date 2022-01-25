<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/student/profile.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/sidebar.css">
    <title>Reciptionist</title>
</head>
<body>
    <div class="container">
        <div class="header">
        <?php require_once APPROOT."/../views/common/header.php"; ?>
        </div>
        <div class="main">
        <?php require_once APPROOT."/../views/common/InstructorSidebar.php"; ?>
        <div class="view">
                <div class="left">
                    <div class="big-picture">
                        <img src="<?php echo URL?>public/images/profpic.png" alt="big-pic" width="250" height="250">
                    </div>
                    <button class="upload-pic">
                        <img src="<?php echo URL?>public/images/camera.png" alt="cam" width="35" height="35">
                    </button>
                </div>
                <div class="right">
                    <div class="holder">
                        <div class="topic"><h2>Profile</h2></div>
                        <div class="details">
                            <div class="row-1">
                                <div class="col-1">Name</div>
                                <div class="col-2">:</div>
                                <div class="col-3">Imal kovinda</div>
                            </div>
                            <div class="row-1">
                                <div class="col-1">NIC</div>
                                <div class="col-2">:</div>
                                <div class="col-3">9877234567V</div>
                            </div>
                            <div class="row-1">
                                <div class="col-1">Title</div>
                                <div class="col-2">:</div>
                                <div class="col-3">Instructor</div>
                            </div>
                            <div class="row-1">
                                <div class="col-1">Address</div>
                                <div class="col-2">:</div>
                                <div class="col-3">No. 5/65,Uyanwatta,Matara</div>
                            </div>
                            <div class="row-1">
                                <div class="col-1">Tel-No</div>
                                <div class="col-2">:</div>
                                <div class="col-3">077 9345288</div>
                            </div>
                        </div>
                        <div class="edit-profile">
                           <a href="<?php echo URL?>Student/editprofile"> <button class="edit-button">Edit profile</button></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>