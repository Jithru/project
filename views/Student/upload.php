<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/student/upload.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/backgroundAnim.css">
    <!-- <link rel="stylesheet" href="<?php echo URL?>public/css/Conductor/viewConductor&Vehicle&Student/prompt.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo URL?>public/css/Conductor/viewConductor&Vehicle&Student/boxAppear.css"> -->

    <title>Lead Driving School</title>
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
    <div class="container" id="container">
        <div class="header">
        <?php require_once APPROOT."/../views/common/header.php"; ?>
        </div>
        <div class="content">
            <?php require_once APPROOT."/../views/common/StudentSidebar.php"; ?>            
            <div class="view">
                <!-- <div class="new">
                    <button class="new-btn" onclick="newFile()">New</button>
                </div> -->
                <div class="file-area">
                    <div class="scroll" id="scroll">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="box-container" id="box-container">
        <div class="box-content">
            <div class="appear">
                <div class="uploadArea">
                    <input type="file" name="file">
                </div>
                <div class="uploadButton">
                    <button class="uploadButtn" type="submit" name="submit" onclick="uploadMe()">Upload File</button>
                </div>
            </div>
        </div>
        
    </div> -->
</body>
<script src="<?php echo URL?>public/js/student/upload.js"></script>
</html>