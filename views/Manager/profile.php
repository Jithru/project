<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/student/profile.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/sidebar.css">
    <title>Lead driving school</title>
</head>
<body>
    <div class="container">
        <div class="header">
        <?php require_once APPROOT."/../views/common/header.php"; ?>
        </div>
        <div class="main">
            <?php require_once APPROOT."/../views/common/ManagerSidebar.php"; ?>
            <div class="view">
                <div class="left">
                    <div class="big-picture">
                    
                        <img src="<?php echo URL?>public/images/profpic.png" alt="big-pic" id="bigPicture" width="180" height="180">
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
                        <h4 class="name">Employee Id </h4>
                            <div class="row-1-left">
                                <!-- <div class="col-1-left">Id</div>
                                <div class="col-2-left">:</div> -->
                                <div class="col-3-left"><?php echo isset($_SESSION['employee_id'])?"Emp_".$_SESSION['employee_id']:"";?></div>
                            </div>

                    </div>
                    <div class="edit-profile">
                           <a href="<?php echo URL?>Manager/editprofile"><button class="edit-button">Edit profile</button></a>
                            
                        </div>
                    <!-- <button class="upload-pic">
                        <img src="<?php echo URL?>public/images/camera.png" alt="cam" width="35" height="35">
                    </button> -->
                </div>
                <div class="right">
                    <div class="holder">
                        <div class="topic"><h2>Profile Details</h2></div>
                        <div class="details" id="details">
                            <!-- <div class="row-1">
                                <div class="col-1">Name</div>
                                <div class="col-2">:</div>
                                <div class="col-3">Jithru jayawantha</div>
                            </div>
                            <div class="row-1">
                                <div class="col-1">NIC</div>
                                <div class="col-2">:</div>
                                <div class="col-3">9877234567V</div>
                            </div>
                            <div class="row-1">
                                <div class="col-1">Title</div>
                                <div class="col-2">:</div>
                                <div class="col-3">Student</div>
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
                            </div> -->
                        </div>
  
                    </div>
                </div>
            </div>
            <!-- <div class="view">
                <div class="left">
                    <div class="big-picture">
                        <img class="prof-pic" src="<?php echo URL?>public/images/profpic.png" alt="big-pic" width="250" height="250">
                    </div>
                </div>
                <div class="right">
                    <div class="holder">
                        <div class="topic"><h2>Profile</h2></div>
                        <div class="details">
                            <div class="row-1">
                                <div class="col-1">Name</div>
                                <div class="col-2">:</div>
                                <div class="col-3">Roshan senevirathne</div>
                            </div>
                            <div class="row-1">
                                <div class="col-1">NIC</div>
                                <div class="col-2">:</div>
                                <div class="col-3">9877234567V</div>
                            </div>
                            <div class="row-1">
                                <div class="col-1">Title</div>
                                <div class="col-2">:</div>
                                <div class="col-3">Manager</div>
                            </div>
                            <div class="row-1">
                                <div class="col-1">Address</div>
                                <div class="col-2">:</div>
                                <div class="col-3">No. 5/65,piliyandala</div>
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
        </div>
    </div>

    <!-- <script>
                let img=document.getElementById("uploadImage");
        let changeF=document.getElementById("file");

        changeF.addEventListener('change',function(){
            console.log(this.files[0].type);
            if(this.files[0].type!='image/png' && this.files[0].type != 'image/jpeg' && this.files[0].type != 'image/jpg'){
                alert("File type is not valid");
            }else{
                img.src=URL.createObjectURL(this.files[0]);
            }

        })
    </script> -->
    <script src="<?php echo URL?>public/js/manager/profile.js"></script>
</body>
</html>