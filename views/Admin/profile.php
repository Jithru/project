<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/student/profile.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/student/profileAnim.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/sidebar.css">
    <title>Lead driving school</title>
</head>
<body>
<ul class="background">
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
   <li></li>
</ul>
    <div class="container">

        <div class="header">
        <?php require_once APPROOT."/../views/common/header.php"; ?>
        </div>
    <div class="main">
        <?php require_once APPROOT."/../views/common/AdminSidebar.php"; ?>
        
            <!-- <div class="view">
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
                                <div class="col-3">Gihan weerasinghe</div>
                            </div>
                            <div class="row-1">
                                <div class="col-1">NIC</div>
                                <div class="col-2">:</div>
                                <div class="col-3">980210324vV</div>
                            </div>
                            <div class="row-1">
                                <div class="col-1">Title</div>
                                <div class="col-2">:</div>
                                <div class="col-3">Admin</div>
                            </div>
                            <div class="row-1">
                                <div class="col-1">Address</div>
                                <div class="col-2">:</div>
                                <div class="col-3">No. 5/65,pilimathalawa kandy,Matara</div>
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
            </div> -->
            <div class="view">
                <div class="left">
                    <div class="big-picture">
                        <img src="<?php echo URL?>public/images/profpic.png" alt="big-pic" width="180" height="180">
                    </div>

                    <div class="left-details">
                        <h4 class="name"> Name</h4>
                        <div class="row-1-left">
                            <!-- <div class="col-1-left">Name</div>
                            <div class="col-2-left">:</div> -->
                            <div class="col-3-left"><?php echo isset($_SESSION['name'])?$_SESSION['name']:"";?></div>
                        </div>
                        <h4 class="name">Title</h4> 
                            <div class="row-1-left">
                                <!-- <div class="col-1-left">Title</div>
                                <div class="col-2-left">:</div> -->
                                <div class="col-3-left"><?php echo isset($_SESSION['job_title'])?$_SESSION['job_title']:"";?></div>
                            </div>
                        <h4 class="name"></h4>
                            <div class="row-1-left">
                                <!-- <div class="col-1-left">Id</div>
                                <div class="col-2-left">:</div> -->
                                <!-- <div class="col-3-left"><?php echo isset($_SESSION['student_id'])?$_SESSION['student_id']:"";?></div> -->
                            </div>

                    </div>
                    <div class="edit-profile">
                           <!-- <a href="<?php echo URL?>Student/editprofile"> <button class="edit-button">Edit profile</button></a> -->
                            
                        </div>
                    <!-- <button class="upload-pic">
                        <img src="<?php echo URL?>public/images/camera.png" alt="cam" width="35" height="35">
                    </button> -->
                </div>
                <div class="right">
                    <div class="holder">
                        <div class="topic"><h2></h2></div>
                        <div class="details" id="details">
                            <div class="waviy">
                                <span style="--i:1">L</span>
                                <span style="--i:2">E</span>
                                <span style="--i:3">A</span>
                                <span style="--i:4">D</span>
                                <div>   </div>
                                <span style="--i:5">D</span>
                                <span style="--i:6">R</span>
                                <span style="--i:7">I</span>
                                <span style="--i:8">V</span>
                                <span style="--i:9">I</span>
                                
                                <span style="--i:10">N</span>
                                <span style="--i:11">G</span>
                                <br>
                                <span style="--i:12">S</span>
                                <span style="--i:13">C</span>
                                <span style="--i:14">H</span>
                                <span style="--i:15">O</span>
                                <span style="--i:16">O</span>
                                <span style="--i:17">L</span>
                            </div>
                        </div>
  
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>