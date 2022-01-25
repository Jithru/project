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
            </div>
        </div>
    </div>

    <script>
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
    </script>
</body>
</html>