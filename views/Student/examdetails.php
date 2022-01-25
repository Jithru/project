<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL?>public/css/student/examdetails.css">
    <!-- <link rel="stylesheet" href="examdetails.css"> -->
    <title>Lead driving school</title>
</head>
<body> 
    <div class="container-1">

        <div class="class-header">
        <?php require_once APPROOT."/../views/common/header.php"; ?>
        </div> 
        <div class="main">
            <?php require_once APPROOT."/../views/common/StudentSidebar.php"; ?>
            <div class="container-2">
                <!-- <div class="container-2"></div> -->
            
                <div class="container-3">
                    <div class="container-theory">
                        <div class="title">
                            <h1>Theory Exam</h1>
                        </div>
                        <div class="details" id="theory-details">
                            
                            <!-- <div class="theory-box" id="theory-box">
                                <div class="row">
                                    <div class="col-1">
                                        <h4>Date</h4>
                                        <h4>:</h4>
                                    </div>
                                    <div class="col-2">
                                        07/09/2021
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-1">
                                        <h4>Time</h4>
                                        <h4>:</h4>
                                    </div>
                                    <div class="col-2">
                                        10.30 am
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-1">
                                        <h4>Venue</h4>
                                        <h4>:</h4>
                                    </div>
                                    <div class="col-2">
                                        Galle
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-1">
                                        <h4>Instructor</h4>
                                        <h4>:</h4>
                                    </div>
                                    <div class="col-2">
                                        Nimal perera jayawardhana
                                    </div>
                                </div>
                            
                            
                                <div class="row">
                                    <div class="col-1">
                                        <h4>Vehicle</h4>
                                        <h4>:</h4>
                                    </div>
                                    <div class="col-2">
                                        JJ-89854
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="col-1">
                                        <h4>Results</h4>
                                        <h4>:</h4>
                                    </div>
                                    <div class="col-2">
                                        5
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>

                    <!-- trail -->

                    <div class="container-trail">
                        <div class="title">
                            <h1>Trail Exam</h1>
                        </div>
                        <div class="details" id="trail-details">
                            
                            <!-- <div class="trail-box" id="trail-box">
                                <div class="row">
                                    <div class="cel-1">
                                        <h4>Date</h4>
                                        <h4>:</h4>
                                    </div>
                                    <div class="cel-2">
                                        07/09/2021
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="cel-1">
                                        <h4>Time</h4>
                                        <h4>:</h4>
                                    </div>
                                    <div class="cel-2">
                                        10.30 am
                                    </div>
                                </div>
                                
 
                                
                                <div class="row">
                                    <div class="cel-1">
                                        <h4>Instructor</h4>
                                        <h4>:</h4>
                                    </div>
                                    <div class="cel-2">
                                        Nimal perera jayawardhana
                                    </div>
                                </div>

                            
                                <div class="row">
                                    <div class="cel-1">
                                        <h4>Results</h4>
                                        <h4>:</h4>
                                    </div>
                                    <div class="cel-2">
                                        5
                                    </div>
                                </div>
                            </div> -->
                        </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo URL?>public/js/student/examdetails.js"></script>
</body>
</html>