<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Conductor/viewConductor&Vehicle&Student/upload.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Conductor/viewConductor&Vehicle&Student/prompt.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Conductor/viewConductor&Vehicle&Student/boxAppear.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/backgroundAnim.css">
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
            <?php require_once APPROOT."/../views/common/InstructorSidebar.php"; ?>            
            <div class="view">
                <div class="new">
                    <div class="new-2">
                    <button class="new-btn" onclick="newFile()">New</button>
                    </div>
                    
                </div>
                <div class="file-area">
                    <div class="scroll" id="scroll">
                        <!-- <div class="row" id="row_pdf" >
                            <div class="iconDetails">
                                <div class="icon">
                                    <img src="<?php echo URL?>public/images/icons8-pdf-80.png" alt="pdf">
                                </div>
                                <div class="details">
                                    <div class="file">
                                        <div class="topic">File</div>
                                        <div class="colon">:</div>
                                        <div class="data">Road_runner.pdf</div>
                                    </div>
                                    <div class="date">
                                        <div class="topic">Date</div>
                                        <div class="colon">:</div>
                                        <div class="data">2022.03.17</div>
                                    </div>
                                    <div class="time">
                                        <div class="topic">Time</div>
                                        <div class="colon">:</div>
                                        <div class="data">08:54</div>
                                    </div>
                                </div>
                                <div class="delete"><button class="delete-btn" onclick="deleteMe()">Delete</button></div>
                        </div> -->
 
                     </div>
                            

                </div>
            </div>
        </div>
    </div>

    <div class="box-container" id="box-container">
        <div class="box-content">
            <div class="appear">
                <form enctype="multipart/form-data" id="form_pdf" onsubmit="return false">
                    <div class="uploadArea">    
                        <input type="file" name="file" id="file">
                    </div>
                    <div class="uploadButton">
                        <button class="backButton" id="back" onclick="backFile()">Back</button>
                        <button class="uploadButtn" type="submit" name="submit" onclick="uploadMe()">Upload File</button>
                        
                    </div>
                </form>
                
            </div>
        </div>
    </div>
        
    </div>
    <script src="<?php echo URL?>public/js/Instructor/upload.js"></script>
</body>
</html>