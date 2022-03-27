<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo URL?>public/css/Receptionist/sessions.css">
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/sidebar.css">
    <script src="<?php echo URL?>public/js/receptionist/sessionRow.js"></script>
    <link rel="stylesheet" href="<?php echo URL?>public/css/common/backgroundAnim.css">
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

        <div class="main" id="main">
           <!-- sidebar -->
            <?php require_once APPROOT."/../views/common/ReceptionistSidebar.php"; ?>

            <div class="view">
                <div class="part-1">
                    <div class="topic"><b>Sessions</b></div>
                </div>
                
                <div class="part-2">
                    <div class="ava">
                        <a href="http://localhost/project/Receptionist/sessions"><button class="all" id="all">All</button></a>
                        <a href="http://localhost/project/Receptionist/sessionsToday"><button class="today">Today</button></a>
                        <!-- <a href="<?php echo URL?>Receptionist/sessions"><button class="all" id="all">All</button></a>
                        <a href="<?php echo URL?>Receptionist/sessionsToday"><button class="today" id="today">Today</button></a> -->
                    </div>
                    <div class="none"></div>
                </div>
                
                <div class="part-3">
                    <div class="table-head">
                        <div class="one"><h4>ID</h4></div>
                        <div class="two"><h4>Title</h4></div>
                        <div class="three"><h4>Date</h4></div>
                        <div class="four"><h4>Time</h4></div>
                        <div class="five"><h4>Instructor</h4></div>
                        <div class="six"><h4></h4></div>
                    </div>
                    <div class="table-body" id="table-body-all" >
                        <div class="scroll" id="scroll">
                            <!-- data -->
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>