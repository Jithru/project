<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/Report/reports.css">
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
                <div class="title">
                    <div class="report"><h2>Reports</h2></div>
                </div>
                <div class="container-details">
                    <div class="details">
                            <div class="row-1">
                                <div class="col-1">
                                    <div class="col-details">
                                        <a href="<?php echo URL?>Report/attendanceSession">
                                            <div class="div-1">
                                                <h4>Student Attendance Report</h4>
                                            </div>
                                            <div class="div-2">
                                                <img src="<?php echo URL?>/public/images/attendance.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>

                                    
                                </div>
                                <div class="col-2">
                                    <div class="col-details">
                                        <a href="<?php echo URL?>Report/customerGrowing">
                                            <div class="div-1">
                                                <h4>Customer Growing Report</h4>
                                            </div>
                                            <div class="div-2">
                                                <img src="<?php echo URL?>/public/images/growing.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="col-details">
                                        <a href="<?php echo URL?>Report/ConductorParticipation">
                                            <div class="div-1">
                                                <h4>Conductor Participation Report</h4>
                                            </div>
                                            <div class="div-2">
                                                <img src="<?php echo URL?>/public/images/conductor.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row-2">
                                <div class="col-1">
                                    <div class="col-details">
                                        <a href="<?php echo URL?>Report/examParticipationStudents">
                                            <div class="div-1">
                                                <h4>Exam Participation & Results</h4>
                                            </div>
                                            <div class="div-2">
                                                <img src="<?php echo URL?>/public/images/passed.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="col-details">
                                        <a href="<?php echo URL?>Report/sessionReport">
                                            <div class="div-1">
                                                <h4>Sessions</h4>
                                            </div>
                                            <div class="div-2">
                                                <img src="<?php echo URL?>/public/images/sessions.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <!-- <div class="col-details">
                                        <a href="">
                                            <div class="div-1">
                                                <h4></h4>
                                            </div>
                                            <div class="div-2">
                                                <img src="" alt="">
                                            </div>
                                        </a>
                                    </div> -->
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>